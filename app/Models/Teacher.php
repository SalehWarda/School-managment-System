<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'teachers';
    protected  $fillable = [
        'email',
        'name',
        'password',
        'specialization_id',
        'gender_id',
        'joining_date',
        'address',
    ];

    public $translatable = ['name'];
    public $timestamps = true;

    public function genders(){

        return $this->belongsTo(Gender::class, 'gender_id','id');
    }

    public function specializations(){

        return $this->belongsTo(Specialization::class, 'specialization_id','id');
    }

    public function sections(){

        return $this->belongsToMany(Section::class, 'teacher_section');
    }
}
