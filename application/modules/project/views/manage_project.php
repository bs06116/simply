<?php 

$this->load->view('commons/header');

$total=count($all_project);

?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  
  <!-- Content Header (Page header) -->
  
  <section class="content-header">
    <h1>Projects 
      
      <!--<small>Add Subject</small>--> 
      
    </h1>
  </section>
  <?php echo $this->session->flashdata('msg'); ?> 
  
  <!-- Main content -->
  
  <section class="content">
    <div class="row">
      <div class="col-xs-12 rem">
        <div class="box">
          <div class="box-header"> 
            
            <!-- <h3 class="box-title">Data Table With Full Features</h3>--> 
            
          </div>
          <!-- /.box-header -->
          
          <div class="box-body">
            <div class="row">
              <div class="col-lg-12 text-right form-group"> <a class="btn btn-primary pad mybtn_primary mybtn_primary" data-toggle="modal" data-target="#add_project_modal" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a> </div>
            </div>
            <table id="data_table" class="table table-bordered table-striped icon_space">
              <thead>
                <tr>
                 <th>#</th>
                  <th>Project Name</th>
                  <th>Description</th>
                  <th>task</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <? $incremnet=0; 
				for($i=0;$i<$total;$i++) {
				$incremnet++;
						

						$count=$this->project_model->get_task_count($all_project[$i]['project_id']);

						

						   ?>
                <tr id="pr<?=$all_project[$i]['project_id'];?>">
                 <td><?php echo $incremnet;?></td>
                  <td><?=$all_project[$i]['name'];?></td>
                  <td><?=$all_project[$i]['description'];?></td>
                  <td><?=$count->total_task;?></td>
                  <td><a class="btn btn-primary btn-icon" data-toggle="modal" data-target="#update_project_modal"   href="#" onclick="get_project('<?php echo $all_project[$i]['project_id']?>')" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     <label class="switch">
                      <input type="checkbox" name="status" id="stauts_value" class="form-control" onclick="sss('<?php echo $all_project[$i]['project_id']?>','<?php echo $all_project[$i]['active_bit']?>')" value="" 
					    <?php if($all_project[$i]['active_bit']==1){ ?> checked <?php }?>>
                     <div class="slider round"></div>
                    </label>
                  <?php if($count->total_task==0){?>
                  <a  class="btn btn-danger btn-icon" onclick="return confirm('Are you sure want to delete this record.')" href="<?=base_url();?><?php echo $this->config->item('project_path'); ?>delete_project/<?=$all_project[$i]['project_id'];?>" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                <? } ?>
                </tr>
                <? } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body --> 
          
        </div>
      </div>
    </div>
  </section>
  
  <!-- /.content --> 
  
</div>

<!-- /.content-wrapper -->

<?php $this->load->view('commons/footer'); ?>
<div id="add_project_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg"> 
    
    <!-- Modal content-->
    
    <form id="validation_form">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Project</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-6 up_temp">
                  <div class="form-group cs_account_main">
                      <label>Project Name</label>
                      <input type="subject"  name="name"  class="form-control input-sm" placeholder="Name" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="section">Description</label>
                <textarea type="text"  name="description" class="description" class="form-control">
                </textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div id="error_msg" style=" display:none;" class="alert custom-error alert-danger error_msg"></div>
          <div id="success_msg" style=" display:none;" class="alert custom-error alert-success success_msg"></div>
        </div>
        <div class="modal-footer"> <a href="#" id="submit_type2" class="btn btn-primary mybtn_primary">Save</a>
          <button type="button" class="btn btn-default mybtn_primary"  data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
    <input type="hidden"  value="<?php echo base_url();?>" id="base_url"/>
  </div>
</div>
<div id="update_project_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg"> 
    
    <!-- Modal content-->
    
    <form id="update_form">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Project</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group cs_account_main">
                    
                      <label>Project Name</label>
                      <input type="subject"  name="name" id="name" class="form-control" placeholder="Name"/>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="section">Description</label>
                <textarea type="text"  name="description" id="description2" class="description" class="form-control">
                </textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div id="error_2_msg" style=" display:none;" class="alert custom-error alert-danger"></div>
          <div id="success_msg" style=" display:none;" class="alert custom-error alert-success success_msg"></div>
        </div>
        <div class="modal-footer"> <a href="#" id="update_project" class="btn btn-primary">Save</a>
          <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
        </div>
      </div>
      <input type="hidden"  value="0" id="project_id" name="project_id"/>
      <input type="hidden"  value="0" id="row_id" name="row_id"/>
    </form>
    <input type="hidden"  value="<?php echo base_url();?>" id="base_url"/>
  </div>
</div>
<script>

		$("#submit_type2").click(function(){

	for (instance in CKEDITOR.instances) {

        CKEDITOR.instances[instance].updateElement();

    }



$.ajax({

        type:"POST",

        url:'<?php echo base_url()?><?php echo $this->config->item('project_path'); ?>'+"save_project",

        data:$("#validation_form").serialize(),

        success: function(response){
			
			var obj = jQuery.parseJSON(response);

			//alert(obj.status);

			if(obj.status==0){

				$(".error_msg").html(obj.message).show();

			

					setTimeout(function() {

					$('.error_msg').fadeOut('slow');

				}, 5000);

			}else{
				$(".error_msg").hide();
				$(".success_msg").html(obj.message).show();
				setTimeout(function() {$('.success_msg').fadeOut('slow');}, 5000);
				 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('project_path'); ?>"+"manage_project");}, 2000);
		

			//	$(".append_data").append(obj['data']);

			
/*
				var dt = $('#project_table').DataTable();;

				//alert(obj.identification);

				 var rowid =dt.row.add( [

						obj.name,

						obj.description,
						
						obj.task,

						'<a class="btn btn-primary btn-icon" href="#" data-toggle="modal" onclick="get_project('+obj.project_id+')" data-target="#update_project_modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a class="btn btn-danger btn-icon" onclick="return confirm('+"'Are you sure want to delete this record.'"+')" href=delete_project/'+obj.project_id+'><i class="fa fa-trash-o" aria-hidden="true"></i></a>'

					] ).draw( false );

			var theNode = $('#project_table').dataTable().fnSettings().aoData[rowid[0]].nTr;

theNode.setAttribute('id',"pr"+obj.project_id);

				$("#validation_form")[0].reset();

					CKEDITOR.instances.description.setData();

					$(".success_msg").html(obj.message).show();

			

					setTimeout(function() {

					$('.success_msg').fadeOut('slow');

				}, 5000);
*/
			

			}

        }

    });

return false;

});

function sss(id,status){
	//var dd = ( $("#stauts_value").is(':checked') ) ? 1 : 0;
	
	//alert(status);
	if(status==1){
		dd=0
		}else{
		dd=1	
			}
			//alert(dd);
	if (confirm('Are you sure you want to change the status')) {
    $.ajax({

        type:"POST",

        url:'<?php echo base_url()?><?php echo $this->config->item('project_path'); ?>'+"edit_project_status/"+dd+"/"+id,

        success: function(response){
			
			
 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('project_path'); ?>"+"manage_project");}, 2000);
		
			
			}

    });
	
		} else {
			setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('project_path'); ?>"+"manage_project");}, 2000);
		
		
    	
	}
	
	
	
	
	
	}


	function get_project(id){

$.ajax({

        type:"POST",

        url:'<?php echo base_url()?><?php echo $this->config->item('project_path'); ?>'+"edit_project/"+id,

        success: function(response){

			var obj = jQuery.parseJSON(response);

		//CKEDITOR.instances.ck_editor2.setData( '<p>This is the editor data.</p>' );

			$("#name").val(obj['project'].name);

			CKEDITOR.instances.description2.setData(obj['project'].description);

			$("#project_id").val(obj['project'].project_id);

			$("#row_id").val(id);

		 }

    });

return false;



}





$("#update_project").click(function(){

	for (instance in CKEDITOR.instances) {

        CKEDITOR.instances[instance].updateElement();

    }



$.ajax({

        type:"POST",

        url:'<?php echo base_url()?><?php echo $this->config->item('project_path'); ?>'+"update_project",

        data:$("#update_form").serialize(),

        success: function(response){
			//alert(response);
			var obj = jQuery.parseJSON(response);

				if(obj.status==0){

					//alert(obj.message);

				$("#error_2_msg").html(obj.message).show();

			

					setTimeout(function() {

					$('#error_2_msg').fadeOut('slow');

				}, 5000);

			}else{
					$("#error_2_msg").hide();
				$(".success_msg").html(obj.message).show();
				setTimeout(function() {$('.success_msg').fadeOut('slow');}, 5000);
				 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('project_path'); ?>"+"manage_project");}, 2000);
		
				
				
				
				
				
				
				
				/*

				

				var row_val=$("#row_id").val();

			

			//alert(row_val);

				//$("#pr"+row_val).remove();

				var table = $('#project_table').DataTable();

 					table.row("#pr"+row_val).remove();

				//	table.row.add( obj['data'] ).draw();

				

				//$("#append_data").append(obj['data']);

				//$(obj['data']).appendTo(".append_data");

		    //	$(".append_data").append(obj['data']);

				var dt = $('#project_table').DataTable();

			

			var rowid =dt.row.add( [

						obj.name,

						obj.description,

						'<a class="btn btn-primary btn-icon" href="#" data-toggle="modal" onclick="get_project('+obj.project_id+')" data-target="#update_project_modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a class="btn btn-danger btn-icon" onclick="return confirm('+"'Are you sure want to delete this record.'"+')" href('project_path'); ?>delete_project/'+obj.project_id+'><i class="fa fa-trash-o" aria-hidden="true"></i></a>'

					] ).draw( false );

				var theNode = $('#project_table').dataTable().fnSettings().aoData[rowid[0]].nTr;

theNode.setAttribute('id',"pr"+obj.project_id);

				//dt.row.add(obj['data']);

				//dt.draw();

			//	var table = $('#project_table').DataTable();

 			//	table.ajax.reload()

				$("#update_project_modal").modal('hide');

				

			



		*/}

		

        }

    });

return false;

});

	

		

 $(function () {



	 

    CKEDITOR.replace('description');



	CKEDITOR.replace('description2');

  });

   

</script>