<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supplier extends Authenticatable
{
    use HasFactory;

    protected $table = 'account_masters';

    protected $guard = 'Supplier';

    protected $fillable = [
        'user_name', 'password',
    ];
}
