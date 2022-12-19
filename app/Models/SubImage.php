<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubImage extends Model
{
    use HasFactory;
    private static $product, $subImage, $image, $imagName, $imageUrl, $directory;

    public static function getImagUrl($request)
    {
        self::$image                = $request->file('image');
        self::$imagName             = self::$image->getClientOriginalName();
        self::$directory            = 'images/product/sub-images/';
        self::$image->move(self::$directory, self::$imagName);
        return self::$directory.self::$imagName;
    }
    public static function newSubImage($product, $subImages)
    {
        foreach ($subImages as $subImage)
        {
            self::$subImage                     = new SubImage();
            self::$subImage->product_id         = $product->id;
            self::$subImage->image              = self::getImagUrl($subImage);
            self::$subImage->save();
        }
    }

}
