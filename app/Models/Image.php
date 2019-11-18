<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Traits\Attribute\ImageAttribute;
use App\Models\Traits\Relationship\ImageRelationship;

class Image extends Model
{
    use ImageAttribute,
        SoftDeletes,
        ImageRelationship;

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
        'internal_key',
        'image_type',
        'url',
        'alt',
    ];
}
