<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'slug'];

    public function posts(): HasMany
    {
        return $this->HasMany(Post::class);
    }

    // buat dapetin nama route di urlnya --> passing buat dipake controller destroy
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
