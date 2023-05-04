<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'thumbnail', 'alt_text', 'caption','description'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    

}
