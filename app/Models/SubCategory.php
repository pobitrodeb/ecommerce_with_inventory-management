<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    private static $subCategory, $image, $imagName, $imageUrl, $directory;

    public static function getImagUrl($request)
    {
        self::$image                = $request->file('image');
        self::$imagName             = self::$image->getClientOriginalName();
        self::$directory            = 'images/sub-category/';
        self::$image->move(self::$directory, self::$imagName);
        return self::$directory.self::$imagName;
    }

    public static function newSubcategory($request)
    {
        self::$subCategory                 = new SubCategory();
        self::$subCategory->category_id    = $request->category_id;
        self::$subCategory->name           = $request->name;
        self::$subCategory->description    = $request->description;
        self::$subCategory->image          = self::getImagUrl($request);
        self::$subCategory->status         = $request->status;
        self::$subCategory->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
