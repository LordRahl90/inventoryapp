<?php

namespace App\Repositories;

use App\Models\ProductSubCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductSubCategoryRepository
 * @package App\Repositories
 * @version March 17, 2018, 6:51 am UTC
 *
 * @method ProductSubCategory findWithoutFail($id, $columns = ['*'])
 * @method ProductSubCategory find($id, $columns = ['*'])
 * @method ProductSubCategory first($columns = ['*'])
*/
class ProductSubCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_category_id',
        'sub_category',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductSubCategory::class;
    }
}
