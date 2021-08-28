<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MyParent extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'my_parents';
    protected $guarded=[];
    public $translatable = ['father_name',
        'father_job',
        'mother_name',
        'mother_job',

        ];

    public $timestamps = true;



}
