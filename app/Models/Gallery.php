<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_image_id', 'title', 'slug'
    ];

    //Relationship
    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function categoryImage()
    {
        return $this->belongsTo(CategoryImage::class);
    }

    public function galleries()
    {
        return $this->hasMany(GalleryFile::class);
    }
}
