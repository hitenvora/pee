<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMaster extends Model
{
    use HasFactory;

    public function account_master()
    {
        return $this->hasOne('App\Models\AccountMaster', 'id', 'account_master_id');
    }
}
