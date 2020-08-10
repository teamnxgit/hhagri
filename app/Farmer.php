<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $primaryKey = 'farmer_code';
    protected $keyType = 'string';

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }
}
