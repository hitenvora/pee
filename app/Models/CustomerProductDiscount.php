<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerProductDiscount extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customer_product_discounts';

    protected $fillable = [
        'account_master_id', 'product_master_id', 'discount', 'is_active', 'created_by', 'updated_by',
    ];

    public function product_name()
    {
        return $this->hasOne('App\Models\ProductMaster', 'id', 'product_master_id');
    }

    public function account_name()
    {
        return $this->hasOne('App\Models\AccountMaster', 'id', 'account_master_id')->where('is_active', 1);
    }
}
