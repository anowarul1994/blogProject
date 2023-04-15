<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageUploadController extends Controller
{
    public static function imageUpload($photo, $width, $height, $path, $name)
    {
        Image::make($photo)->fit($width, $height)->save(public_path($path).$name, 80, 'webp');
        return $name;
    }

    public static function unlinkImage($path, $name)
    {
        $image_path = $path. $name;

        if (file_exists($image_path)){
            unlink($image_path);
        }
    }
}
