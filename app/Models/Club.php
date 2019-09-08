<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Traits\Attribute\ClubAttribute;

class Club extends Model
{
    use ClubAttribute,
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
        'web_text_id',
        'address',
        'opening_time',
        'latitude',
        'longitude',
    ];

    public function webText()
    {
        return $this->hasOne(WebText::class, 'id', 'web_text_id');
    }

}
