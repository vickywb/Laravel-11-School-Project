<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'file_id', 'title', 'slug', 'description'
    ];

    //Relationship
    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function learnedMaterial()
    {
        return $this->hasMany(LearnedMaterial::class);
    }

    public function fieldOfWork()
    {
        return $this->hasMany(FieldOfWork::class);
    }
}
