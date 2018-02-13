<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="SubCategory",
 *      required={"category_id", "sub_category"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="category_id",
 *          description="category_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sub_category",
 *          description="sub_category",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="slug",
 *          description="slug",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class SubCategory extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'sub_categories';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'category_id',
        'sub_category',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'category_id' => 'integer',
        'sub_category' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_id' => 'required',
        'sub_category' => 'required'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'sub_category'
            ]
        ];
    }


    public function category(){
        return $this->belongsTo("App\Models\Admin\Category","category_id","id");
    }

    public function attributes(){
        return $this->hasMany("App\Models\ClassAttribute","sub_category_id","id");
    }


}
