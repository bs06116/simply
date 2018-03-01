
<?php 
$this->load->view('commons/header');


?>



 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header full_padding_header">
        <h1> Certificates </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section>
      
      <!-- Main content -->
      <div class="content p-t-0">
      	<section class="content m_b_20 white_bg box">
        <div class="row">
          <div class="col-lg-6">
          	
            <form  id="validation_form" >
            <div class="row">
            	
                 <div class="col-lg-6">
                	<div class="form-group">
                    	<label>Customer Name</label>
                        <input type="text"  name="c_name" id="c_name" placeholder="Search by name" class="form-control" >
                    </div>
                </div>
               
                <div class="col-lg-12">
                	<div class="form-group">
                    	<label>Message</label>
                        <textarea type="text" name="message_n"   class="form-control" ></textarea>
                    </div>
                </div>
               
                
            </div>
            <div class="row">
            <div class="col-lg-12 text-right form-group">
          	 <input type="hidden" id="customer_id" name="customer_id" value="" />
             <input type="button" id="submit_certificate" value="Submit" class="btn btn-info mybtn_primary" />
            </form>
            </div>
            </div>
     
            
          </div>
        </div>
        <div id="error_msg" class="alert custom-error alert-danger" style="display:none"></div>
        <div id="success_msg" class="alert custom-error alert-success" style="display:none"></div>
      </section>
      </div>
      <!-- /.content --> 
  </div>
 <!-- /.content-wrapper -->
 
<?php $this->load->view('commons/footer'); ?>
<script type="text/javascript">
$(function() {
    
    //autocomplete
	
 
$('#c_name').autocomplete({
		source: '<?php echo base_url()?>'+'certificate/get_customer',
		select: function (event, ui) {
		$("#customer_id").val(ui.item.id);
		
		
	/*	  $.ajax({
                type: "POST",
                url:  ''+'certificate/get_all_customer_data',
                data: {'search_keyword' : ui.item.id},
                dataType: "text",
                success: function(response){
					var obj = jQuery.parseJSON(response);
					if(obj.status==1){
						$("#c_location").val(obj.city);
						$("#c_no").html(obj.account);
						$("#customer_id").val(obj.cust_id);
						
					}
                   
                }
            });*/
		
	}
	});
});
</script>
<script>
$("#submit_certificate").click(function(){
	//alert("adf");
$.ajax({
        type:"POST",
        url:'<?php echo base_url()?><?php echo $this->config->item('certificate_path'); ?>'+"save_newsfeed",
        data:$("#validation_form").serialize(),
        success: function(response){
			var obj = jQuery.parseJSON(response);
			if(obj.status==0){
				$("#error_msg").html(obj.message).show();
			
					setTimeout(function() {
					$('#error_msg').fadeOut('slow');
				}, 5000);
			}else if(obj.status==1){
				$("#success_msg").html(obj.message).show();
				$("#validation_form")[0].reset();
				 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('certificate_path'); ?>"+"add_newsfeed");}, 2000);
			}
			
        }
    });
return false;
});
</script>