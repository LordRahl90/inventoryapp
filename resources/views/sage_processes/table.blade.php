<table class="table table-responsive" id="sageProcesses-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Account</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sageProcesses as $sageProcess)
        <tr>
            <td>{!! $sageProcess->title !!}</td>
            <td>{!! $sageProcess->account !!}</td>
            <td>{!! $sageProcess->description !!}</td>
            <td>
                {!! Form::open(['route' => ['sageProcesses.destroy', $sageProcess->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sageProcesses.show', [$sageProcess->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sageProcesses.edit', [$sageProcess->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>