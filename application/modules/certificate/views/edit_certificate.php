

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
 <form  id="validation_form" >
          <div class="col-lg-12">

          	<div class="row m_b_20 certificate_header">

       

                <div class="col-lg-12 text-right">

                	<h4><b>CERTIFICATE No : <?php echo $certificate->cert_code;?></b></h4>

                    <p>Date : <?php echo date("d-m-Y", strtotime($certificate->cer_date));?></p>

                    <p>Customer No : <?php echo $single_data->account?></p>

                </div>

            </div>

           

            <div class="row m_b_20">
            
            <div class="col-lg-3">
                
                                    <div class="form-group">
                
                                        <label>Customer Reference</label>
                
                                        <input type="text" readonly name="c_name" id="c_name" placeholder="Search by name"  value="<?php echo $certificate->c_name;?>" class="form-control" >
                
                                    </div>
                
                                </div>
            <div class="col-lg-3">

                	<div class="form-group">

                    	<label>Customer Order No.</label>

                        <input type="text" name="c_order_no" value="<?php echo $certificate->c_order_no;?>" class="form-control" >

                    </div>

                </div>
			<div class="col-lg-3">

                	<div class="form-group">

                    	<label>Delivery Date</label>

                        <input type="text" name="d_d" value="<?php echo $certificate->delivery_date;?>" class="form-control ex_date" >

                    </div>

                </div>
            <div class="col-lg-3">

                	<div class="form-group">

                    	<label>Attached Document</label>

                        <input type="text" name="e_doc_no"  value="<?php echo $certificate->e_doc_no;?>" class="form-control" >

                    </div>

                </div>
             <div class="col-lg-3">

                	<div class="form-group">

                    	<label>Select Product</label>

                        <input type="text" readonly name="p_no" id="p_no" placeholder="Search by Template Identification No" value="<?php echo $certificate->identification;?>" class="form-control" >

                    </div>

                </div>
                <div class="col-lg-3">

                	<div class="form-group">

                    	<label> Identification No</label>

                        <input type="text" name="identification_nos" id="identification_nos" placeholder="" class="form-control" value="<?php echo $certificate->identuty_no;?>" >

                    </div>

                </div>
				<div class="col-lg-3">

                	<div class="form-group">

                    	

                       To  <input type="text" name="identification_to" id="" placeholder="" class="form-control" value="<?php echo $certificate->identity_to;?>" >
                        

                    </div>

                </div>
                <div class="col-lg-3">

                	<div class="form-group">

                    	<label>Quantity Tested</label>

                        <input type="text" name="q_test" id="q_test" placeholder="" class="form-control" value="<?php echo $certificate->t_quatilty;?>" >

                    </div>

                </div>

                <?php /*?><div class="col-lg-3">

                	<div class="form-group">

                    	<label>Production No.</label>

                        <input type="text" name="production_no" id="production_no" value="<?php echo $certificate->production_no;?>"  class="form-control" >

                    </div>

                </div><?php */?>

            	 
                
                <?php /*?><div class="col-lg-3">

                	<div class="form-group">

                    	<label>Order No.</label>

                        <input type="text" name="order_no" value="<?php echo $certificate->order_no;?>" class="form-control" >

                    </div>

                </div><?php */?>

               

               

                <div class="col-lg-3">

                	<div class="form-group">

                    	<label>Sales Person</label>

                 <input type="text" readonly  name="sale_person" value="<?php echo $certificate->sale_person;?>" class="form-control" >

                    </div>

                </div>

                <?php /*?><div class="col-lg-3">

                	<div class="form-group">

                    	<label>Reference To Standard</label>

                        <input type="text" name="ref_to_standard" value="<?php echo $certificate->ref_to_standard;?>" class="form-control" >

                    </div>

                </div><?php */?>

                

               <?php /*?> <div class="col-lg-3">

                	<div class="form-group">

                    	<label>Customer Attention</label>

                        <input type="text" name="c_attention" value="<?php echo $certificate->c_attention;?>" class="form-control" >

                    </div>

                </div>

                <div class="col-lg-3">

                	<div class="form-group">

                    	<label>Customer Location</label>

                        <input type="text" name="c_location" id="c_location"  value="<?php echo $certificate->c_location;?>" class="form-control" >

                    </div>

                </div><?php */?>

                
				
                <div class="col-lg-3">

                	<div class="form-group">

                    	<label>Inspection Date</label>

                        <input type="text" name="i_d" id="i_d" value="<?php echo $certificate->inspection_date;?>"  class="form-control ex_date" >

                    </div>

                </div>
                <div class="col-lg-3">

                	<div class="form-group">

                    	<label>Re-inspection Date</label>

                        <input type="text" readonly="readonly" name="r_i_d" id="r_i_d" value="<?php echo $certificate->re_inspection_date;?>" class="form-control" >

                    </div>

                </div>
                <div class="col-lg-3">

                	<div class="form-group">

                    	<label>Tested by</label>

                        <input type="text" name="tested_by" value="<?php echo $certificate->tested_by;?>" class="form-control" >

                    </div>

                </div>
                <div class="col-lg-3">

                	<div class="form-group">

                    	<label>Inspected by </label>

                        <input type="text" name="inspected_by" value="<?php echo $certificate->inspected_by;?>" class="form-control" >

                    </div>

                </div>

               

            </div>

            <input type="hidden" value="<?php echo $certificate->products_id;?>" name="products_id" id="products_id" />

            <input type="hidden" value="<?php echo $certificate->certificate_id;?>" name="cer_id" id="cer_id" />

              <input type="hidden"  value="<?php echo $certificate->customer_id;?>"  name="customer_id" id="customer_id" />

            <input type="hidden" value="<?php //echo $cert_code?>" name="cert_code" />

            <div class="row">

             <div class="col-lg-12 text-right form-group">

               

             </div>

            </div>

            <div class="row">

            	<div class="col-lg-12">

                	<table class="table table-bordered table-striped">

                    	<tr>

                        	<th>Identification No.</th>

                            <th>Description</th>

                            <th>Quantity Tested</th>

                           

                           

                            <th>SWL (kg)</th>
                            <th>PLA (kg)</th>

                     	

                        </tr>

                        <tr>

                        	<td><span id="identfication"><?php echo $certificate->identification;?></span></td>

                            <td><span id="desc"><?php echo $certificate->description;?></span></td>

                            <td><span id="qun"><?php echo $certificate->t_quatilty;?></span></td>

                            

                          

                            <td><span id="swl"><?php echo $certificate->swl;?></span></td>
                             <td><span id="swl"><?php echo $certificate->pla;?></span></td>

                          

                        </tr>

                      

                    </table>

                </div>

            </div>

          </div>
          
          
  <!--<img class="loading_gif" src="<?php echo base_url()?>img/loading.gif" />-->
  
  
   <!--  <input type="button"   value="Save & Export"  id="submit_certificate_1" name="import_btn" class="btn btn-info"/>-->
  </form>
  <div class="col-lg-12">
  <input type="button" class="btn btn-info"  id="submit_certificate" value="Save"/>
<a href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>view_pdf/<?php echo $certificate->certificate_id?>"
    class="btn btn-info pull-right">Save & Export</a>

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

<script>

$( "#q_test" ).keyup(function() {
	
	var value_q =  $( this ).val();
	$("#qun").html(value_q);
 
});

  $(document).ready(function() {
    	$(".ex_date").datepicker({dateFormat: "yy-mm-dd"});
  });
  
  
$("#i_d").change(function() {
	//alert("asdasd");
	// Date.parse($('#date2').val());
	 var ins_date=$(this).val();
	var date_inte= Date.parse(ins_date);
	
	 var  date = new Date(ins_date);
	//alert(date);
  	  yr      = date.getFullYear();
	 month = date.getMonth()+1;
	  day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate();
    newDate = yr + '-' + month + '-' + day;
	//alert(newDate);
		
		var adddate = new Date(date_inte);
var resDate  = adddate.setMonth(adddate.getMonth()+6);

	
	var  date1 = new Date(resDate);

	 yrr     = date1.getFullYear();
	
	 months = date1.getMonth()+1;
	 //alert(months);
	  days     = date1.getDate() ;
	
    newDatses = yrr + '-' + months + '-' + days;
	
		$("#r_i_d").val(newDatses);


	
	
 
});
  </script>

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

						//$("#qun").html(obj.identification);

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

        url:'<?php echo base_url()?><?php echo $this->config->item('certificate_path'); ?>'+"update_certificate",

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

				 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('certificate_path'); ?>"+"manage_certificate");}, 2000);

			}

			

        }

    });

return false;

});

</script>