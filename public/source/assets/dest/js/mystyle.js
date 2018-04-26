$(document).ready(function () {
    $('.edit').click( function() {
        var rowid = $(this).attr("id");
       	var qty = $(this).parent().parent().parent().parent().find(".qty").val();
       
       	var token = $("input[name='_token']").val();
       $.ajax({
       			url:'customer/showall/editshop/'+rowid+'/'+qty,
       			type:'GET',
       			cache:false,
       			data:{"_token":token,"id":rowid,"qty":qty},
       			success:function(data){
       				if(data == "oke")
       				{
       					window.location = "customer/showall/giohang"
       				}
              else{
                 alert(data);
                 window.location = "customer/showall/giohang"
              }
       			},error: function (data) {
                console.log('Error:', data);
            }
       });
    });
});