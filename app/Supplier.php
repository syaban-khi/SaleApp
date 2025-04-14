<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $primaryKey = 'supplierID';

    protected $fillable = [
        'supplier_name',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'supplierID', 'supplierID');
    }
}
