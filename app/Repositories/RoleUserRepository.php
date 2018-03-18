<?php

namespace App\Repositories;

use App\Models\RoleUser;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoleUserRepository
 * @package App\Repositories
 * @version February 12, 2018, 11:35 pm UTC
 *
 * @method RoleUser findWithoutFail($id, $columns = ['*'])
 * @method RoleUser find($id, $columns = ['*'])
 * @method RoleUser first($columns = ['*'])
*/
class RoleUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'role_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoleUser::class;
    }
}
