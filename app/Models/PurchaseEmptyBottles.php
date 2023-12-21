<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseEmptyBottles extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'purchase_empty_bottles';

    public function product_name()
    {
        return $this->hasOne('App\Models\ProductMaster', 'id', 'product_master_id');
    }
    public function year_name()
    {
        return $this->hasOne('App\Models\AccountMaster', 'id', 'account_master_id');
    }
    public function account_name()
    {
        return $this->hasOne('App\Models\YearMaster', 'id', 'year_master_id');
    }
}
