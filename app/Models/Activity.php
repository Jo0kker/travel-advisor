<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Activity extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'address_id'
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function seasons(): BelongsToMany
    {
        return $this->belongsToMany(Season::class);
    }

    public function thematics(): BelongsToMany
    {
        return $this->belongsToMany(Thematic::class);
    }
}
