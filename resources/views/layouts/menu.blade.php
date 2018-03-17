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
@endif
<li class="{{ Request::is('productCategories*') ? 'active' : '' }}">
    <a href="{!! route('productCategories.index') !!}"><i class="fa fa-edit"></i><span>Product Categories</span></a>
</li>

<li class="{{ Request::is('productSubCategories*') ? 'active' : '' }}">
    <a href="{!! route('productSubCategories.index') !!}"><i class="fa fa-edit"></i><span>Product Sub Categories</span></a>
</li>


<li class="{{ Request::is('customers*') ? 'active' : '' }}">
    <a href="{!! route('customers.index') !!}"><i class="fa fa-edit"></i><span>Customers</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>

<li class="{{ Request::is('orderDetails*') ? 'active' : '' }}">
    <a href="{!! route('orderDetails.index') !!}"><i class="fa fa-edit"></i><span>Order Details</span></a>
</li>

<li class="{{ Request::is('productInventories*') ? 'active' : '' }}">
    <a href="{!! route('productInventories.index') !!}"><i class="fa fa-edit"></i><span>Product Inventories</span></a>
</li>

<li class="{{ Request::is('productProcurements*') ? 'active' : '' }}">
    <a href="{!! route('productProcurements.index') !!}"><i class="fa fa-edit"></i><span>Product Procurements</span></a>
</li>

