<?php if($this->session->flashdata('success')){
  	echo '<div class="alert alert-success">
  	      <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
  	      <strong>Success!</strong>'.$this->session->flashdata("success").'
  	       </div>';
  }
?>

<?php if($this->session->flashdata('error')){
  	echo '<div class="alert alert-danger">
  	      <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
  	      <strong>Error!</strong>'.$this->session->flashdata("Error").'
  	       </div>';
  }
?>


<section class="content-header">
            <h1>Products List</h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
              <li class="active">Products</li>
            </ol>
</section>  

<div class="box">
            <!--<div class="box-header">
              <h3 class="box-title"></h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
               <div class="row">
               <div class="col-sm-6">
               <div class="dataTables_length" id="example1_length"><label>Show 
               <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">4</option>
               <option value="25">10</option>
               <option value="50">20</option>
               <option value="100">50</option></select> entries</label></div></div>
               
        <form action="<?php echo base_url('products/product'); ?>" method="GET" >
	          <div>
	            <input type="search" name="search" autocomplete="off" class="form-control" placeholder="Search..." value="<?php echo isset($_GET['search'])?$_GET['search']:"";?>">
	            <span class="input-group-btn">
	                <button type="submit" value="search" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
	            </span>
	          </div>
        </form>
		              

              <div class="row">
              <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 69px;" aria-sort="ascending">S.no</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 89px;">Title</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 77px;">product Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 56px;">Description</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 36px;">Image</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 36px;">Stock</th>
                <!--<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 36px;">Added</th>-->
                <th colspan="2" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" aria-label="CSS grade: activate to sort column ascending" style="width:36px;text-align:center;">Action</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 36px;">Status</th>
                </tr>
            </thead>
            <tbody>
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
		            
		            <td>
		              <a href="<?php echo base_url('products/addproduct/'.$val->id)?>"><i style="font-size:30px;" class="fa fa-pencil" aria-hidden="true"></i>
		              </a></td>
		            <td>
		              <a href="<?php echo base_url('products/delete/'.$val->id)?>"><i style="font-size:30px; color:red;" class="fa fa-trash-o" aria-hidden="true"></i>
		              </a></td>
		              <td>
		                <?php $status = $val->status; 
		                if($status == 0)
		                	{ 
		                ?>
                            <a href="Statusproduct?sid=<?php echo $val->id;?>&sval=<?php echo $val->status;?>" class="btn btn-success">Active</a>
		                <?php 
		                    }
		                    else{
		                     ?>
                            <a href="Statusproduct?sid=<?php echo $val->id;?>&sval=<?php echo $val->status;?>" class="btn btn-danger">InActive</a>
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
			</tbody>
              <tfoot>
                <tr>
	                <th rowspan="1" colspan="1">S.No</th>
	                <th rowspan="1" colspan="1">Title</th>
	                <th rowspan="1" colspan="1">Product Name</th>
	                <th rowspan="1" colspan="1">Description</th>
	                <th rowspan="1" colspan="1">Image</th>
	                <th rowspan="1" colspan="1">Stock</th>
	                <th rowspan="1" colspan="2" style="text-align:center;">Action</th>
	                <th rowspan="1" colspan="1">Status</th>
                </tr>
             </tfoot>
              </table></div></div>
              <div class="row">
              <div class="col-sm-5">
              	<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
              </div>
              
              <div class="col-sm-7">
	              <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
	                 <div class="pagination"><?php echo $pagination; ?></div>
				  </div>
            <!-- /.box-body -->
             </div>












































<!--<div class="container">
	<div class="row"> 
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
				<th colspan="2" style="text-align:center;">Action</th>
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
                            <a href="Statusproduct?sid=<?php echo $val->id;?>&sval=<?php echo $val->status;?>" class="btn btn-success">Active</a>
		                <?php 
		                    }
		                    else{
		                     ?>
                            <a href="Statusproduct?sid=<?php echo $val->id;?>&sval=<?php echo $val->status;?>" class="btn btn-danger">InActive</a>
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
</div>-->

