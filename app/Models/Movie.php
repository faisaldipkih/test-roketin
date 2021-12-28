<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'duration', 'artists', 'genres'];

    public function scopeSearch($query, $search)
    {
        $query->when($search ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('duration', 'like', '%' . $search . '%')
                ->orWhere('artists', 'like', '%' . $search . '%')
                ->orWhere('genres', 'like', '%' . $search . '%');
        });
    }
}
