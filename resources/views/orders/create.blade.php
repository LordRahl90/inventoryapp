@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Order
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'orders.store']) !!}

                        @include('orders.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    <script>
        $(function(){
            $(document).on("click","#addMoreOrderDetail",function(){
                $("#orderContent").append($("#moreOrders").html());
            });

            $(document).on('change',".quantity", function(){
                var quantity=$(this).val();

                // alert(quantity);
            });

            $("#customerPhone").change(function(){
                var customerPhone=$(this).val();

                $("#customerFirstname").removeAttr("readonly");
                $("#customerOthernames").removeAttr("readonly");
                $("#customerEmail").removeAttr("readonly");
                $("#customerAddress").removeAttr("readonly");

                $("#customerID").val("");
                $("#customerFirstname").val("");
                $("#customerOthernames").val("");
                $("#customerEmail").val("");
                $("#customerAddress").val("");

                $.get("/api/customer/"+customerPhone, function(response){
                    console.log(response.success);
                   if(!response.success){
                       console.log(response);
                       // $("#customerFirstname").removeAttr("readonly");
                       // $("#customerFirstname").removeAttr("readonly");
                       // $("#customerOthernames").val(customer.other_names);
                       // $("#customerEmail").val(customer.email);
                       // $("#customerAddress").val(customer.address);
                       // error(response.message);
                       return;
                   }
                   else{
                       var customer=response.data;
                       console.log(customer.id);

                       $("#customerID").val(customer.id);
                       $("#customerFirstname").val(customer.firstname);
                       $("#customerOthernames").val(customer.other_names);
                       $("#customerEmail").val(customer.email);
                       $("#customerAddress").val(customer.address);

                       $("#customerFirstname").prop("readonly","readonly");
                       $("#customerOthernames").prop("readonly","readonly");
                       $("#customerEmail").prop("readonly","readonly");
                       $("#customerAddress").prop("readonly","readonly");
                   }
                });
            });
        });


    </script>
@endsection