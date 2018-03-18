$(function(){

    $("#addMoreImages").click(function(){
        $("#all_images").append($("#more_images").html());
    });


    $(document).on("change","#class_id", function(){
        var class_id=$(this).val();
        $.get("/api/admin/item_classes/"+class_id, function(data){
            $("#category_id").empty();
            $("#category_id").append('<option value="">Select Category</option>');
            if(!data.success){
                return;
            }

            if(data.data.length<=0){
                return;
            }
            var categories=data.data.categories;

            if(categories.length<=0){
                return;
            }

            $.each(categories,function(i,v){
                $("#category_id").append('<option value="'+v.id+'">'+v.category+'</option>');
            });

        });
    });

    $(document).on("change","#category_id", function(){
        var class_id=$(this).val();
        $.get("/api/admin/categories/"+class_id, function(data){
            $("#sub_category_id").empty();
            $("#sub_category_id").append('<option selected disabled value="">Select Sub Category</option>');
            if(!data.success){
                return;
            }

            if(data.data.length<=0){
                return;
            }
            var subCategories=data.data.sub_category;

            if(subCategories.length<=0){
                return;
            }

            $.each(subCategories,function(i,v){
                $("#sub_category_id").append('<option value="'+v.id+'">'+v.sub_category+'</option>');
            });

        });
    });

});