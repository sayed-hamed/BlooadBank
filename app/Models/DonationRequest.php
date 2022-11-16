<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    use HasFactory;

    protected $table='donation__requests';


    public function city(){
        return $this->belongsTo(City::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    public function BloodType()
    {
        return $this->belongsTo(BloodType::class,'blood_type_id');
    }
}
