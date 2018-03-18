@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Inventory
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productInventory, ['route' => ['productInventories.update', $productInventory->id], 'method' => 'patch']) !!}

                        @include('product_inventories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection