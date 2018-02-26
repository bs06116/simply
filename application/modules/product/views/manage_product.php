<?php 
$this->load->view('commons/header');

//$total=count($all_proj);
?>
 <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header full_padding_header">
        <h1>Templates </h1>
       <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>-->
      </section>
      
      <!-- Main content -->
      <section class="content p-t-0">
      	<section class="content m_b_20 white_bg box">
      	<div class="row">
        	<div class="col-lg-12 form-group">
            	<a href="#" class="btn btn-primary pull-right pad" data-toggle="modal" data-target="#add_product_modal"><i class="fa fa-fw fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="row">
        	<div class="col-lg-12">
            	<table id="data_table" class="table table-bordered table-striped">
                	<thead>
                    	<tr>
                        	<th>Identification #</th>
                            <th width="180">Template Description</th>
                            
                            <th>SWL (kg)</th>
                         
                            <th>PLA (kg)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="append_data" id="append_data">
                    
                    <?php
					 $i=1;
					  foreach($all_pro as $ap):?>
                    	<tr   id="pr<?php echo $ap['products_id']?>">
                        	<td><?php echo $ap['identification']?></td>
                            <td><?php echo $ap['description']?></td>
                          
                            <td><?php echo $ap['swl']?></td>
                            
                             <td><?php echo $ap['pla']?></td>
                            <td>
                            
                                <a  href="#"  data-toggle="modal" onclick="get_product('<?php echo $ap['products_id']?>')" data-target="#update_product_modal" class="btn btn-primary btn-icon" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a onclick="return confirm('Are you sure want to delete this record.')" href="<?php echo base_url(); ?><?php echo $this->config->item('product_path'); ?>delete_product/<?php echo $ap['products_id']?>" class="btn btn-danger btn-icon" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php $i++; endforeach?>
                    </tbody>
                    
                </table>
            </div>
        </div>
      </section>
      </section>
    <!-- /.container --> 
  </div>
  
  
<?php $this->load->view('commons/footer'); ?>
<div id="add_product_modal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
        
            <!-- Modal content-->
            <form id="validation_form">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Template</h4>
              </div>
              <div class="modal-body">
                <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group cs_account_main up_temp">
                 
                      <label>Template Identification</label>
                      <input class="input-sm form-control" type="text" name="identification" />
                
                </div>
              </div>
            </div>
          </div>
        </div>
        		<div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-12">
                  	<div class="form-group">
                    	<form>
                    <label>Template Description</label>
                            <textarea class="ck_editor" name="ck_editor" rows="10" cols="80">                                                 
                            </textarea>
                       
                    </form>
                    </div>
                  </div>
                </div>
                <div class="row">
                	<!--<div class="col-lg-6 up_temp">
                    	<div class="form-group">
                        	<label>Test Load Factor</label>
                            <input type="text" class="form-control" name="factor" />
                        </div>
                    </div>-->
                    <div class="col-lg-6">
                    	<div class="form-group">
                        	<label>SWL (kg)</label>
                            <input type="text" class="form-control" name="swl" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                    	<div class="form-group">
                        	<label>PLA (kg)</label>
                            <input type="text" class="form-control" name="pla" />
                        </div>
                    </div>
                </div>
                <div class="row">
                	<!--<div class="col-lg-6">
                    	<div class="form-group">
                        	<label>WLL (kg)</label>
                            <input type="text" class="form-control" name="wll" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                    	<div class="form-group">
                        	<label>MBL (kg)</label>
                            <input type="text" class="form-control" name="mbl" />
                        </div>
                    </div>-->
                    
                </div>
              </div>
            </div>
          </div>
        </div>
              </div>
               <div class="col-lg-6">
              	<div  style=" display:none;" class="alert custom-error alert-danger error_msg"></div>
                <div style=" display:none;" class="alert custom-error alert-success success_msg"></div>
               
              </div>
              <div class="modal-footer">
              <a href="#" id="submit_type2" class="btn btn-primary">Save</a>
              
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
        </form>
        <input type="hidden"  value="<?php echo base_url();?>" id="base_url"/>
          </div>
        </div>
        
 <div id="update_product_modal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <form id="update_form">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Template</h4>
              </div>
              <div class="modal-body">
                <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6 up_temp">
                	<div class="form-group">
                      <label>Template Identification</label>
                      <input disabled="disabled" class="col-lg-8 input-sm form-control " type="text" id="identification" name="identification" />
                      </div>
                      
              </div>
              <div class="col-lg-6 up_temp"></div>
            </div><br />
          </div>
        </div>
        		<div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-12">
                  	<div class="form-group">
                    	<form>
                    <label>Template Description</label>
                            <textarea class="ck_editor2"  name="ck_editor2" id="ck_editor2" rows="10" cols="80">                                                 
                            </textarea>
                       
                    </form>
                    </div>
                  </div>
                </div>
                <div class="row">
                	<!--<div class="col-lg-6 up_temp">
                    	<div class="form-group">
                        	<label>Test Load Factor</label>
                            <input type="text" class="form-control" id="factor" name="factor" />
                        </div>
                    </div>-->
                    <div class="col-lg-6 up_temp">
                    	<div class="form-group">
                        	<label>SWL (kg)</label>
                            <input type="text" class="form-control" id="swl" name="swl" />
                        </div>
                    </div>
                    <div class="col-lg-6 up_temp">
                   		<div class="form-group">
                        	<label>PLA (kg)</label>
                            <input type="text" class="form-control" id="pla" name="pla" />
                        </div>
                     </div>    
                </div>
                <div class="row">
                	<!--<div class="col-lg-6 up_temp">
                    	<div class="form-group">
                        	<label>WLL (kg)</label>
                            <input type="text" class="form-control" id="wll" name="wll" />
                        </div>
                    </div>-->
                    <!--<div class="col-lg-6 up_temp">
                    	<div class="form-group">
                        	<label>MBL (kg)</label>
                            <input type="text" class="form-control" id="mbl" name="mbl" />
                        </div>
                    </div>-->
                    
                    	
                   
                </div>
              </div>
            </div>
          </div>
          <input type="hidden"  value="0" id="pro_id" name="pro_id"/>
          <input type="hidden"  value="0" id="row_id" name="row_id"/>
        </div>
              </div>
              <div class="col-lg-6">
              	
                <div id="error_2_msg" style=" display:none;" class="alert custom-error alert-danger"></div>
               <div style=" display:none;" class="alert custom-error alert-success success_msg"></div>	
              </div>
             
              
              <div class="modal-footer">
               
              <a href="#" id="update_product" class="btn btn-primary">Save</a>
              
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
        </form>
       
          </div>
        </div>     
        <script>


$("#submit_type2").click(function(){
	for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

$.ajax({
        type:"POST",
        url:'<?php echo base_url()?><?php echo $this->config->item('product_path'); ?>'+"save_product",
        data:$("#validation_form").serialize(),
        success: function(response){
		//	alert(response);
			var obj = jQuery.parseJSON(response);
			//alert(obj.status);
			if(obj.status==0){
				$(".error_msg").html(obj.message).show();
			
					setTimeout(function() {
					$('.error_msg').fadeOut('slow');
				}, 5000);
			}else{
			//	$(".append_data").append(obj['data']);
			
				var dt = $('#data_table').DataTable();;
				//alert(obj.identification);
				 var rowid =dt.row.add( [
						obj.identification,
						obj.description,
						 obj.swl,
						 obj.pla,
						'<a class="btn btn-primary btn-icon" href="#" data-toggle="modal" onclick="get_product('+obj.pro_id+')" data-target="#update_product_modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a class="btn btn-danger btn-icon" onclick="return confirm('+"'Are you sure want to delete this record.'"+')" href=<?php echo base_url()?><?php echo $this->config->item('product_path'); ?>delete_product/'+obj.pro_id+'><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
					] ).draw( false );
			var theNode = $('#data_table').dataTable().fnSettings().aoData[rowid[0]].nTr;
theNode.setAttribute('id',"pr"+obj.pro_id);
				$("#validation_form")[0].reset();
					CKEDITOR.instances.ck_editor.setData();
					$(".success_msg").html(obj.message).show();
			
					setTimeout(function() {
					$('.success_msg').fadeOut('slow');
				}, 3000);
				
				setTimeout(function() {
					$('.success_msg').fadeOut('slow');
					$("#add_product_modal").modal('hide');
				}, 1000);
			//	alert(obj['data']);
			/*	$("#factor").val(obj['product'].factor);
			$("#swl").val(obj['product'].swl);
			$("#wll").val(obj['product'].wll);
			$("#mbl").val(obj['product'].mbl);
			$("#pro_id").val(obj['product'].products_id);*/
			}
        }
    });
return false;
});


function get_product(id){
$.ajax({
        type:"POST",
        url:'<?php echo base_url()?><?php echo $this->config->item('product_path'); ?>'+"edit_product/"+id,
        success: function(response){
			var obj = jQuery.parseJSON(response);
		//CKEDITOR.instances.ck_editor2.setData( '<p>This is the editor data.</p>' );
			$("#identification").val(obj['product'].identification);
			CKEDITOR.instances.ck_editor2.setData(obj['product'].description);
			$("#factor").val(obj['product'].factor);
			$("#swl").val(obj['product'].swl);
			$("#wll").val(obj['product'].wll);
			$("#mbl").val(obj['product'].mbl);
			$("#pro_id").val(obj['product'].products_id);
			$("#pro_id").val(obj['product'].products_id);
			$("#pla").val(obj['product'].pla);
			$("#row_id").val(id);
			
			
        }
    });
return false;

}


$("#update_product").click(function(){
	for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

$.ajax({
        type:"POST",
        url:'<?php echo base_url()?><?php echo $this->config->item('product_path'); ?>'+"update_product",
        data:$("#update_form").serialize(),
        success: function(response){
			var obj = jQuery.parseJSON(response);
				if(obj.status==0){
					//alert(obj.message);
				$("#error_2_msg").html(obj.message).show();
			
					setTimeout(function() {
					$('#error_2_msg').fadeOut('slow');
				}, 5000);
			}else{
				
				var row_val=$("#row_id").val();
				//$("#pr"+row_val).remove();
				var table = $('#data_table').DataTable();
 					table.row("#pr"+row_val).remove();
				//	table.row.add( obj['data'] ).draw();
				
				//$("#append_data").append(obj['data']);
				//$(obj['data']).appendTo(".append_data");
		    //	$(".append_data").append(obj['data']);
				var dt = $('#data_table').DataTable();
			
				var rowid = dt.row.add( [
						obj.identification,
						obj.description,
					
						obj.swl,
						
						obj.pla,
						'<a class="btn btn-primary btn-icon" href="#" data-toggle="modal" onclick="get_product('+obj.pro_id+')" data-target="#update_product_modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a class="btn btn-danger btn-icon" onclick="return confirm('+"'Are you sure want to delete this record.'"+')" href=<?php echo base_url()?><?php echo $this->config->item('product_path'); ?>delete_product/'+obj.pro_id+'><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
					] ).draw( false );
				var theNode = $('#data_table').dataTable().fnSettings().aoData[rowid[0]].nTr;
theNode.setAttribute('id',"pr"+obj.pro_id);
				//dt.row.add(obj['data']);
				//dt.draw();
			//	var table = $('#data_table').DataTable();
 			//	table.ajax.reload()
			//alert(obj.message);
			$(".success_msg").html(obj.message).show();
			
					setTimeout(function() {
					$('.success_msg').fadeOut('slow');
				}, 3000);
				
				setTimeout(function() {
					$('.success_msg').fadeOut('slow');
					$("#update_product_modal").modal('hide');
				}, 1000);
				
				
			

		}
		
        }
    });
return false;
});

</script>
<script>
 $(function () {

	 
    CKEDITOR.replace('ck_editor');
	CKEDITOR.replace('ck_editor2');
	
  });
   
</script>