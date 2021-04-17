<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileHandler
{
    /**
     * Remove media from storage
     *
     * @param string $mediaName
     * @param string $disk
     * @return void
     */
    protected function deleteMedia($mediaName = '', $disk = '')
    {
        $storage = Storage::disk($disk);
        return $storage->delete($mediaName);
    }
}