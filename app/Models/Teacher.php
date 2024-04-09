<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'file_id', 'name', 'field_of_study', 'address', 'phone_number'
    ];

    //Relationship
    public function file(): BelongsTo
    {
       return $this->belongsTo(File::class);
    }

    //Accessor
    protected function locationFile(): Attribute
    {
        return new Attribute(
            get: fn () => 'file/' . $this->location . '/' . $this->name ,
        );
    }

    protected function showFile(): Attribute
    {
        return new Attribute(
            get: fn () => Storage::url($this->location_file)
        );
    }
}
