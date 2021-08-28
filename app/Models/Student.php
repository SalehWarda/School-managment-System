<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'students';
    protected $guarded=[];

    public $translatable = ['name'];

    public $timestamps = true;


    public function genders(){

        return $this->belongsTo(Gender::class, 'gender_id','id');
    }

    public function specializations(){

        return $this->belongsTo(Specialization::class, 'specialization_id','id');
    }

    public function sections(){

        return $this->belongsTo(Section::class, 'section_id','id');
    }

    public function bloods(){

        return $this->belongsTo(TypeBlood::class, 'blood_id','id');
    }

    public function nationalities(){

        return $this->belongsTo(Nationalitle::class, 'nationalitles_id','id');
    }


    public function grades(){

        return $this->belongsTo(Grade::class, 'grade_id','id');
    }

    public function classes(){

        return $this->belongsTo(ClassRoom::class, 'classroom_id','id');
    }

    public function myparents(){

        return $this->belongsTo(MyParent::class, 'parent_id','id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function student_account()
    {
        return $this->hasMany('App\Models\StudentAccount', 'student_id');

    }


    public function attendance()
    {
        return $this->hasMany('App\Models\Attendance', 'student_id');

    }


}
