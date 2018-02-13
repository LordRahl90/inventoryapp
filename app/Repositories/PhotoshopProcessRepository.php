<?php

namespace App\Repositories;

use App\Models\PhotoshopProcess;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PhotoshopProcessRepository
 * @package App\Repositories
 * @version February 13, 2018, 12:08 am UTC
 *
 * @method PhotoshopProcess findWithoutFail($id, $columns = ['*'])
 * @method PhotoshopProcess find($id, $columns = ['*'])
 * @method PhotoshopProcess first($columns = ['*'])
*/
class PhotoshopProcessRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'image',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PhotoshopProcess::class;
    }
}
