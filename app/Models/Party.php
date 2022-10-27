<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Party extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fullname',
    ];
    
    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::upper($value),
        );
    }
    
}
