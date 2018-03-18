<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ProductInventory",
 *      required={"productID", "inventoryRef", "quantity_in", "quantity_out"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="productID",
 *          description="productID",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="inventoryRef",
 *          description="inventoryRef",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="quantity_in",
 *          description="quantity_in",
 *          type="number",
 *          format="double"
 *      ),
 *      @SWG\Property(
 *          property="quantity_out",
 *          description="quantity_out",
 *          type="number",
 *          format="double"
 *      ),
 *      @SWG\Property(
 *          property="narration",
 *          description="narration",
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
class ProductInventory extends Model
{
    use SoftDeletes;

    public $table = 'product_inventories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'productID',
        'inventoryRef',
        'quantity_in',
        'quantity_out',
        'narration'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'productID' => 'integer',
        'inventoryRef' => 'string',
        'quantity_in' => 'double',
        'quantity_out' => 'double',
        'narration' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'productID' => 'required|exists:product',
        'inventoryRef' => 'required',
        'quantity_in' => 'required',
        'quantity_out' => 'required'
    ];

    
}
