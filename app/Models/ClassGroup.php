<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Traits\Attribute\ClassGroupAttribute;

class ClassGroup extends Model
{
    use ClassGroupAttribute,
        SoftDeletes;

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
        'logo_image_id',
        'description',
        'cover_image_id',
        'video_url',
        'classes',
        'teacher_image_id',
        'teacher_name',
        'teacher_title',
        'teacher_text',
        'playlist_url',
    ];
}
