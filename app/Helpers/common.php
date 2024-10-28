<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

if (! function_exists('getAllImagesContentMedia')) {
    function getAllImagesContentMedia()
    {
        $path = public_path('storage/content_media');
        if (! File::exists($path)) {
            File::makeDirectory($path, $mode = 0755, true, true);
        }
        $images_url = [];
        $files = File::files($path);
        foreach ($files as $item) {
            // code...
            $images_url[] = URL::to('/storage/content_media').'/'.$item->getFilename();
        }

        return $images_url;

    }
}

if (! function_exists('getAllImagesUser')) {
    function getAllImagesUser($user_id)
    {
        $path = public_path('storage/user_storage/'.$user_id);
        if (! File::exists($path)) {
            File::makeDirectory($path, $mode = 0755, true, true);
        }
        $images_url = [];
        $files = File::files($path);
        foreach ($files as $item) {
            // code...
            $images_url[] = URL::to('/storage/user_storage/'.$user_id).'/'.$item->getFilename();
        }

        return $images_url;
    }
}

if (! function_exists('getAllContentTemplate')) {
    function getAllContentTemplate()
    {
        $path = public_path('storage/content_media');
        $images_url = [];
        $files = File::files($path);
        foreach ($files as $item) {
            // code...
            $images_url[] = URL::to('/storage/content_media').'/'.$item->getFilename();
        }

        return $images_url;
    }
}

if (! function_exists('replaceVarContentStyle')) {
    function replaceVarContentStyle($item = null)
    {
        // Image URL: ##image_url##
        $results = [];
        $image_url = URL::to('/storage/content_media').'/';

        $temp = $item;
        if (is_object($item)) {
            if (isset($item->content)) {
                $temp->content = str_replace('##image_url##', $image_url, $item->content);
            }
            if (isset($item->style)) {
                $temp->style = str_replace('##image_url##', $image_url, $item->style);
            }
            if (isset($item->thank_you_page)) {
                $temp->thank_you_page = str_replace('##image_url##', $image_url, $item->thank_you_page);
            }
            if (isset($item->thank_you_style)) {
                $temp->thank_you_style = str_replace('##image_url##', $image_url, $item->thank_you_style);
            }

        } else {
            if (isset($item)) {
                $temp = str_replace('##image_url##', $image_url, $item);
            }
        }

        return $temp;
    }
}

if (! function_exists('deleteImageWithPath')) {
    function deleteImageWithPath($path_delete)
    {
        if (File::exists($path_delete)) {
            File::delete($path_delete);
        }
    }
}
