<!DOCTYPE html>

<html><head>

  <!--date picker-->

  <title>SimplyPrecast</title>

  <link rel="stylesheet" href="application/modules/assets/bootstrap/css/jquery-ui.css">
  <!-- ======usman===== -->
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/assets/dist/css/jquery.mCustomScrollbar.css" />

  <!-- ================ -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



<script src="application/modules/assets/bootstrap/js/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>





  

 

  <!--datepicker ends here-->

  <!--embeded code-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"/>

  <!--ends here>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Simply Precast | Top Navigation</title>

<!- Tell the browser to be responsive to screen width -->

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Bootstrap 3.3.6 -->

<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/assets/bootstrap/css/bootstrap.min.css">

<!-- SELECT 2 -->

<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/assets/plugins/select2/select2.min.css">

<!-- DATA TABLE -->

<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/assets/plugins/datatables/dataTables.bootstrap.css">

<!-- Font Awesome -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

<!-- Ionicons -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<!-- Theme style -->

<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/assets/dist/css/AdminLTE.min.css">

<!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/assets/dist/css/skins/_all-skins.min.css">

<!-- CUSTOM STYLE -->

<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/assets/dist/css/custom.css">

<link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/assets/plugins/validator/formValidation.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/modules/assets/plugins/stepform/jquery.stepy.css" />

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">





<!--multi select files start-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>

<!-- multi select files end -->



<!--popup files start-->





<!--popup files end-->



<!-- jQuery 2.2.3 --> 

<script src="<?php echo base_url(); ?>application/modules/assets/plugins/jQuery/jquery.min.js"></script> 

<!-- Bootstrap 3.3.6 --> 

<script src="<?php echo base_url(); ?>application/modules/assets/bootstrap/js/bootstrap.min.js"></script> 

<script type="text/javascript">
       /* window.history.forward();
        function noBack()
        {
            window.history.forward();
        }*/
		history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});
</script>
<!--<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">-->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

<!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->

</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-red sidebar-mini">

<div class="wrapper">

<header class="main-header">
  

    <!-- Logo -->

    <a href="<?php echo base_url(); ?><?php echo $this->config->item('dashboard_path'); ?>" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b>A</b>LT</span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><img src="<?php echo base_url()?>img/simply_logo.png" /></span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
       <span style="color: white;
    font-size: 18px;
    font-weight: bold;   padding: 14px 0px 0px 14px;
    float: left;"> Simply Certificates - Trusted Quality & Service</span>
      
    <!-- ===========s-menu=3/9/2017================== -->
      <div class="s-menu-btn">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <!-- ===========End================== -->

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

         

          

          <!-- User Account: style can be found in dropdown.less -->

          <li class="dropdown user user-menu"> 

              <!-- Menu Toggle Button --> 

              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 

              <!-- The user image in the navbar--> 
<?php
$result=$this->commons_model->single_record('users','userid',$this->session->userdata('user_id'));

if($result->image_name){
$image_name=$result->image_name;
}else{
    $image_name="no_img.jpg";
}
?>
              <img src="<?php echo base_url(); ?>img/<?php echo $image_name;?>" class="user-image" alt="User Image">

              <!-- hidden-xs hides the username on small devices so only the image appears. --> 

              <span class="hidden-xs"> <?php echo $this->session->userdata('username') ?></span> </a>

              <ul class="dropdown-menu">

                <!-- The user image in the menu -->

                <li class="user-header"> <img src="<?php echo base_url(); ?>img/<?php echo $image_name;?>" class="img-circle" alt="User Image">

                  <p>  <?php echo $this->session->userdata('username') ?> </p>

                </li>

                <!-- Menu Footer-->

                <li class="user-footer">

                  <div class="pull-left"> <a href="<?php echo base_url(); ?><?php echo $this->config->item('dashboard_path'); ?>change_password" class="btn btn-default btn-flat mybtn_primary">Change Password</a> </div>

                  <div class="pull-right"> <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat mybtn_primary">Sign out</a> </div>

                </li>

              </ul>

            </li>

          <!-- Control Sidebar Toggle Button -->

          

        </ul>

      </div>

    </nav>
<!-- ====usman 3-9-17====menu-button======= -->
    <script>
      $('.s-menu-btn').click( function(event){
            event.stopPropagation();
            $('.main-sidebar, .left-side').toggle(600);
        });
  </script>


<!-- ============= -->
  </header>

<?php   $url = $_SERVER['REQUEST_URI']; ?>

  <!-- Left side column. contains the logo and sidebar -->

  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

      <!-- Sidebar user panel -->

      <div class="user-panel">

        <div class="pull-left image">

          <img src="<?php echo base_url(); ?>img/<?php echo $image_name;?>" class="img-circle" alt="User Image">

        </div>

        <div class="pull-left info">

          <p><?php echo $this->session->userdata('username') ?></p>

        </div>

      </div>

      

      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu">
          <?php  if($this->session->userdata('user_type')==1){?>
        <li class="header">MAIN NAVIGATION</li>

         <li class="<?php if (preg_match("/dashboard/", $url)) { ?> active <?php } ?>">

          <a href="<?php echo base_url(); ?><?php echo $this->config->item('dashboard_path'); ?>">

            <i class="fa fa-dashboard"></i>

            <span>Dashboard</span>

          </a>

        </li>
          <? }?>




          <?php  if($this->session->userdata('user_type')==1){?>
        <li class="<?php if (preg_match("/manage_user/", $url)) { ?> active <?php } ?>">

          <a href="<?php echo base_url(); ?><?php echo $this->config->item('user_path'); ?>manage_user">

            <i class="fa fa-user" aria-hidden="true"></i>

            <span>Customers</span>

          </a>

        </li>
          <? }?>
          <?php  if($this->session->userdata('user_type')==1){?>

        <li class="<?php if (preg_match("/manage_product/", $url)) { ?> active <?php } ?>">

          <a href="<?php echo base_url(); ?><?php echo $this->config->item('product_path'); ?>manage_product">

            <i class="fa fa-shopping-basket" aria-hidden="true"></i>

            <span>Templates</span>

          </a>

        </li>
          <? }?>
          <?php  if($this->session->userdata('user_type')==1){?>

              <li class="<?php if (preg_match("/manage_doctype/", $url)) { ?> active <?php } ?>">

                  <a href="<?php echo base_url(); ?><?php echo $this->config->item('doctype_path'); ?>manage_doctype">

                      <i class="fa fa-files-o"></i>

                      <span>Document Type</span>

                  </a>

              </li>
          <? }?>
          <?php  if($this->session->userdata('user_type')==1 or $this->session->userdata('user_type')==2){?>

        <li class="<?php if (preg_match("/manage_document/", $url)) { ?> active <?php } ?>">

          <a href="<?php echo base_url(); ?><?php echo $this->config->item('document_path'); ?>manage_document">

            <i class="fa fa-files-o"></i>

            <span>Documents</span>

          </a>

        </li>
          <? }?>
          <?php  if($this->session->userdata('user_type')==1 or $this->session->userdata('user_type')==2){?>
          <li class="<?php if (preg_match("/manage_certificate/", $url)) { ?> active <?php } ?>">

              <a href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>manage_certificate">

                  <i class="fa fa-files-o"></i>

                  <span>Certificates</span>

              </a>

          </li>
          <?php }?>
          <?php  if($this->session->userdata('user_type')==1){?>

         <li class="<?php if (preg_match("/manage_member/", $url)) { ?> active <?php } ?>">

          <a href="<?php echo base_url(); ?><?php echo $this->config->item('member_path'); ?>manage_member">

            <i class="fa fa-dashboard"></i>

            <span>Users</span>

          </a>

        </li>
          <? }?>
          <?php  if($this->session->userdata('user_type')==1){?>
         <li class="<?php if (preg_match("/manage_project/", $url)) { ?> active <?php } ?>">

          <a href="<?php echo base_url(); ?><?php echo $this->config->item('project_path'); ?>manage_project">

            <i class="fa fa-dashboard"></i>

            <span>Projects</span>

          </a>

        </li>
          <?php }?>

          <?php  if($this->session->userdata('user_type')==1){?>

         <li class="<?php if (preg_match("/manage_task/", $url)) { ?> active <?php } ?>">

          <a href="<?php echo base_url(); ?><?php echo $this->config->item('task_path'); ?>manage_task">

            <i class="fa fa-dashboard"></i>

            <span>Tasks</span>

          </a>

        </li>
        <?php }?>

      <?php /*?> <li class="<?php if (preg_match("/import_data/", $url)) { ?> active <?php } ?>">

          <a href="<?php echo base_url(); ?><?php echo $this->config->item('user_path'); ?>import_data">

            <i class="fa fa-dashboard"></i>

            <span>Import Data</span>

          </a>

        </li><?php */?>

         <?php /*?><li class="<?php if (preg_match("/add_newsfeed/", $url)) { ?> active <?php } ?>">

          <a href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>manage_newsfeed">

            <i class="fa fa-files-o"></i>

            <span>News Feed</span>

          </a>

        </li><?php */?>

      </ul>

    </section>

    <!-- /.sidebar -->

  </aside>