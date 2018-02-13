<?php

namespace App\Repositories;

use App\Models\ProductListing;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductListingRepository
 * @package App\Repositories
 * @version February 4, 2018, 2:59 pm UTC
 *
 * @method ProductListing findWithoutFail($id, $columns = ['*'])
 * @method ProductListing find($id, $columns = ['*'])
 * @method ProductListing first($columns = ['*'])
*/
class ProductListingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sub_category_id',
        'merchant_id',
        'title',
        'slug',
        'overview',
        'quantity',
        'amount',
        'discount'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductListing::class;
    }
}
