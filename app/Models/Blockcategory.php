<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blockcategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'block_category';
    protected $fillable = ['name', 'status', 'description', 'featured_category', 'image', 'image_title', 'image_alt'];

}
