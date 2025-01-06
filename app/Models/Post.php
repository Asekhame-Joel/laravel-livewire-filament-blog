<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Str;
// use App\Models\User;


class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }
    public function scopeFeatured($query){
        $query->where('featured', true);
    }
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }


    public function getExcerpt(){
        return str::limit(strip_tags($this->content), 150);
    }
    public function getReadingTime(){
        $mins =  round(str_word_count($this->content) / 250);
        return ($mins < 1) ? 1 : $mins;

    }
}
