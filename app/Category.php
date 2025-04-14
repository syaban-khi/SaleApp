<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'categoryID';

    protected $fillable = [
        'category_name',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'categoryID', 'categoryID');
    }
}
