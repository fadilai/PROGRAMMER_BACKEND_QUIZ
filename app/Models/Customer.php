<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer'; // Nama tabel dalam database

    protected $fillable = [
        'customer_name',

    ];

    public $timestamps = true;

    // app/Models/Customer.php
    public function addresses()
    {
        return $this->hasMany(CustomerAddress::class);
    }
}
