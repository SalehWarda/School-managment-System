<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function students(){

        return $this->belongsTo(Student::class, 'student_id','id');
    }

    public function fgrades(){

        return $this->belongsTo(Grade::class, 'from_grade','id');
    }

    public function fclasses(){

        return $this->belongsTo(ClassRoom::class, 'from_classroom','id');
    }

    public function fsections(){

        return $this->belongsTo(Section::class, 'from_section','id');
    }

    public function tgrades(){

        return $this->belongsTo(Grade::class, 'to_grade','id');
    }

    public function tclasses(){

        return $this->belongsTo(ClassRoom::class, 'to_classroom','id');
    }

    public function tsections(){

        return $this->belongsTo(Section::class, 'to_section','id');
    }
}
