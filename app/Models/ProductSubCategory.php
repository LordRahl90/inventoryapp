<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ProductSubCategory",
 *      required={"product_category_id", "sub_category"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="product_category_id",
 *          description="product_category_id",
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
class ProductSubCategory extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'product_sub_categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_category_id',
        'sub_category',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_category_id' => 'integer',
        'sub_category' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_category_id' => 'required',
        'sub_category' => 'required'
    ];

    public function sluggable(): array
    {
        return [
            "slug"=>[
                "source"=>"sub_category"
            ]
        ];
    }

    public function category(){
        return $this->belongsTo("App\Models\ProductCategory","product_category_id","id");
    }


}
