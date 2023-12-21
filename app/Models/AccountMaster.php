<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountMaster extends Model
{
    use HasFactory, SoftDeletes;

    public function group_master()
    {
        return $this->hasOne('App\Models\GroupMaster', 'id', 'group_master_id');
    }
}
