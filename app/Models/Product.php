<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static $image;
    public static $directory;
    public static $imageName;
    public static $product;
    public static $imageURL;

    public static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$imageName =  self::$image->getClientOriginalName();
        self::$directory = 'product-images/';
        self::$image->move( self::$directory,  self::$imageName);
        return self::$directory. self::$imageName;
    }

    public static function newProduct($request){

        self::$product = new Product();

        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->description = $request->description;
        self::$product->name = $request->name;
        self::$product->brand = $request->brand;
        self::$product->category = $request->category;
        self::$product->image = self::getImageUrl($request);
        self::$product->save();
    }

    public static function updateProduct($request, $id){
        self::$product = Product::find($id);

        if($request->file('image')){
            if(file_exists(self::$product->image)){
                unlink(self::$product->image);
            }
            self::$imageURL = self::getImageUrl($request);
        }
        else{
            self::$imageURL = self::$product->image;
        }



        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->description = $request->description;
        self::$product->name = $request->name;
        self::$product->brand = $request->brand;
        self::$product->category = $request->category;
        self::$product->image = self::$imageURL;
        self::$product->save();
    }



}
