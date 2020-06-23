<?php

namespace App\Listener;

use App\Event\PostPublished;

class SendPostPublishedNotification
{
    /**
     * Handle the event.
     *
     * @param  PostPublished  $event
     * @return void
     */
    public function handle(PostPublished $event)
    {
        if ($event->post->published) {
            $pushall = app('PushAll');
            $pushall->notify('Опубликована статья', $event->post->name);
        }
    }
}
