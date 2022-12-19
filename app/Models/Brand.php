<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand, $image, $imagName, $imageUrl, $directory;

    public static function getImagUrl($request)
    {
        self::$image                = $request->file('image');
        self::$imagName             = self::$image->getClientOriginalName();
        self::$directory            = 'images/brand/';
        self::$image->move(self::$directory, self::$imagName);
        return self::$directory.self::$imagName;
    }

    public static function newBrand($request)
    {
        self::$brand               = new Brand();
        self::$brand->name           = $request->name;
        self::$brand->description    = $request->description;
        self::$brand->image          = self::getImagUrl($request);
        self::$brand->status         = $request->status;
        self::$brand->save();
    }
}
