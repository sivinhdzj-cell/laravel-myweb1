<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'user_id',
        'status',
    ];

    // Quan hệ: 1 Post thuộc về 1 User (người đăng)
    public function user()
    {
        // posts.user_id = users.id
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}