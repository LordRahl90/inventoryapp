<?php

namespace App\Repositories;

use App\Models\ClassAttribute;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ClassAttributeRepository
 * @package App\Repositories
 * @version February 4, 2018, 1:49 pm UTC
 *
 * @method ClassAttribute findWithoutFail($id, $columns = ['*'])
 * @method ClassAttribute find($id, $columns = ['*'])
 * @method ClassAttribute first($columns = ['*'])
*/
class ClassAttributeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sub_category_id',
        'attribute'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ClassAttribute::class;
    }
}
