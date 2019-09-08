<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Traits\Attribute\ClubAttribute;
use App\Models\Traits\Relationship\ClubRelationship;

class Club extends Model
{
    use ClubAttribute,
        SoftDeletes,
        ClubRelationship;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'web_text_id',
        'address',
        'opening_time',
        'latitude',
        'longitude',
    ];
}
