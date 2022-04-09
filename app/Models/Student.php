<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;
    public $timestams = false;

    protected $fillable = [
        'name ','email','password','std_picture'
    ];
    // protected $phone = false;

    //Accsosor
    public function getNameAttribute($value)
    {
      //  return Str::title($value);
        return ucwords($value);


    }

     public function getEmailAttribute($value)
    {

        return ucfirst($value);
    }



    //Muntator
    public function setNameAttribute($value)
    {
      //  $this->attributes['name']= ucwords($value);
        $this->attributes['name'] = strtolower($value);

    }

    public function setUserPictureAttribute($value)
    {
        $this->attributes['user_picture'] = $value;
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt('password');
    }

    // public function setPasswordAttribute($password){
    //     if(trim($password) ==''){
    //         return;
    //     }
    //     $this->attributes['pasword'] = bcrypt($password);
    // }
}
