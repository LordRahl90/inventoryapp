<?php

namespace App\Repositories;

use App\Models\ProductProcurement;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductProcurementRepository
 * @package App\Repositories
 * @version March 17, 2018, 7:17 am UTC
 *
 * @method ProductProcurement findWithoutFail($id, $columns = ['*'])
 * @method ProductProcurement find($id, $columns = ['*'])
 * @method ProductProcurement first($columns = ['*'])
*/
class ProductProcurementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'productID',
        'documentRef',
        'narration',
        'quantity',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductProcurement::class;
    }
}
