<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleUserRequest;
use App\Http\Requests\UpdateRoleUserRequest;
use App\Models\Admin\Role;
use App\Models\User;
use App\Repositories\RoleUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RoleUserController extends AppBaseController
{
    /** @var  RoleUserRepository */
    private $roleUserRepository;

    public function __construct(RoleUserRepository $roleUserRepo)
    {
        $this->roleUserRepository = $roleUserRepo;
    }

    /**
     * Display a listing of the RoleUser.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roleUserRepository->pushCriteria(new RequestCriteria($request));
        $roleUsers = $this->roleUserRepository->all();

        return view('role_users.index')
            ->with('roleUsers', $roleUsers);
    }

    /**
     * Show the form for creating a new RoleUser.
     *
     * @return Response
     */
    public function create()
    {
        $userArray=[""=>"Select User"];
        $rolesArray=[""=>"Select Role"];

        $users=User::all();
        foreach ($users as $user){
            $userArray[$user->id]=$user->surname.' '.$user->other_names;
        }

        $roles=Role::all();

        foreach ($roles as $role){
            $rolesArray[$role->id]=$role->display_name;
        }
        return view('role_users.create',["users"=>$userArray,"roles"=>$rolesArray]);
    }

    /**
     * Store a newly created RoleUser in storage.
     *
     * @param CreateRoleUserRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleUserRequest $request)
    {
        $input = $request->all();

        $roleUser = $this->roleUserRepository->create($input);

        Flash::success('Role User saved successfully.');

        return redirect(route('roleUsers.index'));
    }

    /**
     * Display the specified RoleUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roleUser = $this->roleUserRepository->findWithoutFail($id);

        if (empty($roleUser)) {
            Flash::error('Role User not found');

            return redirect(route('roleUsers.index'));
        }

        return view('role_users.show')->with('roleUser', $roleUser);
    }

    /**
     * Show the form for editing the specified RoleUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userArray=[""=>"Select User"];
        $rolesArray=[""=>"Select Role"];

        $users=User::all();
        foreach ($users as $user){
            $userArray[$user->id]=$user->surname.' '.$user->other_names;
        }

        $roles=Role::all();

        foreach ($roles as $role){
            $rolesArray[$role->id]=$role->display_name;
        }

        $roleUser = $this->roleUserRepository->findWithoutFail($id);

        if (empty($roleUser)) {
            Flash::error('Role User not found');

            return redirect(route('roleUsers.index'));
        }

        return view('role_users.edit',["users"=>$userArray,"roles"=>$rolesArray])->with('roleUser', $roleUser);
    }

    /**
     * Update the specified RoleUser in storage.
     *
     * @param  int              $id
     * @param UpdateRoleUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleUserRequest $request)
    {
        $roleUser = $this->roleUserRepository->findWithoutFail($id);

        if (empty($roleUser)) {
            Flash::error('Role User not found');

            return redirect(route('roleUsers.index'));
        }

        $roleUser = $this->roleUserRepository->update($request->all(), $id);

        Flash::success('Role User updated successfully.');

        return redirect(route('roleUsers.index'));
    }

    /**
     * Remove the specified RoleUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roleUser = $this->roleUserRepository->findWithoutFail($id);

        if (empty($roleUser)) {
            Flash::error('Role User not found');

            return redirect(route('roleUsers.index'));
        }

        $this->roleUserRepository->delete($id);

        Flash::success('Role User deleted successfully.');

        return redirect(route('roleUsers.index'));
    }
}
