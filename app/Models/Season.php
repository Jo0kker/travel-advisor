<?php

namespace App\Models;

use App\Traits\HasOwner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model
{
    use SoftDeletes, HasFactory, HasOwner;

    protected $fillable = [
        'name',
        'owner_id',
        'is_active',
        'content',
    ];

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_season', 'season_id', 'activity_id');
    }
}
