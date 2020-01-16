<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Traits\Attribute\GymClassAttribute;
use App\Models\Traits\Relationship\GymClassRelationship;

class GymClass extends Model
{
    use GymClassAttribute,
        SoftDeletes,
        GymClassRelationship;

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
        'club_id',
        'class_group_id',
        'class_name_id',
        'teacher',
        'day_time',
        'week_days',
        'start_at',
        'finish_at',
        'room',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'week_days' => 'array',
    ];

    public function club()
    {
        return $this->hasOne(Club::class, 'id', 'club_id');
    }

    public function classGroup()
    {
        return $this->hasOne(Club::class, 'id', 'class_group_id');
    }


}
