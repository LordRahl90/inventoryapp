<table class="table table-responsive" id="photoshopProcesses-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Image</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($photoshopProcesses as $photoshopProcess)
        <tr>
            <td>{!! $photoshopProcess->title !!}</td>
            <td>{!! $photoshopProcess->image !!}</td>
            <td>{!! $photoshopProcess->description !!}</td>
            <td>
                {!! Form::open(['route' => ['photoshopProcesses.destroy', $photoshopProcess->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('photoshopProcesses.show', [$photoshopProcess->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('photoshopProcesses.edit', [$photoshopProcess->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>