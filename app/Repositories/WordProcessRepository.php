<?php

namespace App\Repositories;

use App\Models\WordProcess;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WordProcessRepository
 * @package App\Repositories
 * @version February 13, 2018, 12:04 am UTC
 *
 * @method WordProcess findWithoutFail($id, $columns = ['*'])
 * @method WordProcess find($id, $columns = ['*'])
 * @method WordProcess first($columns = ['*'])
*/
class WordProcessRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return WordProcess::class;
    }
}
