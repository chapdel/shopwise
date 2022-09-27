<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Shopper\Framework\Models\Shop\Product\Product as ProductProduct;

class Product extends ProductProduct
{
    use HasFactory;

    protected $appends = ['converted_price'];

    public function getConvertedPriceAttribute()
    {
        $currency = SystemCurrency::find(SystemSetting::where('key', 'shop_currency_id')->first()->value);
        return currency_format($this->price_amount, $currency->code);
    }
}
