<?php 

$this->load->view('commons/header');





?>

   <?php



 ?>

	


 <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

      <!-- Content Header (Page header) -->

      <section class="content-header full_padding_header">

        <h1> Document </h1>

		

      <!--  <ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

          <li><a href="#">Layout</a></li>

          <li class="active">Top Navigation</li>

        </ol>-->

		

      </section>

      

      <!-- Main content -->

      <div class="content p-t-0">

      	<section class="content m_b_20 white_bg box">
			<form  id="validation_form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?><?php echo $this->config->item('document_path'); ?>save_document">
        <div class="row">

          <div class="col-lg-12">


            

            <div class="row m_b_20">
                <div class="row">
            	<div class="col-lg-3">

                	<div class="form-group">

                    	<label>Document Name</label>

                        <input type="text" name="name" id="name" value="<?php echo set_value('name');?>" placeholder="Document Name"
                               class="form-control" >
                        <div class="help-block form-error"><?php echo form_error('name'); ?></div>

                    </div>

                </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">

                        <div class="form-group">

                            <label>Document Type</label>

                            <input type="text" name="type"  value="<?php echo set_value('type');?>"class="form-control" >
                            <div class="help-block form-error"><?php echo form_error('type'); ?></div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">

                        <div class="form-group">

                            <label>Upload Document</label>

                            <input type="file" name="upload_document" class="form-control" >

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

<script>

$("#submit_document").click(function(){

    var formData = new FormData($('#validation_form')[0]);


$.ajax({

        type:"POST",

        url:'<?php echo base_url()?><?php echo $this->config->item('document_path'); ?>'+"save_document",

        data:formData,

        success: function(response){
//alert(response);return false;
			var obj = jQuery.parseJSON(response);

			if(obj.status==0){

				$("#error_msg").html(obj.message).show();



					setTimeout(function() {

					$('#error_msg').fadeOut('slow');

				}, 5000);

			}else if(obj.status==1){

				$("#success_msg").html(obj.message).show();

				 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('certificate_path'); ?>"+"manage_document");}, 2000);

			}



        }

    });

return false;

});


</script>