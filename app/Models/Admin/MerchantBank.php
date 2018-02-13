<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="MerchantBank",
 *      required={"merchant_id", "bank_id", "account_name", "account_number"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
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
 *          property="bank_id",
 *          description="bank_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="account_name",
 *          description="account_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="account_number",
 *          description="account_number",
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
class MerchantBank extends Model
{
    use SoftDeletes;

    public $table = 'merchant_banks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'merchant_id',
        'bank_id',
        'account_name',
        'account_number'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'merchant_id' => 'integer',
        'bank_id' => 'integer',
        'account_name' => 'string',
        'account_number' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'merchant_id' => 'required|unique:merchant_banks,merchant_id',
        'bank_id' => 'required',
        'account_name' => 'required',
        'account_number' => 'required|min:10|max:10'
    ];

    public function merchant(){
        return $this->belongsTo("App\Models\Admin\Merchant","merchant_id","id");
    }

    public function bank(){
        return $this->belongsTo("App\Models\Admin\Bank","bank_id","id");
    }

    
}
