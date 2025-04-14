<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'productID';

    protected $fillable = [
        'product_name',
        'price',
        'stock',
        'categoryID',
        'supplierID',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID', 'categoryID');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplierID', 'supplierID');
    }

    public function saleDetail()
    {
        return $this->hasMany(saleDetail::class, 'productID', 'productID');
    }
}
