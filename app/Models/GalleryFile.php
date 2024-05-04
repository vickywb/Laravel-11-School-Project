<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryFile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'file_id', 'gallery_id'
    ];

    //Relationship
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function file()
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
            get: fn () => Storage::url($this->location)
        );
    }
}
