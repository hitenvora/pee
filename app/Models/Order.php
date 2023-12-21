<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    public function year_master()
    {
        return $this->hasOne('App\Models\YearMaster', 'id', 'year_master_id');
    }

    public function account_master()
    {
        return $this->hasOne('App\Models\AccountMaster', 'id', 'company_id');
    }

    public function product_master()
    {
        return $this->hasOne('App\Models\ProductMaster', 'id', 'product_master_id');
    }

    public function hsn_code()
    {
        return $this->hasOne('App\Models\HSNCode', 'id', 'hsn_master_id');
    }

    public function gst_master()
    {
        return $this->hasOne('App\Models\GSTMaster', 'id', 'gst_master_id');
    }
}
