<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Bank",
 *      required={"bank_name", "bank_code"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="bank_name",
 *          description="bank_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bank_code",
 *          description="bank_code",
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
class Bank extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'banks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'bank_name',
        'bank_code',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'bank_name' => 'string',
        'bank_code' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bank_name' => 'required|unique:banks,bank_name',
        'bank_code' => 'required|unique:banks,bank_code'
    ];


    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'bank_name'
            ]
        ];
    }

}
