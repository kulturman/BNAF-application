<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Report
 * @package App\Models
 * @version October 18, 2023, 1:04 pm UTC
 *
 * @property string $localite
 * @property boolean $validated
 * @property string $structure
 * @property string $photo
 * @property string $photoInput
 * @property string $text
 * @property string $repere
 * @property string $nip
 * @property string $region
 * @property string $province
 * @property string $commune
 */
class Report extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'reports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'localite',
        'validated',
        'structure',
        'photo',
        'photoInput',
        'text',
        'repere',
        'nip',
        'region',
        'province',
        'commune'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'localite' => 'string',
        'validated' => 'boolean',
        'structure' => 'string',
        'photo' => 'string',
        'photoInput' => 'string',
        'text' => 'string',
        'repere' => 'string',
        'nip' => 'string',
        'region' => 'string',
        'province' => 'string',
        'commune' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'deleted_at' => 'nullable|nullable',
        'localite' => 'nullable|required|string|max:255|string|max:255',
        'structure' => 'nullable|required|string|max:255|string|max:255',
        'photo' => 'nullable|mimes:jpg,jpeg,png,gif',
        'text' => 'nullable|string|nullable|string',
        'repere' => 'nullable|string|max:255|nullable|string|max:255',
        'created_at' => 'nullable|nullable',
        'updated_at' => 'nullable|nullable',
        'nip' => 'required|string|max:255|string|max:255',
        'region' => 'nullable|string|max:255|string|max:255',
        'province' => 'nullable|string|max:255|string|max:255',
        'commune' => 'nullable|string|max:255|string|max:255'
    ];

    
}
