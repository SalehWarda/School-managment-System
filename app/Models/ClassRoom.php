<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClassRoom extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'class_rooms';

    protected $fillable = [

        'name_class',
        'grade_id',
    ];
    public $translatable = ['name_class'];


    public $timestamps = true;


    public function grades(){

        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }



}
