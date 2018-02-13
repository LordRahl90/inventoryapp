<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Merchant;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MerchantRepository
 * @package App\Repositories\Admin
 * @version February 4, 2018, 1:09 pm UTC
 *
 * @method Merchant findWithoutFail($id, $columns = ['*'])
 * @method Merchant find($id, $columns = ['*'])
 * @method Merchant first($columns = ['*'])
*/
class MerchantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'store_name',
        'email',
        'password',
        'phone',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Merchant::class;
    }
}
