<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'image'];

    // Method to fetch data from the "banners" table
    public static function getBannersData()
    {
        return self::from('banners')->get();
    }

    // Method to fetch data from the "category" table
    public static function getCategoryData()
    {
        return self::from('category')->get();
    }
}
