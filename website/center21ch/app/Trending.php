<?php
namespace App;
use Illuminate\Support\Facades\Redis;
class Trending
{
    /**
     * Fetch all trending poems.
     *
     * @return array
     */
    public function get()
    {
        return array_map('json_decode', Redis::zrevrange($this->cacheKey(), 0, 4));
    }
    /**
     * Push a new poem to the trending list.
     *
     * @param Poem $poem
     */
    public function push($poem)
    {
        Redis::zincrby($this->cacheKey(), 1, json_encode([
            'title' => $poem->title,
            'body'  => $poem->body,
            'path' => $poem->path()
        ]));
    }
    /**
     * Get the cache key name.
     *
     * @return string
     */
    public function cacheKey()
    {
        return app()->environment('testing')
            ? 'testing_trending_poems'
            : 'trending_poems';
    }
    /**
     * Reset all trending poems.
     */
    public function reset()
    {
        Redis::del($this->cacheKey());
    }
}