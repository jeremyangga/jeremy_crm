<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'isApproved',
        'isSubscribed',
        'idEmployee',
        'idProduct',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'idEmployee');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'idProduct');
    }
}
