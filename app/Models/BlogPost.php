<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        //Стаття належить категоріям
        return $this->belongsTo(BlogCategory::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        //Стаття належить користувачу
        return $this->belongsTo(User::class);
    }
}
