<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCT extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'form_data';
    protected $fillable = [
        'title',
        'selection',
        'description',
        'link',
        'text_link',
        'form_type',
        'group_id',
        'weight',
        'image'

    ];

   
}
