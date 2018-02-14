@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Photoshop App
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('photoshop_processes.show_fields')
                    <a href="{!! route('photoshopProcesses.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
