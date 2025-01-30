<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'detail',
        'price',
        'image',
        'quantity',
        'geninvoiceid'
    ];

    public function getPriceWithTaxAttribute()
    {
        return $this->price * 1.10; // Assuming 10% tax
    }

    /**
     * You can define a helper to get a formatted price.
     */
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

}
