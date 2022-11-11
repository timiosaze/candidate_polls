<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'state_id',
        'user_prediction',
        'reason'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function userPrediction(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strval($value).'%',
        );
    }
}
