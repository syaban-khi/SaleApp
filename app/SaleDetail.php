<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $table = 'sale_details';

    protected $primaryKey = 'detailID';

    protected $fillable = [
        'quantity',
        'productID',
        'saleID',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'saleID', 'saleID');
    }
}
