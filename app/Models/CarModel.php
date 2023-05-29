<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $fillable = ['model', 'manufacturer'];
}
