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


<!--<div class="container">
        <h1 style="font-size:20pt">Simple Serverside Datatable Codeigniter</h1>
 
        <h3>Customers Data</h3>
        <br />

        <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
               <div class="row">
               <div class="col-sm-6">
            <form action="<?php echo base_url('products/product'); ?>" method="POST" >
               <div class="dataTables_length" id="example1_length"><label>Show 
               <select name="example1_length" aria-controls="example1" class="form-control input-sm">
               <option value="10">10</option>
               <option value="15">15</option>
               <option value="30">30</option>
               <option value="50">50</option></select> entries</label></div></div>
               <div class="col-sm-6">
			     <div class="dataTables_filter" id="example1_filter">
			      <label>
				        <div>
                            <input type='text' name='search' value="search" placeholder='Search Product..' autocomplete='off'>
				            <!--<button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>-->
				            
       <div class="content">
        <div class="row">
        <table id="table" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Cat_id</th>
                    <th>title</th>
                    <th>Description</th>
                    <th>image</th>
                    <th>stock</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    </div>
 








	
		
           <!-- <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
               <div class="row">
               <div class="col-sm-6">
            <form action="<?php echo base_url('products/product'); ?>" method="GET" >
               <div class="dataTables_length" id="example1_length"><label>Show 
               <select name="example1_length" aria-controls="example1" class="form-control input-sm">
               <option value="10">10</option>
               <option value="15">15</option>
               <option value="30">30</option>
               <option value="50">50</option></select> entries</label></div></div>
               <div class="col-sm-6">
			     <div class="dataTables_filter" id="example1_filter">
			      <label>
				        <div>
                            <input type='text' name='search' placeholder='Search Product..' autocomplete='off' value='<?php $search ?>'>
				            <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>
				        </div>
			</form>
			      </label>
			     </div>
		       </div>       

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
                <th colspan="2" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" aria-label="CSS grade: activate to sort column ascending" style="width:36px;text-align:center;">Action</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 36px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($result)) {
                  $sno = $row+1;
  				foreach ($result as $data) { ?> 
					<tr>
					<td><?php echo $sno++;?></td>
							
					<td><?php echo $data['cat_title'];?></td>
					          
					<td><a href='target='_blank'><?php echo $data['title'];?></td>
		          	<td><?php echo $data['description'];?></td>
		          	<?php if(!empty($data['image'])){ ?>
                       <td><img style="width:150px; height:150px;" src="<?php echo base_url('./assests/DataTables/images/'.$data['image'])?>" alt=""></td> <?php } else { ?>
                    <td><img style="width:150px; height:150px;" src="<?php echo base_url('./assests/DataTables/images/default.png'.$data['image'])?>" alt=""></td> <?php } ?>
		            <td><?php echo $data['stock'];?></td>
		            
		            <td>
		              <a href="<?php echo base_url('products/addproduct/'.$data['id'])?>"><i style="font-size:30px;" class="fa fa-pencil" aria-hidden="true"></i>
		              </a></td>
		            <td>
		              <a href="<?php echo base_url('products/delete/'.$data['id'])?>"><i style="font-size:30px; color:red;" class="fa fa-trash-o" aria-hidden="true"></i>
		              </a></td>
		              <td>
		                <?php $status = $data['status']; 
		                if($status == 0)
		                	{ 
		                ?>
                            <a href="Statusproduct?sid=<?php echo $data['id'];?>&sval=<?php echo $data['status'];?>" class="btn btn-success">Active</a>
		                <?php 
		                    }
		                    else{
		                     ?>
                            <a href="Statusproduct?sid=<?php echo $data['id'];?>&sval=<?php echo $data['status'];?>" class="btn btn-danger">InActive</a>
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
             
              </table></div></div>
              <div class="row">
              <div class="col-sm-5">
              	<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
              </div>
              
              <div class="col-sm-7">
	              <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
	                 <div class="pagination"><?php echo $pagination; ?></div>
				 </div>
            
             </div>-->












































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

