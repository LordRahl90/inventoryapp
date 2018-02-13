<?php

namespace App\Repositories;

use App\Models\SageProcess;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SageProcessRepository
 * @package App\Repositories
 * @version February 13, 2018, 12:05 am UTC
 *
 * @method SageProcess findWithoutFail($id, $columns = ['*'])
 * @method SageProcess find($id, $columns = ['*'])
 * @method SageProcess first($columns = ['*'])
*/
class SageProcessRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'account',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SageProcess::class;
    }
}
