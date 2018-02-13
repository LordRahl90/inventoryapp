<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ClassAttribute",
 *      required={"sub_category_id", "attribute"},
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
 *          property="attribute",
 *          description="attribute",
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
class ClassAttribute extends Model
{
    use SoftDeletes;

    public $table = 'class_attributes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'sub_category_id',
        'attribute'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sub_category_id' => 'integer',
        'attribute' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sub_category_id' => 'required',
        'attribute' => 'required'
    ];

    public function subCategory(){
        return $this->belongsTo("App\Models\Admin\SubCategory","sub_category_id","id");
    }
    
}
