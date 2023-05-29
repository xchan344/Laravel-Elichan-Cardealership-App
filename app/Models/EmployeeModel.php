<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = ['fname', 'lname', 'birthdate', 'position', 'contact'];
    protected $casts = [
        'contact' => 'string',
    ];
    use HasFactory;
}