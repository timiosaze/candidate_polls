<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Candidate extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'party_id',
        'name',
        'last_political_position',
        'speech',
        'vice_name'
    ];

    public function party()
    {
        return $this->belongsTo(Party::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
