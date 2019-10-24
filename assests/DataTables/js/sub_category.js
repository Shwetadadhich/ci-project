$(document).ready(function(){
           // alert("success");
    $("#id").on("change",(function(){
             var cat_id = $("#id").val();
          
            var request = $.ajax({
                 url: "get_category",
                 type: "POST",
                 data :{cat_id : cat_id},
                 dataType: "json"
             });

             request.done(function(data){
               //console.log(data);
                $("#category").html('');
                if(data.category.length){
                    var listItems = '';
                    $(data.category).each(function(key,value){
                       console.log(value);
                       listItems  += "<option value='"+value.id+"'>"+value.cname+"</option>";
                    });
                    $("#category").html('<label for="cat">Sub category</label><select class="form-control" id="category" name="category">'+listItems+'</select>');
                }
             });

                request.fail(function(jqXHR, error){

                alert("request failed: "+ error );
             });
         }));
        
});



