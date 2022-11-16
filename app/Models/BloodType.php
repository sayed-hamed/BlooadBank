<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    use HasFactory;
    protected $table='blood__types';

    protected $guarded=[];

    public function client(){
        return $this->belongsToMany(Client::class,'client_blood_type');
    }


}
