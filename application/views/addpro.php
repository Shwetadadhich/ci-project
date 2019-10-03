<?php $add_edit =(empty($get_edit))? "Add": "Edit" ?>
<h1 style="text-align:center;"><?php echo $add_edit; ?> Product</h1>


<?php 
  if($this->session->flashdata('error')){
  	echo '<div class="alert alert-danger">
  	       <strong>Error!</strong>'.$this->session->flashdata("error").'
  	       </div>';
  }

  /*if($this->session->flashdata('success')){
  	echo '<div class="alert alert-success">
  	       <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
  	      <strong>Success!</strong>'.$this->session->flashdata("success").'
  	       </div>';
  }*/

 if(validation_errors()){
  	echo '<div class="alert alert-danger">
  	      <strong>Error!</strong>'.validation_errors().'
  	       </div>';
  }

?>



<div class="container" style="margin:10px; padding:15px;">
  <div class="row">
  	 <div class="col-md-7">
  	 	<form action="" method="POST" enctype="multipart/form-data">
  	 		<div class="form-group">
  	 			<label for="id">Category Title</label>
  	 			<select class="form-control" id="id" name="id">
  	 				<option>select one</option>
		  	 	<?php if(!empty($allcat)) {
					foreach ($allcat as $ind => $cat) { 
						$select=($cat->cat_id == $get_edit->cat_id)? "selected": "" 
						?> 

						<option <?php echo $select;?> value="<?php echo $cat->cat_id?>"><?php echo $cat->cat_title; ?></option>
            
			    <?php } }  ?>
  	 			</select>
  	 		</div>
  	 		
  	 		<div id="category" class="form-group">
  	 		  	
  	 		</div>

  	 		<div class="form-group">
  	 			<label for="Title">Title</label>
  	 			<input type="text" name="title" placeholder="Title name" id="title" class="form-control" autocomplete="off" value="<?php echo (empty($get_edit))? "" : $get_edit->title; ?>">
  	 		</div><br>
  	 		<div class="form-group">
  	 			<label for="Description">Description</label>
  	 			<input type="text" name="description" placeholder="Description" class="form-control" autocomplete="off" value="<?php echo (empty($get_edit))? "" : $get_edit->description; ?>">
  	 		</div>
  	 		<div class="form-group">
  	 			<label for="image">Image</label>
  	 	        <?php if(!empty($get_edit->image)){?>
  	 	        <img style="max-width:100px;" src="<?php echo base_url('assests/image/'.$get_edit->image); ?>"> <?php } ?>
  	 			<input type="file" name="image" class="form-control" value="">
  	 		</div>
  	 		<div class="form-group">
  	 			<label for="stock">Stock</label>
  	 			<input type="number" name="stock" class="form-control" value="<?php echo (empty($get_edit))? "" : $get_edit->stock; ?>">
  	 		</div>
  	 		<div class="form-group">
  	 		    <?php $save=(empty($get_edit))? "add": "update" ?>

  	 			<input type="submit" name="<?php echo $save;?>" class="form-control btn btn-info" value="<?php echo ucfirst($save);?>">
  	 		</div>
  	 	</form>
  	 </div>
  </div>
	
</div>

 <script>
      $(document).ready(function(){
         $("#id").on("change",function(){
         	//console.log('fdgdggg');
         	//alert('dfsdfffd').val();
             var cat_id = $(this).val();

             var request = $.ajax({
                 url: "<?php echo base_url('products/get_category') ?>",
                 type: "POST",
                 data :{catid : cat_id},
                 dataType: "json"
             });

             request.done(function(data){
                //console.log(data);
                $("#category").html('');

                if(data.category.length){
                	var listItems = '';
                	$(data.category).each(function(key,value){
                       console.log(value);
                       listItems  += "<option value='"+value.category_id+"'>"+value.cname+"</option>";
                	});
                	$("#category").html('<label for="cat">Sub category</label><select class="form-control" id="category" name="category">'+listItems+'</select>');
                }
             });

                request.fail(function(jqXHR, error){
             	alert("request failed: "+ error );
             });
         });
      });
 </script>








