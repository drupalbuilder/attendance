<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $fillable = [
        'product_attribute_id',
        'product_id',
        'attribute_option',
        'product_attribute_name',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function productAttribute()
    {
        return $this->belongsTo(Attribute::class, 'product_attribute_id');
    }
}