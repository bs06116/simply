
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
      	<section class="content m_b_20 white_bg">
        <div class="row">
          <div class="col-lg-12">
          	<div class="row m_b_20 certificate_header">
            	<div class="col-lg-8">
                	<h1>Test Certificate</h1>
                    <h3>Type 2.2 according to EN 10204</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="col-lg-4 text-right">
                	<h2>CERTIFICATE No : <?php echo $final_cert_code = ($cert_code == '00000' ? '00001' : $cert_code);?></h2>
                    <p>Date : <?php echo date("m-d-Y")?></p>
                    <p>Customer No : <span id="c_no"></span></p>
                </div>
            </div>
            <form  id="validation_form" >
            <div class="row m_b_20">
            	
                 <div class="col-lg-3">
                	<div class="form-group">
                    	<label>Customer Name</label>
                        <input type="text" name="c_name" id="c_name" placeholder="Search by name" class="form-control" >
                    </div>
                </div>
                <div class="col-lg-3">
                	<div class="form-group">
                    	<label>Order No.</label>
                        <input type="text" name="order_no" class="form-control" >
                    </div>
                </div>
                  <div class="col-lg-3">
                	<div class="form-group">
                    	<label>Production No.</label>
                        <input type="text" name="production_no" id="production_no" class="form-control" >
                    </div>
                </div>
                <div class="col-lg-3">
                	<div class="form-group">
                    	<label>Identification No.</label>
                        <input type="text" name="p_no" id="p_no" placeholder="Search by Identification No" class="form-control" >
                    </div>
                </div>
                <div class="col-lg-3">
                	<div class="form-group">
                    	<label>Sales Person</label>
                        <input type="text" name="sale_person" readonly="readonly" value="<?php echo $this->session->userdata('username');?>" class="form-control" >
                    </div>
                </div>
                <div class="col-lg-3">
                	<div class="form-group">
                    	<label>Reference To Standard</label>
                        <input type="text" name="ref_to_standard" class="form-control" >
                    </div>
                </div>
                <div class="col-lg-3">
                	<div class="form-group">
                    	<label>Customer Order No.</label>
                        <input type="text" name="c_order_no" class="form-control" >
                    </div>
                </div>
                <div class="col-lg-3">
                	<div class="form-group">
                    	<label>Customer Attention</label>
                        <input type="text" name="c_attention" class="form-control" >
                    </div>
                </div>
                <div class="col-lg-3">
                	<div class="form-group">
                    	<label>Customer Location</label>
                        <input type="text" name="c_location" id="c_location"  class="form-control" >
                    </div>
                </div>
                <div class="col-lg-3">
                	<div class="form-group">
                    	<label>External Doc No.</label>
                        <input type="text" name="e_doc_no" class="form-control" >
                    </div>
                </div>
                
            </div>
            <input type="hidden" value="" name="products_id" id="products_id" />
             <input type="hidden"  name="customer_id" id="customer_id" />
            <input type="hidden" value="<?php echo $final_cert_code?>" name="cert_code" />
            <input type="button"  id="submit_certificate" value="Submit"/>
            </form>
            <div class="row m_b_20">
            	<div class="col-lg-12">
                	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            <div class="row">
            	<div class="col-lg-12">
                	<table class="table table-bordered table-striped">
                    	<tr>
                        	<th>Identification No.</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Testload Factor</th>
                            <th>SWL (kg)</th>
                            <th>WLL (kg)</th>
                            <th>MBL (kg)</th>
                        </tr>
                        <tr>
                        	<td><span id="identfication"></span></td>
                            <td><span id="desc"></span></td>
                            <td><span id="qun"></span></td>
                            <td><?php echo date("d-m-Y")?></td>
                            <td><span id="tfactor"></span></td>
                            <td><span id="swl"></span></td>
                            <td><span id="wll"></span></td>
                            <td><span id="mbl"></span></td>
                        </tr>
                      
                    </table>
                </div>
            </div>
          </div>
        </div>
        <div id="error_msg" style="display:none"></div>
      </section>
      </div>
      <!-- /.content --> 
  </div>
 <!-- /.content-wrapper -->
 
<?php $this->load->view('commons/footer'); ?>
<script type="text/javascript">
$(function() {
    
    //autocomplete
	
	
	$('#p_no').autocomplete({
		source: '<?php echo base_url()?>'+'certificate/get_product_data',
		select: function (event, ui) {
		$("#p_no").val(ui.item.id);
		$("#products_id").val(ui.item.id);
		
		  $.ajax({
                type: "POST",
                url:  '<?php echo base_url()?>'+'certificate/get_all_product_data',
                data: {'search_keyword' : ui.item.id},
                dataType: "text",
                success: function(response){
					var obj = jQuery.parseJSON(response);
					if(obj.status==1){
						$("#identfication").html(obj.identification);
						$("#desc").html(obj.description);
						$("#qun").html(obj.identification);
						$("#tfactor").html(obj.factor);
						$("#swl").html(obj.swl);
						$("#wll").html(obj.wll);
						$("#mbl").html(obj.mbl);
					}
                   
                }
            });
		}
	});
	

             
$('#c_name').autocomplete({
		source: '<?php echo base_url()?>'+'certificate/get_customer',
		select: function (event, ui) {
		$("#c_name").val(ui.item.id);
		
		
		  $.ajax({
                type: "POST",
                url:  '<?php echo base_url()?>'+'certificate/get_all_customer_data',
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
            });
		
	}
	});
});
</script>
<script>
$("#submit_certificate").click(function(){
	//alert("adf");
$.ajax({
        type:"POST",
        url:'<?php echo base_url()?><?php echo $this->config->item('certificate_path'); ?>'+"save_certificate",
        data:$("#validation_form").serialize(),
        success: function(response){
			var obj = jQuery.parseJSON(response);
			if(obj.status==0){
				$("#error_msg").html(obj.message).show();
			
					setTimeout(function() {
					$('#error_msg').fadeOut('slow');
				}, 5000);
			}else if(obj.status==1){
				$("#error_msg").html(obj.message).show();
				 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('certificate_path'); ?>"+"manage_certificate");}, 2000);
			}
			
        }
    });
return false;
});
</script>