<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineClasses extends Model
{
    use HasFactory;

//    protected $guarded=[];

    protected $table = "online_classes";

    protected $fillable= ['integration','grade_id','classroom_id','section_id','user_id','meeting_id','topic','start_at','duration','password','start_url','join_url'];


    public function grade()
    {
        return $this->belongsTo(Grade::class,'grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class,'classroom_id');
    }


    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
