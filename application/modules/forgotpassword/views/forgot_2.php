
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Death Committee Login Page</title>

<link rel="stylesheet" type="text/css" href="<?=base_url();?>style/login.css" media="screen" />

</head>

<body>

<div class="wrap">

	<div id="content">

		<div id="main">
        <div style="margin-top:60px;"></div>
        	<div id="logo"><img src="<?=base_url();?>img/admin_img/logo.png" /></div>
            <!----------------------------------------------------------------------->
			
           		
			
				<?php if($this->session->flashdata('error'))
                    {?>
                        <p class="error"><?php echo $this->session->flashdata('error'); ?></p>
                    <?php }
                ?>
            
            	 <p style="color:green;"> <?php if(isset($msgs)){echo $msgs; } ?> </p>
            
			<!---------------------------------------------------------------------->		
			
			<div class="full_w">
            	
				<form action="<?php echo base_url();?>forgotpassword/forgot" method="post">

					<label for="login">Email:</label>

					<input type="email" id="login" name="email" class="text" value="" />
                    <div class="error-field" style="color:red; margin-bottom:10px;"><?php echo form_error('email'); ?></div>

					

					<button type="submit" class="ok">Submit</button>

				</form>

			</div>

		</div>

	</div>

</div>

</body>
</html>

