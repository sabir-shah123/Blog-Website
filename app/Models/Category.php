<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['name','slug','parent_id','image'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    //when the parent_id deleted then remove the parent_id from all the childs
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($category) {
            $category->childs()->update(['parent_id' => null]);
        });
    }

}
