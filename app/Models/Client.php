<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;
    protected $guarded=[];



    protected $hidden=['password','api_token'];


    public function bloodType(){
        return $this->belongsToMany(BloodType::class,'client_blood_type');
    }

    public function ClientBloodType(){
        return $this->belongsTo(BloodType::class,'blood_type_id');
    }

    public function governorate(){
        return $this->belongsTo(Government::class,'govern_id');
    }

    public function post(){
        return $this->belongsToMany(Post::class);
    }

    public function donationRequest(){
        return $this->hasMany(DonationRequest::class);
    }

    public function favourites()
    {
        return $this->belongsToMany(Post::class);
    }

    public function token(){
        return $this->hasMany(Token::class);
    }







}
