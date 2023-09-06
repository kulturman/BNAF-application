<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SiteConfig
 * @package App\Models
 * @version September 6, 2023, 12:16 am UTC
 *
 * @property string $director_word
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $facebook
 * @property string $linkedin
 * @property string $twitter
 * @property string $youtube
 */
class SiteConfig extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'site_configs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'director_word',
        'phone',
        'email',
        'address',
        'facebook',
        'linkedin',
        'twitter',
        'youtube'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'director_word' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'address' => 'string',
        'facebook' => 'string',
        'linkedin' => 'string',
        'twitter' => 'string',
        'youtube' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'director_word' => 'required|string',
        'phone' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'facebook' => 'nullable|string|max:255',
        'linkedin' => 'nullable|string|max:255',
        'twitter' => 'nullable|string|max:255',
        'youtube' => 'nullable|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
