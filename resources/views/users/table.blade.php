<table class="table table-responsive" id="users-table">
    <thead>
        <tr>
            <th>Username</th>
        <th>Password</th>
        <th>Surname</th>
        <th>Other Names</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->username !!}</td>
            <td>{!! $user->password !!}</td>
            <td>{!! $user->surname !!}</td>
            <td>{!! $user->other_names !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->phone !!}</td>
            <td>{!! $user->role_id !!}</td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>