<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'nisn', 'gender', 'religion', 'place_of_birth', 'date_of_birth',
        'address', 'phone_number', 'origin_of_school', 'address_of_school',
        'father_name', 'mother_name', 'father_job', 'mother_job', 
        'phone_number_parent'
    ];

    protected function casts() : array
    {
        return [
            'date_of_birth' => 'datetime'
        ];
    }
}
