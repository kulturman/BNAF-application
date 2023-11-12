<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Article
 * @package App\Models
 * @version September 13, 2023, 2:45 am UTC
 *
 * @property string $title
 * @property string $content
 * @property string $cover_image
 */
class Article extends Model
{
    use SoftDeletes;

    use HasFactory;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'deleted_at' => 'nullable|nullable',
        'title' => 'required|string|max:255|string|max:255',
        'content' => 'required|string|string',
        'cover_image' => 'required|mimes:jpg,png,gif',
        'created_at' => 'nullable|nullable',
        'updated_at' => 'nullable|nullable'
    ];
    public $table = 'articles';
    public $fillable = [
        'title',
        'content',
        'cover_image'
    ];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'cover_image' => 'string'
    ];


}
