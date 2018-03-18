@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Procurement
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productProcurement, ['route' => ['productProcurements.update', $productProcurement->id], 'method' => 'patch']) !!}

                        @include('product_procurements.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection