<?php

namespace App\Models;

use App\Models\Major;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FieldOfWork extends Model
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
