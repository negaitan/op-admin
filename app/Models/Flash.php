<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Traits\Attribute\FlashAttribute;

class Flash extends Model
{
    use FlashAttribute,
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
        'zona',
        'name_plan',
        'precio_flash',
        'label_flash',
        'precio_especial',
        'label_especial',
        'precio_onSale',
        'label_onSale',
        'precio_regular',
        'label_regular'

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'precioFlash' => 'float',
        'precioEspecial' => 'float',
        'precioOnSale' => 'float',
        'precioRegular' => 'float'  
    ];
}
