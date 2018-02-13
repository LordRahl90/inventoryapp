<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ItemClass;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ItemClassRepository
 * @package App\Repositories\Admin
 * @version November 20, 2017, 10:02 pm UTC
 *
 * @method ItemClass findWithoutFail($id, $columns = ['*'])
 * @method ItemClass find($id, $columns = ['*'])
 * @method ItemClass first($columns = ['*'])
*/
class ItemClassRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'item',
        'description',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ItemClass::class;
    }
}
