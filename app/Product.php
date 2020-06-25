<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','name','description','image','slug','minimum_price','maximum_price','price','stock','commission','active','vendor_id','catalog'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }//end fo category

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order');
    }//end of orders
}
