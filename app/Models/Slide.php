<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Slide
 * @package App\Models
 * @version September 13, 2023, 2:46 am UTC
 *
 * @property string $text
 * @property string $image
 * @property integer $order
 */
class Slide extends Model
{
    use SoftDeletes;

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'text' => 'nullable|string|max:255|nullable|string|max:255',
        'image' => 'required|mimes:jpg,png,gif',
        'order' => 'required|integer|integer',
        'deleted_at' => 'nullable|nullable',
        'created_at' => 'nullable|nullable',
        'updated_at' => 'nullable|nullable'
    ];
    public $table = 'slides';
    public $fillable = [
        'text',
        'image',
        'order'
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'text' => 'string',
        'image' => 'string',
        'order' => 'integer'
    ];


}
