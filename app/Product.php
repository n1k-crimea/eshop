<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*public function getCategory() {
        $category = Category::find($this->category_id);
        return ($category);
    }*/
    protected $fillable = ['code', 'category_id', 'name', 'desc', 'img', 'price'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function get_sum_price () {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
}
