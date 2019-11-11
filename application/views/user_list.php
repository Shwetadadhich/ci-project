<?php 
  if($this->session->flashdata('success')){
  	echo '<div class="alert alert-success">
  	       <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
           <strong>success ! </strong>'.$this->session->flashdata("success").'
  	       </div>';
  }

?>

  <section class="content-header">
            <h1>Users List</h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
              <li class="active">Users</li>
            </ol>
            <form action="<?php echo base_url("UserController/adduser"); ?>">
               <div class="form-group">
            	<input type="submit" name="add user" value="New User" class="btn btn-primary" style="float:right;margin-bottom:15px;">
               </div>	
            </form>

</section>  
				            
 <div class="content">
    <div class="row">
        <table id="user_table" class="table table-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>User type</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>email</th>
                    <th>number</th>
                    <th>image</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Hobby</th>
                    <!--<th>Status</th>-->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
 

