<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'attributes';
    protected $fillable = ['name', 'type', 'sku', 'stock', 'status' ];
       
    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class, 'product_attribute_id');
    }
}