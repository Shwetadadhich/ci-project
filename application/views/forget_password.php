
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/plugins/iCheck/square/blue.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<style type="text/css">
          .form-wrapper-outer{
            padding: 40px;
            border-radius: 8px;
            margin: auto;
            width: 460px;
            border: 1px solid black;
            background: white;
            margin-top: 7%;
        }

        .form-wrapper-outer .form-logo{
            margin: 0px auto 15px;
            width: 100px;
        }
    
        .form-wrapper-outer .form-logo img{
            width: 100%;
        }
    
        .form-greeting{
            text-align: center;
            font-size: 25px;
            margin-bottom: 15px;
        }
    
        .form-button{
            text-align: right;
        }

        .field-wrapper{
            position: relative;
            margin-bottom: 15px;
        }
    
        .field-wrapper input{
            border: 1px solid #DADCE0;
            padding: 15px;
            border-radius: 4px;
            width: 100%;
        }

        .field-wrapper .field-placeholder{
            font-size: 17px;
            position: absolute;
            /* background: #fff; */
            bottom: 17px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #80868b;
            left: 8px;
            padding: 0 8px;
            -webkit-transition: transform 150ms cubic-bezier(0.4,0,0.2,1),opacity 150ms cubic-bezier(0.4,0,0.2,1);
            transition: transform 150ms cubic-bezier(0.4,0,0.2,1),opacity 150ms cubic-bezier(0.4,0,0.2,1);
            z-index: 1;

            text-align: left;
            width: 100%;
        }        
        
        .field-wrapper .field-placeholder span{
            background: #ffffff;
            padding: 0px 8px;
        }

        .field-wrapper input:not([disabled]):focus~.field-placeholder
        {
            color:#1A73E8;
        }
    
        .field-wrapper input:not([disabled]):focus~.field-placeholder,
        .field-wrapper.hasValue input:not([disabled])~.field-placeholder
        {
            -webkit-transform: scale(.75) translateY(-39px) translateX(-60px);
            transform: scale(.75) translateY(-39px) translateX(-60px);
            
        } 
        .login-logo, .register-logo {
           padding-left:95px;
        }

        .field-wrapper.field-error{
          border: 1px solid red;
        }
        .field-wrapper.field-error .field-placeholder span{
          color: red;
        }

        #message-wrap {
            padding: 15px;
            text-align: center;
            display: none;
            border-radius: 4px;
        }

        #message-wrap.success-msg{
          color:green;
          background: #e3ffd5;
        }
        #message-wrap.error-msg{
          color:red;
          background: #ffd5d5;
        }
</style>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>STORE</a>
  </div>

  <!-- /.login-logo -->
   <form id="resetPassword" method="post" action="<?php echo base_url();?>Authenticate/recover_password" onsubmit ='return validate()'>
  <div class="form-wrapper-outer">
    <p class="login-box-msg" style="font-size:30px;"><b>Forget Your Password</b></p>

      <div class="field-wrapper">
        <input type="email" class="form-control" placeholder="Email...@" id="email" name="email" required/>
        <span style="color:red;"><?php echo form_error('email'); ?></span>
      </div>
      
      <div class="form-button">
          <input type="submit" value="submit" class="btn btn-primary">
      </div>
</div>
  <!-- /.form-wrapper-outer -->
</div></form>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assests/theme/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assests/theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assests/theme/plugins/iCheck/icheck.min.js"></script>

<script>
  /*$(function () {
     $('#action_forget_password').click(function()
     {
        var forget_email = $('#forget_email').val();
        if(ValidateEmail(forget_email)){
          $.post("<?php //echo base_url('Authenticate/forget_password'); ?>",
        {
          forget_email: forget_email
        },

        function(data){
            $('#msg').html(data);
        });
        }
        else
        {
            $('#msg').html('<strong style="color: red;">Invalid Email Format.</strong>');
            $("#forget_email").focus();
        }
    });
});*/

</script>
</body>
</html>
