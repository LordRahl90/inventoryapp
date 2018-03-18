<?php

namespace App\Repositories;

use App\Models\ProductInventory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductInventoryRepository
 * @package App\Repositories
 * @version March 17, 2018, 7:14 am UTC
 *
 * @method ProductInventory findWithoutFail($id, $columns = ['*'])
 * @method ProductInventory find($id, $columns = ['*'])
 * @method ProductInventory first($columns = ['*'])
*/
class ProductInventoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'productID',
        'inventoryRef',
        'quantity_in',
        'quantity_out',
        'narration'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductInventory::class;
    }
}
