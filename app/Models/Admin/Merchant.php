<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * @SWG\Definition(
 *      definition="Merchant",
 *      required={"store_name", "email", "password", "phone", "slug"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="store_name",
 *          description="store_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="password",
 *          description="password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone",
 *          description="phone",
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
class Merchant extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'merchants';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'store_name',
        'email',
        'password',
        'phone',
        'address',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'store_name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'phone' => 'string',
        'address'=>'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'store_name' => 'required|unique:merchants,store_name',
        'email' => 'required|unique:merchants,email',
        'password' => 'required',
        'phone' => 'required|unique:merchants,phone',
//        'slug' => 'required'
    ];

    public function sluggable(): array
    {
        return [
          "slug"=>[
              "source"=>"store_name"
          ]
        ];
    }


}
