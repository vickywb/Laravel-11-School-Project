<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnedMaterial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'major_id'
    ];

    //Relationship
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
