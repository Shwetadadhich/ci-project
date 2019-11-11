
<?php //echo validation_errors(); ?>
<style type="text/css">
	.bootstrap-tagsinput 
	{
		white-space: nowrap;
		width: 100%;
		border: 2px solid #ccc;
	}
</style>

<section class="content-header">
	<div class="row">
		<div class="col-md-12">
			<?php $add_edit =(empty($get_user))? "Add": "Edit" ?>
			<h1 style="text-align:center;"><?php echo $add_edit; ?> User</h1>
		</div>
	</div>
</section>

<section class="content">
	<div class="row card">
	<div class="card-body">


		<form action="" method="post" enctype="multipart/form-data">
			<!-- <div class="col-sm-6"> -->

			<div class="col-sm-4 col-md-4">
				<div class="form-group">
					<label>Name<span style="color:red;">*</span></label>
					<input type="text" name="name" value="<?php echo isset($get_user->name)? $get_user->name : ''; ?>" placeholder="name" class="form-control" autocomplete="off" >
						<span style="color:red;">
					  <?php if(isset($errors['name']))
					  {
					     echo $errors['name']? $errors['name'] : '' ; 
					     //p($errors);
					  } 
					   ?></span> 
				</div>
			</div>

			<div class="col-sm-4 col-md-4">
				<div class="form-group">
					<label>User Name<span style="color:red;">*</span></label>
					<input type="text" name="uname" value="<?php echo isset($get_user->user_name)? $get_user->user_name : ''; ?>" placeholder="User name" class="form-control" autocomplete="off">
					<span style="color:red;">
					  <?php if(isset($errors['uname']))
					  {
					     echo $errors['uname']? $errors['uname'] : '' ; 
					     //p($errors);
					  } 
					   ?></span> 
				</div>
			</div>

			<div class="col-sm-4 col-md-4">
				<div class="form-group">
					<label>Email<span style="color:red;">*</span></label>
					<input type="text" name="email" value="<?php echo isset($get_user->email)? $get_user->email : ''; ?>" placeholder="abc@example.com" class="form-control">
					<span style="color:red;">
					  <?php if(isset($errors['email']))
					  {
					     echo $errors['email']? $errors['email'] : '' ; 
					     //p($errors);
					  } 
					   ?></span> 
				</div>
			</div>

			<div class="clearfix"></div>

			<div class="col-sm-4 col-md-4">
				<div class="form-group">
					<label>Number<span style="color:red;">*</span></label>
					<input type="number" name="number" value="<?php echo isset($get_user->number)? $get_user->number : ''; ?>" placeholder="Phone Number" class="form-control">
				</div>
			</div>

			<div class="col-sm-4 col-md-4">
				<div class="form-group">
					<?php
					if (isset($get_user->dob)) {
		 				// p($get_user->dob,0);
						$dobb =$get_user->dob;
						$newDate = date("m/d/Y", strtotime($dobb));
		          // p($newDate);
					}?>
					<label>Date Of Birth<span style="color:red;">*</span></label>
					<input type="text" name="dob" id="datepicker" value="<?php echo isset($newDate)? $newDate : ''; ?>" placeholder="mm/dd/yyyy" class="form-control" autocomplete="off">
					<span style="color:red;">
					  <?php if(isset($errors['dob']))
					  {
					     echo $errors['dob']? $errors['dob'] : '' ; 
					     //p($errors);
					  } 
					   ?></span> 
				</div>
			</div>


			<div class="col-sm-4 col-md-4">
				<label>Hobby</label>
				<div class="gorm-group">
				<input type="text" placeholder="Your Hobby" name="hobby" value="<?php echo isset($get_user->hobby)? $get_user->hobby : ''; ?>" id="tags" class="form-control" />	   
				</div>
				<div class="items"></div>
			</div>	


			<div class="clearfix"></div>	

			<div class="col-sm-4 col-md-4">
				<div class="form-group">
					<label>Image</label>
					<?php if(!empty($get_user->image)){?>
						<img style="max-width:100px;" src="<?php echo base_url('assests/DataTables/images/'.$get_user->image); ?>"> <?php } ?>
						<input type="file" name="image" value="" class="form-control">
					</div>
				</div>


				<div class="col-sm-4 col-md-4">
					<div class="form-group">
						<label>Password<span style="color:red;">*</span></label>
						<input type="password" name="password" id="password" placeholder="****" class="form-control" autocomplete="off">
						<span style="color:red;">
							  <?php if(isset($errors['password']))
							  {
							     echo $errors['password']? $errors['password'] : '' ; 
							     //p($errors);
							  } 
					   ?></span> 
					</div>
				</div>


				<div class="col-sm-4 col-md-4">
					<div class="form-group">
						<label>Confirm Password<span style="color:red;">*</span></label>
						<input type="password" name="confirm_password" id="confirm_password" placeholder="****" class="form-control" autocomplete="off"><span id='message'></span>
						<!--<span style="color:red;"><?php if(isset($errors['c_password'])){ ($errors['c_password']); } ?></span>--> 
					</div>
				</div>

				<div class="clearfix"></div>

				<div class="col-sm-4 col-md-4">
					<div class="form-group">
						<label>User Type</label>
						<select class="form-control" id="usertype" name="usertype" required="">
							<option  value="">Select One</option>
							<option <?php if(isset($get_user->user_type)){echo ($get_user->user_type == 'administrator')? 'selected' : '' ; } ?> value="administrator">Administrator</option>
							<option <?php if(isset($get_user->user_type)){echo ($get_user->user_type == 'user')? 'selected' : '' ; } ?>  value="user">USer</option>
						</select>
					</div>
				</div>


				<div class="col-sm-4 col-md-4">
					<div class="form-group">
						<label class="form-grouP">Gender: <span style="color:red;">*</span></label>
						<label class="form-control">
						Male
						<input type="radio" name="gender" <?php if(isset($get_user->gender)){echo $get_user->gender == 'male' ? 'checked="true"' : '' ; }?> value="male">
						Female
						<input type="radio" name="gender" <?php if(isset($get_user->gender)){echo $get_user->gender == 'female'? 'checked="true"' : '' ; }?> value="female" />
						Other
						<input type="radio" name="gender" <?php if(isset($get_user->gender)){echo $get_user->gender == 'other'? 'checked="true"' : '' ; } ?> value="other">
						</label>
						<span style="color:red;">
							  <?php if(isset($errors['gender']))
							  {
							     echo $errors['gender']? $errors['gender'] : '' ; 
							     //p($errors);
							  } 
					   ?></span> 
					</div>
				</div>


				<div class="col-sm-4 col-md-4"></div>

				<div class="clearfix"></div>		

				<!-- </div> -->

				<div class="col-sm-12 text-center"> 

					<?php $save=(empty($get_user))? "add": "update" ?>
					<input type="submit" name="<?php echo $save; ?>" value="<?php echo ucfirst($save); ?>" class="btn btn-info">
				</div>


			</form>
			</div>
		</div>
	</section>


	<script>
		$(function () {
			$("#datepicker").datepicker({ dateFormat: 'DD-MM-YY' });
		});
		$(document).ready(function() 
		{
      // $("#datepicker").datepicker({
      // 	minDate: 0,
      //  dateFormat: 'yy-mm-dd'
      //  //autoclose: true
      // });
$('#tags').tagsinput({
      	allowDuplicates: true
      });

$('#confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
    } else 
        $('#message').html('Not Matching').css('color', 'red');
});

});
</script>

