<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasFactory;
    use HasTranslations;


    protected $table = 'grades';

    protected $fillable = [

        'name',
        'notes'
    ];

    public $translatable = ['name'];


    public $timestamps = true;


    public function Sections(){

        return $this->hasMany('App\Models\Section', 'grade_id', 'id');
    }
}
