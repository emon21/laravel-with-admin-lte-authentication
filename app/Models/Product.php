<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','slug','image','price','stock','total','status',
    ];

    //Accsosor
    // public function getImageAttribute($value)
    // {

    //     if($value == null){
    //         return 'default.jpg';
    //     }

    // }

    public function getCreatedAtAttribute($value)
    {

       return  date('d-m-Y', strtotime($value));


    }

    //Accessor


    //Mutator
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }
}
