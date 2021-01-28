<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['license_plate', 'entry_mass', 'exit_mass', 'exited'];

    //relationship with entry masses
    public function car_histories(){
        return $this->hasMany(CarHistory::class);
    }
}
