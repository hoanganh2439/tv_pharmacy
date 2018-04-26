function search(){
	 var timkiem = $('#timkiem1').val();
       // $('#tb').html('');
        
         $.ajax({
            type : 'get',
            dataType : 'json',
            url : 'customer/showall/search/'+timkiem,
            data : { timkiem:timkiem },
            success: function(data){
                      // $.each(data, function (i, pro) {
                         
                      //  });
                alert(data);
              },
              error :function()
              {
                 alert('not nok');
              }
          });
}