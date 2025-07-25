<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    //
    use HasFactory;


    public function grades()
    {
        return $this->hasMany(Grades::class, 'subject_id');
    }
}