<?php

namespace App\Repositories\Admin;

use App\Models\Admin\MerchantBank;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MerchantBankRepository
 * @package App\Repositories\Admin
 * @version February 4, 2018, 1:12 pm UTC
 *
 * @method MerchantBank findWithoutFail($id, $columns = ['*'])
 * @method MerchantBank find($id, $columns = ['*'])
 * @method MerchantBank first($columns = ['*'])
*/
class MerchantBankRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'merchant_id',
        'bank_id',
        'account_name',
        'account_number'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MerchantBank::class;
    }
}
