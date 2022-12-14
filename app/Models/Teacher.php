<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function course(){
        //(NamaModel::class, 'penyambungnya')
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function timetable(){
        return $this->hasMany(Timetable::class);
    }
}
