<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'sections';

    protected $fillable = [

        'name','grade_id','class_id','status',
    ];

    public $timestamps = true;

    public $translatable = ['name'];


    public function classes(){

        return $this->belongsTo(ClassRoom::class, 'class_id', 'id');
    }
//
//    public function getActive(){
//
//        return $this->status == 1 ? ' Active' : 'UnActive' ;
//
//    }

    public function teachers(){

        return $this->belongsToMany(Teacher::class, 'teacher_section');
    }
}
