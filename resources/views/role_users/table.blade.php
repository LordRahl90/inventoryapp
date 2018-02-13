<table class="table table-responsive" id="roleUsers-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Role Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roleUsers as $roleUser)
        <tr>
            <td>{!! $roleUser->user_id !!}</td>
            <td>{!! $roleUser->role_id !!}</td>
            <td>
                {!! Form::open(['route' => ['roleUsers.destroy', $roleUser->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('roleUsers.show', [$roleUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('roleUsers.edit', [$roleUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>