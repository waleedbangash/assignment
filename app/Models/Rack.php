<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    use HasFactory;
    protected $fillable=['rack_name'];

    public function books(){
        return $this->hasMany(Books::class);
    }
    public static function storeRack($data){

       Rack::insert($data);
    }

}
