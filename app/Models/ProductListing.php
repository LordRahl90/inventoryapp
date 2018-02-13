<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ProductListing",
 *      required={"sub_category_id", "merchant_id", "title", "slug", "overview", "quantity", "amount", "discount"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sub_category_id",
 *          description="sub_category_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="merchant_id",
 *          description="merchant_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="slug",
 *          description="slug",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="overview",
 *          description="overview",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="number",
 *          format="double"
 *      ),
 *      @SWG\Property(
 *          property="discount",
 *          description="discount",
 *          type="number",
 *          format="double"
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
class ProductListing extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'product_listings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'sub_category_id',
        'merchant_id',
        'title',
        'slug',
        'overview',
        'quantity',
        'amount',
        'discount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sub_category_id' => 'integer',
        'merchant_id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'overview' => 'string',
        'quantity' => 'integer',
        'amount' => 'double',
        'discount' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sub_category_id' => 'required',
        'merchant_id' => 'required',
        'title' => 'required',
        'overview' => 'required',
        'quantity' => 'required|min:1',
        'amount' => 'required|min:1.00',
        'discount' => 'required'
    ];



    public function sluggable(): array
    {
        return [
            "slug"=>[
                "source"=>"title"
            ]
        ];
    }


    public function sub_category(){
        return $this->belongsTo("App\Models\Admin\SubCategory","sub_category_id","id");
    }


    public function merchant(){
        return $this->belongsTo("App\Models\Admin\Merchant","merchant_id","id");
    }


}
