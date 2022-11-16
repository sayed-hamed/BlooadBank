<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Government extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }


    public function city()
    {
        return $this->hasMany(City::class);
    }
}
