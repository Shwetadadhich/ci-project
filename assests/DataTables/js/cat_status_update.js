function changestatus(id,status)
{
	
		 //alert(id);
         
         $.ajax({
                datatype: "json",
                type : "POST",
                url: "Statusproduct",
                data: {id:id,status:status},
                success: function(response)
                {
                    location.reload();
                },
                error: function(jqHXR,status,error)
                {
                   location.reload();
                }
         });
	
      
}


 