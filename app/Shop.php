<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    protected $primaryKey = 'shopID';
    
    protected $fillable = [
        'shop_name',
        'address',
        'phone_number',
        'email',
        'logo',
    ];

    public function sale()
    {
        return $this->hasMany(Sale::class, 'customerID', 'customerID');
    }
}
