<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
     'name','image','description','slug','active'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }//end of products
}
