<?php

namespace App\Models;

use App\Traits\HasOwner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Country extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia, HasOwner;

    protected $fillable = [
        'name',
        'owner_id',
        'is_active',
        'content',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
