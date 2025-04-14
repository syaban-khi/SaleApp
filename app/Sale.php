<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $primaryKey = 'saleID';

    protected $fillable = [
        'sale_date',
        'customerID',
        'cashier_name',
        'total_amount',
        'paid_amount',
        'change'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerID', 'customerID');
    }

    public function saleDetail()
    {
        return $this->hasMany(SaleDetail::class, 'saleID', 'saleID');
    }
}
