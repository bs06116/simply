<?php 

$this->load->view('commons/header');





?>

   <?php



 ?>

	


 <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

      <!-- Content Header (Page header) -->

      <section class="content-header full_padding_header">

        <h1> Document Type </h1>

		

      <!--  <ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

          <li><a href="#">Layout</a></li>

          <li class="active">Top Navigation</li>

        </ol>-->

		

      </section>

      

      <!-- Main content -->

      <div class="content p-t-0">

      	<section class="content m_b_20 white_bg box">
			<form  id="validation_form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?><?php echo $this->config->item('doctype_path'); ?>save_document_type">
        <div class="row">

          <div class="col-lg-12">


            

            <div class="row m_b_20">
                <div class="row">
            	<div class="col-lg-3">

                	<div class="form-group">

                    	<label>Document Type</label>

                        <input type="text" name="name" id="name" value="<?php echo set_value('name');?>" placeholder="Document Type"
                               class="form-control" >
                        <div class="help-block form-error"><?php echo form_error('name'); ?></div>
                        <div class="help-block form-error"><?php echo form_error('doctype_exist'); ?></div>

                    </div>

                </div>
                </div>



            </div>



     


				 
          </div>
        
			

<div class="col-lg-12">
<button type="submit"  value="Save" id="submit_document" class="btn btn-info mybtn_primary"> Save</button>
            
            

</div>

            
            
           
            
            

            </form>
            <div class="loading_gif"><img class="" src="<?php echo base_url()?>img/loading.gif" width="150"/></div>
        </div>
        <?php if($this->session->flashdata('sucess_message')) { ?>
            <div id="success_msg" class="alert custom-error alert-success">
                <?php echo $this->session->flashdata('sucess_message'); ?>
            </div>
        <?php } ?>
        <?php if($this->session->flashdata('error_msg')) { ?>
            <div id="error_msg" class="alert custom-error alert-danger" >
                <?php echo $this->session->flashdata('error_msg'); ?>
            </div>
        <?php } ?>


      </section>

      </div>

      <!-- /.content --> 
      


  </div>

 <!-- /.content-wrapper -->

 <?php 
	 ?>	


<?php $this->load->view('commons/footer'); ?>


<script type="text/javascript">


$(".loading_gif").hide();


</script>

