<?php

namespace App\Models;

use App\Traits\HasOwner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Address extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia, HasOwner;

    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'latitude',
        'longitude',
        'zip_code',
        'city_id',
        'owner_id',
        'is_active',
        'content',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function activity(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
