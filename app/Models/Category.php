<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category, $image, $imagName, $imageUrl, $directory;

    public static function getImagUrl($request)
    {
        self::$image                = $request->file('image');
        self::$imagName             = self::$image->getClientOriginalName();
        self::$directory            = 'images/category/';
        self::$image->move(self::$directory, self::$imagName);
        return self::$directory.self::$imagName;
    }

    public static function newCategory($request)
    {
        self::$category                 = new Category();
        self::$category->name           = $request->name;
        self::$category->description    = $request->description;
        self::$category->image          = self::getImagUrl($request);
        self::$category->status         = $request->status;
        self::$category->save();
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
