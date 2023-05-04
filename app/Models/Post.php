<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'category_id', 'published', 'published_at', 'created_by', 'last_modified_by', 'deleted_by', 'deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cover()
    {
        return $this->hasOne(Cover::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function lastModifiedBy()
    {
        return $this->belongsTo(User::class, 'last_modified_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    

}
