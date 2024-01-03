<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'faq';
    protected $fillable = ['question', 'status', 'answer' ];
 
	public function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }
   
}
