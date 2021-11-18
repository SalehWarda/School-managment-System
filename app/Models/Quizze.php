<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quizze extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable =[
        'name',
        'subject_id',
        'grade_id',
        'teacher_id' ,
        'classroom_id',
        'section_id'
    ];


    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }



    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }


    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\ClassRoom', 'classroom_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function questions(){

        return $this->hasMany(Question::class);
    }
}
