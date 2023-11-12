<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
        'commune',
        'audio',
        'agent_code',
        'onwer_id'
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

    ];

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
    
}
