<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SiteConfig
 * @package App\Models
 * @version September 13, 2023, 2:39 am UTC
 *
 * @property string $director_word
 * @property string $director_photo
 * @property string $director_name
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

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'director_word' => 'required|string|string',
        'director_photo' => 'nullable|mimes:jpg,png,gif',
        'director_name' => 'required|string|max:255|string|max:255',
        'phone' => 'required|string|max:255|string|max:255',
        'email' => 'required|string|max:255|string|max:255',
        'address' => 'required|string|max:255|string|max:255',
        'facebook' => 'nullable|string|max:255|nullable|string|max:255',
        'linkedin' => 'nullable|string|max:255|nullable|string|max:255',
        'twitter' => 'nullable|string|max:255|nullable|string|max:255',
        'youtube' => 'nullable|string|max:255|nullable|string|max:255',
        'deleted_at' => 'nullable|nullable',
        'created_at' => 'nullable|nullable',
        'updated_at' => 'nullable|nullable'
    ];
    public $table = 'site_configs';
    public $fillable = [
        'director_word',
        'director_photo',
        'director_name',
        'phone',
        'email',
        'address',
        'facebook',
        'linkedin',
        'twitter',
        'youtube'
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'director_word' => 'string',
        'director_photo' => 'string',
        'director_name' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'address' => 'string',
        'facebook' => 'string',
        'linkedin' => 'string',
        'twitter' => 'string',
        'youtube' => 'string'
    ];


}
