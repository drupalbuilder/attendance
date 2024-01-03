<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardcontent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'cardcontent';
    protected $fillable = [
        'name', 'status', 'blockCategory','description', 'lable', 'link', 'image_title', 'image_alt', 'image', 'target',
    ];

    /**
     * Indicates if the model should be incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}

