<?php

namespace App\Repositories;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version November 8, 2017, 5:44 pm UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
*/
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'username',
        'password',
        'surname',
        'other_names',
        'email',
        'phone',
        'role_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
