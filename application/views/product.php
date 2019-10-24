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
				            
 <div class="content">
    <div class="row">
        <table id="table" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category Name</th>
                    <th>Sub Category Name</th>
                    <th>Product Name</th>
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
 








	
		
         
                <!--<?php if(!empty($result)) {
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
			</tbody>-->
             
             










































