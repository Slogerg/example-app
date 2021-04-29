<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogComments extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable
        = [
            'user_id',
            'blog_post_id',
            'text_comment',
        ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        //Стаття належить користувачу
        return $this->belongsTo(User::class);
    }

    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        //Стаття належить користувачу
        return $this->belongsTo(BlogPost::class);
    }
}

