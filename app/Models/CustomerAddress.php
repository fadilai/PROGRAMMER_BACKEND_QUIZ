<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $table = 'customer_address'; // Nama tabel dalam database

    protected $fillable = [
        'customer_id',
        'address'


    ];

    public $timestamps = true;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
