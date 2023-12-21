<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStock extends Model
{
    use HasFactory, SoftDeletes;

    public function order()
    {
        return $this->hasOne('App\Models\Order', 'id', 'order_id');
    }

    public function company()
    {
        return $this->hasOne('App\Models\AccountMaster', 'id', 'company_id');
    }

    public function product_master()
    {
        return $this->hasOne('App\Models\ProductMaster', 'id', 'product_master_id');
    }
}
