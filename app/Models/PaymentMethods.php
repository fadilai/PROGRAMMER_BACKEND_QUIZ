<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethods extends Model
{
    use HasFactory;

    protected $table = 'payment_methods'; // Nama tabel dalam database

    protected $fillable = [
        'name',
        'is_active',
    ];

    public $timestamps = true;

}
