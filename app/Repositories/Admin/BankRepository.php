<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Bank;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BankRepository
 * @package App\Repositories\Admin
 * @version November 9, 2017, 9:13 pm UTC
 *
 * @method Bank findWithoutFail($id, $columns = ['*'])
 * @method Bank find($id, $columns = ['*'])
 * @method Bank first($columns = ['*'])
*/
class BankRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bank_name',
        'bank_code',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bank::class;
    }
}
