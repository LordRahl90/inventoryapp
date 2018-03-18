<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Product",
 *      required={"product_sub_category_id", "name", "price"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="product_sub_category_id",
 *          description="product_sub_category_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="slug",
 *          description="slug",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
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
class Product extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'products';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_sub_category_id',
        'name',
        'slug',
        'description',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_sub_category_id' => 'integer',
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_sub_category_id' => 'required|exists:product_sub_categories,id',
        'name' => 'required',
        'price' => 'required'
    ];

    public function sluggable(): array
    {
        return [
            "slug"=>[
                "source"=>"name"
            ]
        ];
    }


    public function sub_category(){
        return $this->belongsTo("App\Models\ProductSubCategory","product_sub_category_id","id");
    }

}
