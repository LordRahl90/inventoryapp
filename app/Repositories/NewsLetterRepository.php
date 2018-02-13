<?php

namespace App\Repositories;

use App\Models\NewsLetter;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NewsLetterRepository
 * @package App\Repositories
 * @version November 16, 2017, 3:28 pm UTC
 *
 * @method NewsLetter findWithoutFail($id, $columns = ['*'])
 * @method NewsLetter find($id, $columns = ['*'])
 * @method NewsLetter first($columns = ['*'])
*/
class NewsLetterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NewsLetter::class;
    }
}
