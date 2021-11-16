<?php

namespace App\Listeners;

use App\Events\ImageDelEvent;
use Illuminate\Support\Facades\Storage;

class ImageDelListener
{
    /**
     * Handle the event.
     *
     * @param  ImageDelEvent  $event
     * @return void
     */
    public function handle(ImageDelEvent $event)
    {
        Storage::delete($event->imageId->path);
    }
}
