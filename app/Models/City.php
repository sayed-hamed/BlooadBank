<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function client(){
        return $this->belongsToMany(Client::class);
    }

    public function governorate()
    {
        return $this->belongsTo(Government::class,'govern_id');
    }
}
