<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand',
        'model',
        'image',
    ];

    /**
     * car reservations
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'car_id','id');
    }
}
