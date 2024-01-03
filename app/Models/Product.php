<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['name', 'status', 'category', 'image', 'price', 'sell_price', 'discount', 'amount_percantage', 'shipping_charge', 'image_title', 'image_alt', 'description', 'featured_category'];

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class, 'product_id');
    }

    public function attributes()
    {
        return $this->hasManyThrough(Attribute::class, AttributeValue::class, 'product_id', 'id', 'id', 'product_attribute_id');
    }
}
