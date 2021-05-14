<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'date'
    ];

    public static function add($fields) {
        $post = new self;
        $post->fill($fields);
        $post->save();

        return $post;

    }

    public function uploadImage($image){
        if ($image === null) {
            return;
        }

        $filename = $this->generateRandomString(10) .'.'. $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();

    }
    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')));
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(
            Tag::class,
            'posts_tags',
            'post_id',
            'tag_id'
        );
    }

    public function getCategoryTitle(){
        if($this->category != null) {
            return $this->category->title;
        }

        return 'нет категории';
    }

    public function getTagsTitles(){
        if($this->tags->isEmpty()) {
            return implode('.', $this->tags->pluck('title')->all());
        }
        return 'нет тегов';
    }
}
