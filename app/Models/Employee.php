<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable= [
        'employee_id', 
        'employee_name', 
        'age',
        'join_date',
        'salary',
        'bonus',
        'medical_claim',
        'allowances',
        'leave_payment'
    ];
}



