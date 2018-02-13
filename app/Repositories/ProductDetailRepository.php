<?php

namespace App\Repositories;

use App\Models\ProductDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductDetailRepository
 * @package App\Repositories
 * @version February 4, 2018, 3:28 pm UTC
 *
 * @method ProductDetail findWithoutFail($id, $columns = ['*'])
 * @method ProductDetail find($id, $columns = ['*'])
 * @method ProductDetail first($columns = ['*'])
*/
class ProductDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'description',
        'additional_info'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductDetail::class;
    }
}
