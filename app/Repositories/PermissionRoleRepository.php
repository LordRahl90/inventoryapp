<?php

namespace App\Repositories;

use App\Models\PermissionRole;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PermissionRoleRepository
 * @package App\Repositories
 * @version February 12, 2018, 11:34 pm UTC
 *
 * @method PermissionRole findWithoutFail($id, $columns = ['*'])
 * @method PermissionRole find($id, $columns = ['*'])
 * @method PermissionRole first($columns = ['*'])
*/
class PermissionRoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role_id',
        'permission_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PermissionRole::class;
    }
}
