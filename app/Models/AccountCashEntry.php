<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountCashEntry extends Model
{
    use HasFactory, SoftDeletes;

    public function customer()
    {
        return $this->hasOne('App\Models\AccountMaster', 'id', 'customer_id');
    }

    public function account()
    {
        return $this->hasOne('App\Models\AccountMaster', 'id', 'account_master_id');
    }
}
