<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerStockMaster extends Model
{
    use HasFactory, SoftDeletes;
    
    public function customer()
    {
        return $this->hasOne('App\Models\AccountMaster', 'id', 'customer_id');
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
