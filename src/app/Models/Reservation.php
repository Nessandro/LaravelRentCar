<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'finish_date',
        'cancelled_at',
    ];

    /**
     * user relation
     */
    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }

    /**
     * car relation
     */
    public function car()
    {
        $this->belongsTo(Car::class, 'car_id');
    }
}
