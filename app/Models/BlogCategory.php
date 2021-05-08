<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BlogCategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
    ];
//
//    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
//    {
//        return $this->hasMany(BlogComments::class);
//    }

    public function parentCategory(){
        return $this->belongsTo(BlogCategory::class, 'parent_id','id');
    }
}
