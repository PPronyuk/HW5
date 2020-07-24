<?php

namespace App;

use App\Event\PostPublished;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => PostPublished::class,
        'updated' => PostPublished::class,
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function updateTags(string $tags)
    {
        $postTags = $this->tags->keyBy('name');

        $tags = collect(explode(',', $tags))->keyBy(function ($item){
            return $item;
        });

        $syncIds = $postTags->intersectByKeys($tags)->pluck('id')->toArray();

        $tagsToAttach = $tags->diffKeys($postTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }

        $this->tags()->sync($syncIds);
    }

}
