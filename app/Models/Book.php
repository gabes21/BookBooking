<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'genre', 'summary', 'image'];

    public function user() {
        return $this->belongsToMany(User::class, 'book_user')->withPivot('start_date', 'end_date', 'pickedup_at', 'returned_at');
    }

    public function scopeFilter($query, array $filters) {
        if($filters['genre'] ?? false) {
            $query->where('genre', '=', request('genre'));
        }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%'.request('search').'%')
                ->orWhere('author', 'like', '%'.request('search').'%');
        }
    }
}
