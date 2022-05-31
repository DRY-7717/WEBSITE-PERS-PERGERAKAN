<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    protected $with = ['category', 'user'];


    public function scopeFilter($query, array $filter)
    {
        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }

        $query->when($filter['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        });

        $query->when($filter['category'] ?? false, fn ($query, $category) => $query->whereHas('category', fn ($query) => $query->where('slug', $category)));
        $query->when(
            $filter['user'] ?? false,
            fn ($query, $user) =>  $query->whereHas('user', fn ($query) => $query->where('username', $user))
        );

        // $query->when($filter['user'] ?? false, fn ($query,$user) => $query->whereHas('user', fn ($query) => $query->where('username', $user)));
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getRouteKeyName()
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
