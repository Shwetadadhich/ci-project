<?php if($this->session->flashdata('success')){
  	echo '<div class="alert alert-success">
  	      <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
  	      <strong>Success!</strong>'.$this->session->flashdata("success").'
  	       </div>';
  }
?>


<section class="content-header">
            <h1>
              Dashboard
              <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Products</li>
            </ol>
</section>  
<div class="container">
	<div class="row"> 
       <!--<div>
       	  <button type="button" name="add" value="add" class="btn btn-secondary"><a href="<?php //echo base_url('cproducts/addproduct');?>">Add Product</a></button>
       </div><br>-->


	   <div class="col-md-9">
	    
	     <table border="1" class="table table-striped table-hover">
		   <thead>
			<tr>
			    <th>S.No</th>
				<th>Category_title</th>
				<th>Title</th>
				<th>Description</th>
				<th>Image</th>
				<th>Stock</th>
				<th>Added</th>
				<th colspan="2" style="text-align:center;"ty>Action</th>
				<th>Status</th>
			</tr> 
		   </thead>

			<?php if(!empty($products_l)) {
				foreach ($products_l as $ind => $val) { ?> 
					<tr>
					<td><?php echo $val->id;?></td>
							
					  <td><?php echo $val->cat_title;?></td>
					          
					<td><?php echo $val->title;?></td>
		          	<td><?php echo $val->description;?></td>
		          	<?php if(!empty($val->image)){ ?>
                       <td><img style="width:150px; height:150px;" src="<?php echo base_url('./assests/image/'.$val->image)?>" alt=""></td> <?php } else { ?>
                       <td><img style="width:150px; height:150px;" src="<?php echo base_url('./assests/image/default.png'.$val->image)?>" alt=""></td> <?php } ?>
		            <td><?php echo $val->stock;?></td>
		            <td><?php echo $val->added;?></td>
		             <td><a href="<?php echo base_url('products/addproduct/'.$val->id)?>"><i style="font-size:30px;" class="fa fa-pencil" aria-hidden="true"></i></a></td>
		              <td><a href="<?php echo base_url('products/delete/'.$val->id)?>"><i style="font-size:30px; color:red;" class="fa fa-trash-o" aria-hidden="true"></i></a></td>
		              <td>
		                <?php $status = $val->status; 
		                if($status == 0)
		                	{ 
		                ?>
                            <a href="product_status?sid=<?php echo $val->id;?>&sval=<?php echo $val->status;?>" class="btn btn-success">Active</a>
		                <?php 
		                    }
		                    else{
		                     ?>
                            <a href="product_status?sid=<?php echo $val->id;?>&sval=<?php echo $val->status;?>" class="btn btn-danger">InActive</a>
		                 <?php 
		                    } 
		                  ?>
		                </td>
		           
		           </tr> 
				<?php } } else { ?> 
		           <tr>
		           	 <td colspan="6">OOPS! NO RECORD FOUND</td>
		           </tr>
				<?php } ?>
		</table>
	   </div>
</div>
</div>


<div class="container">
  <div class="row">
    <div class="pagination"><?php echo $pagination; ?></div>
  </div>
</div>

