<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded=[];
    public $isfavourite=true;

    public function client(){
        return $this->belongsTo(Client::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }
}
