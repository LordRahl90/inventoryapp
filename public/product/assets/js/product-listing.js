

//
// $(function(){
//     $("#productInfoForm").ajaxForm(function(data){
//         console.log(data);
//         console.log(data.success);
//         console.log(data.data)
//         if(!data.success){
//             error(data.message);
//             return false;
//         }
//
//         var responseData=data.data;
//         console.log(responseData);
//         var product_id=responseData.id;
//         console.log("Product ID is: "+product_id);
//         $("#product_id").val(responseData.id);
//         $("#checker_id").val(responseData.id);
//         console.log(responseData.id+": response data loaded");
//         return true;
//     });
//
// });


function success(msg){
    alert(msg);
}

function error(msg){
    alert(msg);
}