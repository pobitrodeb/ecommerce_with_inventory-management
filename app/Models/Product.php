<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product, $image, $imagName, $imageUrl, $directory;

    public static function getImagUrl($request)
    {
        self::$image                = $request->file('image');
        self::$imagName             = self::$image->getClientOriginalName();
        self::$directory            = 'images/product/';
        self::$image->move(self::$directory, self::$imagName);
        return self::$directory.self::$imagName;
    }
    public static function newProduct($request)
    {
        self::$product                    = new Product();
        self::$product->category_id       = $request->category_id;
        self::$product->sub_category_id   = $request->sub_category_id;
        self::$product->brand_id          = $request->brand_id;
        self::$product->unit_id           = $request->unit_id;
        self::$product->name              = $request->name;
        self::$product->code              = $request->code;
        self::$product->regular_price     = $request->regular_price;
        self::$product->selling_price     = $request->selling_price;
        self::$product->stock_price       = $request->stock_price;
        self::$product->stock_amount      = $request->stock_amount;
        self::$product->short_description = $request->short_description;
        self::$product->long_description  = $request->long_description;
        self::$product->image             = self::getImagUrl($request);
        self::$product->status            = $request->status;
        self::$product->save();
        return self::$product;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
