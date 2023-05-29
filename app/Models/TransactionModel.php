<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'fname',
        'lname',
        'c_id',
        't_type',
        'price',
        't_status',
        'contact',
    ];

    public function car()
    {
        return $this->belongsTo(CarModel::class, 'c_id');
    }
}