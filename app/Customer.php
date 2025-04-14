<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $primaryKey = 'customerID';
    
    protected $fillable = [
        'customer_name',
        'address',
        'phone_number',
        'email',
    ];

    public function sale()
    {
        return $this->hasMany(Sale::class, 'customerID', 'customerID');
    }
}
