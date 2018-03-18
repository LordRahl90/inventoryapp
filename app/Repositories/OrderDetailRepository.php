<?php

namespace App\Repositories;

use App\Models\OrderDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrderDetailRepository
 * @package App\Repositories
 * @version March 17, 2018, 7:11 am UTC
 *
 * @method OrderDetail findWithoutFail($id, $columns = ['*'])
 * @method OrderDetail find($id, $columns = ['*'])
 * @method OrderDetail first($columns = ['*'])
*/
class OrderDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'orderID',
        'productID',
        'quantity',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrderDetail::class;
    }
}
