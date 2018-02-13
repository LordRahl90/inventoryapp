<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * @SWG\Definition(
 *      definition="User",
 *      required={"username", "password", "surname", "other_names", "email", "phone", "role_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="username",
 *          description="username",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="password",
 *          description="password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="surname",
 *          description="surname",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="other_names",
 *          description="other_names",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone",
 *          description="phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="role_id",
 *          description="role_id",
 *          type="integer",
 *          format="int32"
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
class User extends Model
{
    use EntrustUserTrait {restore as private restoreA;}
    use SoftDeletes{restore as private restoreB;}

    public $table = 'users';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'username',
        'password',
        'surname',
        'other_names',
        'email',
        'phone',
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'username' => 'string',
        'password' => 'string',
        'surname' => 'string',
        'other_names' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'required|unique:users,username',
        'password' => 'required|min:6',
        'surname' => 'required',
        'other_names' => 'required',
        'email' => 'required|unique:users,email',
        'phone' => 'required|unique:users,phone',
        'role_id' => 'required'
    ];


    public function restore()
    {
        $this->restoreA();
        $this->restoreB();
    }


    public function tokens(){
        return $this->hasOne('App\Models\Merchant\MerchantToken','merchant_id','id');
    }

    public function bankAccount(){
        return $this->hasOne('App\Models\Merchant\MerchantBank','merchant_id','id');
    }


}
