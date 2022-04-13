<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
// use App\Models\Attribute;
class Student extends Model
{
    use HasFactory;
    public $timestams = false;

    protected $fillable = [
        'student_name','email','designation','std_picture','phone','gender','status'
    ];
    // protected $phone = false;

    public function setNameAttribute($value)
    {

        return $this->attributes['name'] = ucwords($value);
    }

    //Accsosor
    public function getNameAttribute($value)
    {
      //  return Str::title($value);
        return ucwords($value);


    }
    // public function getStdPictureAttribute($image)
    // {
    //    // $this->attributes['image'] = 'storage/student/default.jpg';
    //     // if($image){
    //     //     return asset('storage/student/default.jpg');
    //     // }
    //     if($image == null){
    //         return asset('storage/student/default.jpg');
    //     }
    //     else{
    //         return $image;
    //     }
    // }

    //Mutator

    public function setStudentNameAttribute($value)
    {
        $this->attributes['student_name'] = ucwords($value);
    }



    // public function setStdPictureAttribute()
    // {
    //     if (is_null($this->image)) {
    //         $this->attributes['image'] = 'storage/student/default.jpg';
    //        // return asset('backend/image/default.png');
    //     }
    //     return $this->image;
    // }

    // public function getStdPictureAttribute()
    // {
    //     if (is_null($this->image)) {
    //         return asset('storage/student/default.jpg');
    //     }

    //     return asset($this->image);
    // }


    // public function getStdPictureAttribute($photo)
    // {
    //     if ($photo == null) {
    //         return 'storage/student/default.jpg';
    //     } else {
    //         return $photo;
    //     }
    // }
 //  protected $url = 'storage/student/default.jpg';
    // public function getStdPictureAttribute($photo){
    //     if ($photo == null) {
    //       // return $this->url.$value;
    //        return 'storage/student/default.jpg';
    //     }
    //     else{
    //         return asset($photo);

    //     }

    // }


  //  protected $location = 'storage/student/default.jpg';
    public function getStdPictureAttribute($image){
        if ($image == null) {
            return asset('storage/student/default.jpg');
        }
        // else{
        //             return asset($this->$image->std_picture);

        //         }
             //   return $this->location.$image;
                return asset('storage/student/'.$image);

    }

    public function getcreatedAtAttribute($value)
    {
      //  return Str::title($value);
     // Carbon::formate('d-M-Y : h:i:s A');
    return  Carbon::now()->diffForHumans($value);
    // return  Carbon::now()->format('d-M-y H:i:s A');

    //  return date('d-M-Y h:i:s A', strtotime($value));
    }
    public function getUpdatedAtAttribute($value)
    {
      //  return Str::title($value);
     // Carbon::formate('d-M-Y : h:i:s A');
     return  Carbon::now()->diffForHumans($value);
    // return  Carbon::now()->diffForHumans();

    //  return date('d-M-Y h:i:s A', strtotime($value));
    }

     public function getEmailAttribute($value)
    {

        return ucfirst($value);
    }



    //Muntator
    // public function setNameAttribute($value)
    // {
    //   //  $this->attributes['name']= ucwords($value);
    //     $this->attributes['name'] = strtolower($value);

    // }

    public function setUserPictureAttribute($value)
    {
        $this->attributes['user_picture'] = $value;
    }

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt('password');
    // }

     //Mutator
    //  public function setNameAttribute($value)
    //  {
    //     return $this->attributes['name'] = ucwords($value);
    //  }

// protected function name(): Attribute
// {
//     return new Attribute(
//         get: fn ($value) => ucfirst($value),
//         set: fn ($value) => strtolower($value),
//     );
// }


    //  public function setContentAttribute($value){
    //     return unserialize($value);
    // }

    // public function setPasswordAttribute($password){
    //     if(trim($password) ==''){
    //         return;
    //     }
    //     $this->attributes['pasword'] = bcrypt($password);
    // }
    // public function getcreatedatAttribute($value)
    // {
    //     $this->attributes['name'] = ucwords($value);

    // }
}
