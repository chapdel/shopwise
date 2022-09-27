<?php

namespace App\Http\Livewire\Settings\Payments;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Shopper\Framework\Models\Shop\PaymentMethod;
use Shopper\Framework\Models\System\Currency;
use WireUi\Traits\Actions;

class NotchPay extends Component
{
    use Actions;

    public string $notchpay_key = '';

    public string $notchpay_secret = '';

    public bool $enabled = false;

    public string $message = '...';

    public function mount()
    {
        $this->enabled = ($stripe = PaymentMethod::where('slug', 'notchpay')->first())
            ? $stripe->is_enabled
            : false;
        $this->notchpay_key = env('NOTCHPAY_KEY', '');
        $this->notchpay_secret = env('NOTCHPAY_SECRET', '');
    }

    public function enabledStripe()
    {
        PaymentMethod::create([
            'title' => 'Notch Pay',
            'slug' => 'notchpay',
            'link_url' => 'https://github.com/notchpay/notchpay-php',
            'is_enabled' => true,
            'description' => 'The Notch Pay PHP library provides convenient access to the Notch Pay API from applications written in the PHP language.',
        ]);

        $this->enabled = true;

        $this->notification()->success(
            __('shopper::layout.status.success'),
            __('shopper::pages/settings.notifications.notchpay_enable')
        );
    }

    public function store()
    {
        Artisan::call('config:clear');


        setEnvironmentValue([
            'NOTCHPAY_KEY' => $this->notchpay_key,
            'NOTCHPAY_SECRET' => $this->notchpay_secret,
        ]);



        $this->notification()->success(
            __('shopper::layout.status.updated'),
            __('shopper::pages/settings.notifications.notchpay')
        );
    }

    public function render()
    {
        return view('livewire.settings.payments.notch-pay', [
            'currencies' => Cache::rememberForever('currencies', fn () => Currency::all()),
        ]);
    }
}
