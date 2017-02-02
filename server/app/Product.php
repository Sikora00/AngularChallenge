<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];
    public $timestamps = false;
    public static $rules = [
        'productCode' => 'required',
        'productName' => 'required',
        'productLine' => 'required',
        'productScale' => 'required|regex:/1:(?:\d*\.)?\d+/',
        'productDescription' => 'required',
        'quantityInStock' => 'required|integer|min:0',
        'buyPrice' => 'required|numeric|min:0',
        'MSRP' => 'required|numeric|min:0',
    ];
}
