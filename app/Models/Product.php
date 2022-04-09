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
    public function getcreated_atAttribute($value)
    {
      //  return Str::title($value);
        return Carbon::formate('d-m-Y')->$value;

    }
}
