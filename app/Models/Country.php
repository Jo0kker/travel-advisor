<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Country extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
