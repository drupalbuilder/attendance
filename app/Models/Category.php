<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'category';
    protected $fillable = ['name', 'status', 'parent','description','featured_category','image',];
   
    public function children()
    {
        return $this->hasMany(Category::class, 'parent', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent', 'id');
    }
}

