<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Shopper\Framework\Models\Shop\Product\Product as ProductProduct;
use Laravel\Scout\Searchable;

class Product extends ProductProduct
{
    use HasFactory;
    use Searchable;

    protected $appends = ['converted_price', 'img_src'];

    public function getConvertedPriceAttribute()
    {
        $currency = SystemCurrency::find(SystemSetting::where('key', 'shop_currency_id')->first()->value);
        return currency_format($this->price_amount, $currency->code);
    }
}
