<?php

namespace App\Repositories;

use App\Models\ProductAttribute;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductAttributeRepository
 * @package App\Repositories
 * @version November 22, 2017, 12:02 am UTC
 *
 * @method ProductAttribute findWithoutFail($id, $columns = ['*'])
 * @method ProductAttribute find($id, $columns = ['*'])
 * @method ProductAttribute first($columns = ['*'])
*/
class ProductAttributeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'attribute_id',
        'value'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductAttribute::class;
    }
}
