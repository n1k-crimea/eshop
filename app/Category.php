<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*public function getProducts() {
        $products = Product::where('category_id', $this->id)->get();
        return ($products);
    }*/
    protected $fillable = ['code', 'name', 'desc', 'img'];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
