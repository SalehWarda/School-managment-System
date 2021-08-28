<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasFactory;
    use HasTranslations;


    public $translatable = ['title'];

    protected $fillable=['title','amount','grade_id','classroom_id','year','description','fee_type'];



    public function grades()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }



    public function classes()
    {
        return $this->belongsTo('App\Models\ClassRoom', 'classroom_id');
    }
}
