<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasFactory;
    use HasTranslations;


    protected $table = 'subjects';
    public $translatable = ['name'];

    protected $fillable=[

        'name',
        'grade_id',
        'classroom_id',
        'teacher_id'
    ];



    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\ClassRoom', 'classroom_id');
    }


    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }


}
