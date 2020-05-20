<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function get_total_price() {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->get_sum_price();
        }
        return $sum;
    }

    public function save_order($name, $phone) {
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            return true;
        } else {
            return false;
        }
    }
}
