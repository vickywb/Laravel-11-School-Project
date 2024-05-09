<?php

namespace App\Models;

use App\Models\Major;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['location'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function majors()
    {
        return $this->hasMany(Major::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
    
    public function galleryFiles()
    {
        return $this->hasMany(GalleryFile::class);
    }

    public function heroPages()
    {
        return $this->hasMany(HeroPage::class);
    }

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
