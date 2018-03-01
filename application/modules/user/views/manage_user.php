<?php 

$this->load->view('commons/header');



?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  
  <!-- Content Header (Page header) -->
  
  <section class="content-header full_padding_header">
    <h1>Customers </h1>
    
    <!--<ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

          <li><a href="#">Layout</a></li>

          <li class="active">Top Navigation</li>

        </ol>--> 
    
  </section>
  
  <!-- Main content -->
  
  <div class="content p-t-0">
    <section class="content m_b_20 white_bg box">
      <div class="row rowimport">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group pull-right ad-imp-btn">
         <a  data-toggle="modal" data-target="#import_data" data-controls-modal="#import_data" data-backdrop="static" data-keyboard="false"  class="btn btn-primary pull-right importup importup1 pad mybtn_primary"> Import Data</a>
         <a href="<?php echo base_url(); ?><?php echo $this->config->item('user_path'); ?>add_user" class="btn btn-primary pull-right pad mybtn_primary"><i class="fa fa-fw fa-plus"></i> Add New</a>
          <?php /*?> <a  href="<?php echo base_url();?>certificate/add_newsfeed" class="btn btn-primary pull-right importup importup1 pad"> Add Feeds</a> <?php */?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <table id="data_table" class="table table-bordered table-striped tabledge">
            <thead>
              <tr>
                <th>Account</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th width="80px">Last Activity</th>
                <th width="180px">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  foreach($all_user as $au){ 

			  $result=$this->user_model->get_last_feed_date($au['cust_id']);

			  

			  ?>
              <tr>
                <td><?php echo $au['account']?></td>
                <td><?php echo $au['person']?></td>
                <td><?php echo $au['phone']?></td>
                <td><?php echo $au['email']?></td>
                <td><?php if( !empty($result)){ echo $result->feed_date;}?></td>
                <td><!--<a href="#" class="btn btn-default btn-icon" data-toggle="modal" data-target="#view_modal"><i class="fa fa-eye" aria-hidden="true"></i></a>-->
                  
                  <style>

				.view{

					padding-bottom: 6px;

					padding-top: 3px;

					}

				

				</style>
                  <a   href="<?php echo base_url(); ?><?php echo $this->config->item('user_path'); ?>view_user/<?php echo $au['cust_id']?>" class="btn btn-primary btn-icon btn-iconlast view" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a> <a href="<?php echo base_url(); ?><?php echo $this->config->item('user_path'); ?>edit_user/<?php echo $au['cust_id']?>" class="btn btn-primary btn-icon" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a  onclick="return confirm('Are you sure want to delete this record.')" href="<?php echo base_url(); ?><?php echo $this->config->item('user_path'); ?>delete_user/<?php echo $au['cust_id']?>" class="btn btn-danger btn-icon" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a> <a href="#" onclick="get_note('<?php echo $au['cust_id']?>')" class="<?php echo $au['note']==""?'view':'view_2';?>"  data-toggle="modal" data-target="#view_customer" 
                  title="<?php if($au['note']!=""){ echo $au['note'];?> <?php } else{?> Add Note <?php }?>"><i class="fa <?php if($au['note']!=""){?>fa-comment <?php } else{?>fa-comment-o  <?php }?>" aria-hidden="true"></i>
</a> &nbsp; <a href="#" onclick="get_feed_note('<?php echo $au['cust_id']?>')" class=""  data-toggle="modal" data-target="#view_feed_customer" title="News Feed"><i class="fa fa-rss" aria-hidden="true"></i> </a> &nbsp; <a href="#" onclick="get_certificate('<?php echo $au['cust_id']?>')" class="certificate"  data-toggle="modal" data-target="#view_customer_certificate" title="View Certificate"><img width="14" src="<?php echo base_url(); ?>application/modules/assets/dist/img/certificate-icon.png" /></a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
  
  <!-- /.content --> 
  
</div>

<!-- /.content-wrapper -->

<?php $this->load->view('commons/footer'); ?>
<div id="view_customer" class="modal fade" role="dialog">
  <form id="add_note">
    <div class="modal-dialog modal-lg" style="width:600px;"> 
      
      <!-- Modal content-->
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Customer Note</h3>
        </div>
        <div class="modal-body">
          <textarea id="note" style="color:red; width:500px;" name="note" cols="70" rows="5" class="form-control">
          </textarea>
        </div>
        <div class="modal-footer">
          <div class="msg">
            <div id="success_2_msg" style=" display:none;" class="alert custom-error alert-success"></div>
            <div id="error_2_msg" style=" display:none;" class="alert custom-error alert-danger"></div>
          </div>
          <a href="#" id="submit_note" class="btn btn-primary">Submit</a> <a href="#" style="display:none" id="remove_note" class="btn btn-primary">Remove</a> 
          
          <!-- <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>--> 
          
        </div>
      </div>
      <input type="hidden" name="cust_id"  id="cust_id"/>
    </div>
  </form>
</div>
<div id="view_feed_customer" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:400px;"> 
    
    <!-- Modal content-->
    
    <div class="modal-content">
      <div id="load_html"> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="view_customer_certificate" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width:800px;"> 
    
    <!-- Modal content-->
    
    <div class="modal-content">
      <div class="col-lg-12" id="load_certificate"> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="import_data" class="modal fade" role="dialog" >
  <form id="import_data_all" name="import_data_all"  method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-lg" style="width:500px;"> 
      
      <!-- Modal content-->
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Import Excel Data</h4>
        </div>
        <div class="modal-body">
          <label for="section">Import File</label>
          <input type="file"  name="file_excel" id="file" class="form-control formup"/>
          <input type="hidden"  name="name"  value="1" />
        </div>
        <div class="modal-footer">
          <div class="msg">
            <div id="success_3_msg" style=" display:none;" class="alert custom-error alert-success"></div>
            <div id="error_3_msg" style=" display:none;" class="alert custom-error alert-danger"></div>
          </div>
          <ul >
            <img id="loader" style="display:none"  src="<?php echo base_url()?>application/modules/assets/dist/img/loading_icon.gif"class="gif-file"> <a href="#" id="submit_data" class="btn btn-primary">Submit</a>
          </ul>
        </div>
      </div>
      <input type="hidden" name="cust_id"  id="cust_id"/>
    </div>
  </form>
</div>
<script>


	function get_certificate(id){
			 $.ajax({

                    type:"POST",

                    url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"get_single_certifate/"+id,

                    success: function(response){

						//alert(response);

						$("#load_certificate").html(response)

						 $("#load_certificate_table").DataTable({})

						//return false;
					  }

                });

            	return false;

            

            }


   			

			

			function get_feed_note(id){

				

        	    $.ajax({

                    type:"POST",

                    url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"get_single_user_feed/"+id,

                    success: function(response){

						//alert(response);

						$("#load_html").html(response)

						// $("#user_feed").DataTable({})

						//return false;

                     $('.scrollbox3').enscroll({
    showOnHover: true,
    verticalTrackClass: 'track3',
    verticalHandleClass: 'handle3'
});

$('#scrollbox4').enscroll({
    verticalTrackClass: 'track4',
    verticalHandleClass: 'handle4',
    minScrollbarLength: 28
});


                      

                     }

                });

            	return false;

            

            }

   

   

   				

  			function get_note(id){

        	    $.ajax({

                    type:"POST",

                    url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"get_user_note/"+id,

                    success: function(response){

                        var obj = jQuery.parseJSON(response);

                    //CKEDITOR.instances.ck_editor2.setData( '<p>This is the editor data.</p>' );

                        $("#note").val(obj.note);

						 $("#cust_id").val(id);

						 if(obj.note!=''){

							 $("#remove_note").show();

							}else{

								 $("#remove_note").hide();

							}

                      

                     }

                });

            	return false;

            

            }

  $("#submit_note").click(function(){

	$.ajax({

        type:"POST",

        url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"add_note",

        data:$("#add_note").serialize(),

        success: function(response){

			var obj = jQuery.parseJSON(response);

				if(obj.status==1){

					//alert(obj.message);

				$("#success_2_msg").html(obj.message).show();

			

					setTimeout(function() {

					$('#success_2_msg').fadeOut('slow');}, 5000);

					 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>"+"manage_user");}, 2000);

				}else{

				$("#error_2_msg").html(obj.message).show();

				setTimeout(function() {$('#error_2_msg').fadeOut('slow');}, 5000);

			}

		

        }

    });

return false;

});

$("#remove_note").click(function(){

	$.ajax({

        type:"POST",

        url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"remove_note",

        data:$("#add_note").serialize(),

        success: function(response){

			$("#note").val("");

			var obj = jQuery.parseJSON(response);

				if(obj.status==1){

					//alert(obj.message);

				$("#success_2_msg").html(obj.message).show();

			

					setTimeout(function() {

					$('#success_2_msg').fadeOut('slow');}, 5000);

					 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>"+"manage_user");}, 2000);

				}

		

        }

    });

return false;

});





$("#submit_data").click(function(){

	

var formData = new FormData($('#import_data_all')[0]);

$("#loader").show();

$.ajax({

        type:"POST",

        url:'<?php echo base_url(); ?><?php echo $this->config->item('user_path'); ?>'+"submit_data",

        data:formData,

		processData: false,  //Add this

        contentType: false, //Add this

        success: function(response){

			$("#loader").hide();

			var obj = jQuery.parseJSON(response);

			//alert(obj.status);

			if(obj.status==0){

				$("#error_3_msg").html(obj.message).show();

				setTimeout(function() {$('#error_3_msg').fadeOut('slow');}, 5000);

			}else{

				$("#success_3_msg").html(obj.message).show();

				setTimeout(function() {$('#success_3_msg').fadeOut('slow');}, 5000);

				 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>"+"manage_task");}, 2000);

		

			

			}

        }

    });

return false;

});



                       

   </script> 
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