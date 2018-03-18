<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $permissionRole->id !!}</p>
</div>

<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', 'Role Id:') !!}
    <p>{!! $permissionRole->role_id !!}</p>
</div>

<!-- Permission Id Field -->
<div class="form-group">
    {!! Form::label('permission_id', 'Permission Id:') !!}
    <p>{!! $permissionRole->permission_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $permissionRole->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $permissionRole->updated_at !!}</p>
</div>

