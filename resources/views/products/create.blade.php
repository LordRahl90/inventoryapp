@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'products.store']) !!}

                        @include('products.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    <script>
        $(function(){

            $(document).on("change","#product_category_id", function(){
                var categoryID=$(this).val();
                $("#product_sub_category_id").empty();
                $("#product_sub_category_id").append('<option value="">Select SubCategory</option>');
                $.get("/api/categories/"+categoryID, function(response){
                    console.log(response);

                    if(!response.success){
                        error(response.message);
                        return;
                    }

                    subCategory=response.data.sub_category;

                    if(subCategory.length>0){
                        $.each(subCategory,function(i,v){
                            $("#product_sub_category_id").append('<option value="'+v.id+'">'+v.sub_category+'</option>');
                        });
                    }
                });
            });

        });
    </script>
@endsection