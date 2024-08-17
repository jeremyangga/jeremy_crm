<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Employee extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'isManager',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function customers()
    {
        return $this->hasMany(Customer::class, 'idEmployee');
    }
}
