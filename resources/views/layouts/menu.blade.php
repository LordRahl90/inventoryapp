<?php

use App\Models\User;
$user=User::find(auth()->user()->id);
?>

@if(auth()->check())
    @if($user->hasRole("admin"))
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
        </li>

        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{!! route('admin.roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
        </li>

        <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
            <a href="{!! route('admin.permissions.index') !!}"><i class="fa fa-edit"></i><span>Permissions</span></a>
        </li>
        <li class="{{ Request::is('permissionRoles*') ? 'active' : '' }}">
            <a href="{!! route('permissionRoles.index') !!}"><i class="fa fa-edit"></i><span>Permission Roles</span></a>
        </li>

        <li class="{{ Request::is('roleUsers*') ? 'active' : '' }}">
            <a href="{!! route('roleUsers.index') !!}"><i class="fa fa-edit"></i><span>Role Users</span></a>
        </li>
    @endif

    <li class="{{ Request::is('wordProcesses*') ? 'active' : '' }}">
        <a href="{!! route('wordProcesses.index') !!}"><i class="fa fa-edit"></i><span>Word App</span></a>
    </li>

    @if($user->hasRole("finance") || $user->hasRole("admin"))
        <li class="{{ Request::is('sageProcesses*') ? 'active' : '' }}">
            <a href="{!! route('sageProcesses.index') !!}"><i class="fa fa-edit"></i><span>Sage App</span></a>
        </li>
    @endif

    @if($user->hasRole("regular")|| $user->hasRole("admin"))
        <li class="{{ Request::is('photoshopProcesses*') ? 'active' : '' }}">
            <a href="{!! route('photoshopProcesses.index') !!}"><i class="fa fa-edit"></i><span>Photoshop App</span></a>
        </li>
    @endif

@endif