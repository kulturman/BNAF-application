<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Report
 * @package App\Models
 * @version September 13, 2023, 1:48 pm UTC
 *
 * @property string $localite
 * @property string $structure
 * @property string $photo
 * @property string $text
 * @property string $repere
 * @property number $longitude
 * @property number $latitude
 */
class Report extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'reports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'localite',
        'structure',
        'photo',
        'text',
        'repere',
        'longitude',
        'latitude',
        'photoInput'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'localite' => 'string',
        'structure' => 'string',
        'photo' => 'string',
        'text' => 'string',
        'repere' => 'string',
        'longitude' => 'float',
        'latitude' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'deleted_at' => 'nullable|nullable',
        'localite' => 'required|string|max:255|string|max:255',
        'structure' => 'required|string|max:255|string|max:255',
        'photo' => 'nullable|mimes:gif,jpeg,png',
        'text' => 'required|string|nullable|string',
        'repere' => 'required|string|max:255|nullable|string|max:255',
        'longitude' => 'nullable|numeric|nullable|numeric',
        'latitude' => 'nullable|numeric|nullable|numeric',
        'created_at' => 'nullable|nullable',
        'updated_at' => 'nullable|nullable'
    ];

    
}
