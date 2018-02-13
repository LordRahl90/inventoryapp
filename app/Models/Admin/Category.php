<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * @SWG\Definition(
 *      definition="Category",
 *      required={"category", "slug"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="category",
 *          description="category",
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
class Category extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'category',
        'item_class_id',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'category' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category' => 'required:unique:categories,id'
    ];


    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'category'
            ]
        ];
    }

    public function itemClass()
    {
        return $this->belongsTo("App\Models\Admin\ItemClass", "item_class_id", "id");
    }

    public function sub_category(){
        return $this->hasMany("App\Models\Admin\SubCategory","category_id","id");
    }
}
