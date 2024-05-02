<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'book_id', 'start_date', 'end_date', 'pickedup_at', 'returned_at'];
    protected $table = 'book_user';
}
