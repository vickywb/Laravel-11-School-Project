<?php

namespace App\Models;

use App\Models\File;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'file_id', 'category_id', 'title', 'slug', 'description'
    ];

    //Relationship
    public function category(): BelongsTo 
    {
        return $this->belongsTo(Category::class);
    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    //Accessor
    protected function locationFile(): Attribute
    {
        return new Attribute (
            get: fn () => 'file/' . $this->location . '/' . $this->name ,
        );
    }

    protected function showFile(): Attribute
    {
        return new Attribute (
            get: fn () => Storage::url($this->location_file)
        );
    }

    protected function deleteFile(): Attribute
    {
        return new Attribute (
            get: fn () => File::select('id', 'location')
                ->doesntHave('articles')
                ->doesntHave('majors')
                ->doesntHave('teachers')->get()
        );
    }

    protected function shortDescription(): Attribute
    {
        return new Attribute (
            get: fn () => Str::words($this->description, 20, '...')
        );
    }
}
