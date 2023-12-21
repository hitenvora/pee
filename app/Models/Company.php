<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companys';

    public function state(){
        return $this->hasOne('App\Models\State', 'id', 'state_id');
    }
}
