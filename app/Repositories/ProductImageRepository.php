<?php

namespace App\Repositories;

use App\Models\ProductImage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductImageRepository
 * @package App\Repositories
 * @version February 4, 2018, 3:33 pm UTC
 *
 * @method ProductImage findWithoutFail($id, $columns = ['*'])
 * @method ProductImage find($id, $columns = ['*'])
 * @method ProductImage first($columns = ['*'])
*/
class ProductImageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'filename'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductImage::class;
    }
}
