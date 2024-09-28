<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavItems extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $with = ['category', 'user'];


    // NavItems model
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // public function post()
    // {
    //     return $this->belongsTo(Post::class, 'nav_type', 'nav_type');
    // }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'nav_type', 'nav_type');
    // }
}
