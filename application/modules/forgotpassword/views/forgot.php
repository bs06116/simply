<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Simply Precast | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url()?>/img/simply_logo.png" />
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <p class="login-box-msg">
  
  <?php if(isset( $msgs)){   echo $msgs;  } 
  
 echo  $this->session->flashdata('error')
  ?></p>
 
    <!-- <p class="login-box-msg">Sign in to start your session</p> -->

    <form action="<?php echo base_url()?>forgotpassword/forgot" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $this->session->flashdata('email');?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		<?php echo validation_errors(); ?>  
      </div>
     
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
           
          </div>
		  <div class="checkbox icheck">
            <label>
			
             
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-12 s-frg">
        <div class="col-xs-6  s-frg1">
          <button type="submit" class="btn btn-primary btn-block btn-flat pull-right">Submit</button>
        </div>
        <div class="col-xs-6  s-frg2">
          <a href="<?php echo base_url();?>" class="btn btn-primary btn-block btn-flat pull-right">Back</a>
        </div>
		
			
         
          
        </div>
        <!-- /.col -->
      </div>
    </form>

   <!-- <a href="#">I forgot my password</a>--><br>
	<?php if($this->session->flashdata('login_error')) { ?>

                <p class="text-red"><?php echo $this->session->flashdata('login_error'); ?></p>

            <?php } ?>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>application/modules/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>application/modules/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>application/modules/assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
