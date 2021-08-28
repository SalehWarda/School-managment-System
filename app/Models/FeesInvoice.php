<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesInvoice extends Model
{
    use HasFactory;





    public function grades()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }


    public function classes()
    {
        return $this->belongsTo('App\Models\ClassRoom', 'classroom_id');
    }


    public function sections()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function students()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    public function fees()
    {
        return $this->belongsTo('App\Models\Fee', 'fee_id');
    }
}
