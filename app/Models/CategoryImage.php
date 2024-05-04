<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug'
    ];

    //Relationship
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
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
