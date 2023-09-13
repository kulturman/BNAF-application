<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Stat
 * @package App\Models
 * @version September 13, 2023, 4:30 am UTC
 *
 * @property string $chiffres
 * @property string $text
 * @property string $icon
 */
class Stat extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'stats';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'chiffres',
        'text',
        'icon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'chiffres' => 'string',
        'text' => 'string',
        'icon' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'deleted_at' => 'nullable',
        'chiffres' => 'required|string|max:255',
        'text' => 'required|string|max:255',
        'icon' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
