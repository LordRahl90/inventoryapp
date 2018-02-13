<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SubCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SubCategoryRepository
 * @package App\Repositories\Admin
 * @version November 8, 2017, 7:41 pm UTC
 *
 * @method SubCategory findWithoutFail($id, $columns = ['*'])
 * @method SubCategory find($id, $columns = ['*'])
 * @method SubCategory first($columns = ['*'])
*/
class SubCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_id',
        'sub_category',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SubCategory::class;
    }
}
