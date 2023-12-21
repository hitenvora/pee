<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function company_name()
    {
        return $this->hasOne('App\Models\CompanyMaster', 'id', 'company_master_id');
    }

    public function hsn_code()
    {
        return $this->hasOne('App\Models\HSNCode', 'id', 'hsn_code_id');
    }
}
