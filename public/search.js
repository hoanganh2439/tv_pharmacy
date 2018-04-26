function search(){
	 var timkiem = $('#timkiem1').val();
        
        
         $.ajax({
            type : 'get',
            dataType : 'hmtl',
            url : 'customer/showall/search/'+timkiem,
            data : { timkiem:timkiem },
            success: function(data){

            	 $("#result2").html('');

                       $.each(data, function (i, pro) {

                       		 $("p").append(pro.proname);

                       		// $('#result2').html(pro.price);
                        });
                
              },
              error :function()
              {
                 alert('not nok');
              }
          });
}