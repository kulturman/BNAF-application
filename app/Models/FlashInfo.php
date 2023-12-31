<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FlashInfo
 * @package App\Models
 * @version November 3, 2023, 12:35 am UTC
 *
 * @property string $content
 */
class FlashInfo extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'content' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
    public $table = 'flash_infos';
    public $fillable = [
        'content'
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'content' => 'string'
    ];


}
