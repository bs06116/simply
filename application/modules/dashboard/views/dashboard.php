<?php
		
$this->load->view('commons/header.php');

?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Dashboard </h1>
    <!--
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
	  --> 
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Small boxes (Stat box) --> 
    <!-- /.row --> 
    <!-- Main row -->
    <div class="row"> 
      <!-- Left col -->
      <section class="col-lg-12 connectedSortable"> 
        <!-- quick email widget -->
        <div class="box">
        <div class="row">
          <div class="col-lg-12 col-lg-12up">
            <div class="col-lg-8 tasks rem_padd">
              <div class="box-header"> 
                
                <!-- first-task-->
                <button class="collapse1 btn btn-primary mybtn_primary">My Task </button>
                <button class="collapse2 btn btn-primary mybtn_primary">All Task </button>
                <a  data-toggle="modal" data-target="#import_data" class="btn btn-primary mybtn_primary"><i class="fa fa-fw fa-plus"></i> </a>
                <!-- pop up -->
                <div id="import_data" class="modal fade modalfadeup" role="dialog" style="width: 720px; padding-left:0;">
                <div class="modal-dialog">
                  <form id="task_form"  method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Task</h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group cs_account_main">
                          <div class="row">
                          
                            <div class="col-lg-6">
                              <label >Task Name</label>
                              <input type="subject"  name="name"  class="form-control" placeholder="Name" />
                            </div>
                            
                            <div class="col-lg-6">
                            <div class="form-group">
                              <label>Select Project</label>
                              <select id="project_id" name="project_id" class="select2 form-control" style="width:100%">
                                <option value="0" >Please select Project</option>
                                <?php foreach($all_project as $ap): ?>
                                <option value="<?php echo $ap['project_id']?>"><?php echo $ap['name']?></option>
                                <?php endforeach;?>
                              </select>
                            </div>
                          </div>
                          
                          
                           <div class="col-lg-6">
                              <label>Priority </label><br />
                            <select class="form-group form-control" name="priority">
                                 <option value="">Select Priority</option>
                                 
                                  <option value="p1">P1</option>
                                  <option value="p2">P2</option>
                                  <option value="p3">P3</option>
                                  <option value="p4">P4</option>
                            </select>
                            </div>
                            
                            <div class="col-lg-6">
                            <div class="form-group">
                             <label>Status </label><br />
                            <select class="form-group form-control" name="status">
                             	<option value="0">Select Status</option>
                                  <option value="1">Complete</option>
                                  <option value="2">In Progress</option>
                                  <option value="3">On Hold or Not started</option>
                                
                              
                              
                            </select>
                            </div>
                          </div>
                          
                          <div class="form-group col-lg-6">
                          <div class="checks">
                          
                          
                        

                            <label>User </label><br />
                            
                            <select class="form-group selectpicker" multiple name="user[]" id="test" >
                          
                              <?php foreach($all_user as $au): ?>
                              <option value="<?php echo $au['userid']?>"><?php echo $au['fullname']?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                        </div>
                        
                        <div class="col-lg-6">
                          <label type="readonly">Date</label>
                        <input class="datepicker form-control" name="date" />
                        </div>
                          </div>
                        </div>
                        
                        
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="section">Description</label>
                              <textarea type="text"  name="description" class="form-control description"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="section">File</label>
                              <input type="file" multiple  name="file_img[]" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div id="error_msg" style=" display:none;" class="alert custom-error alert-danger"></div>
                        <div id="success_msg" style=" display:none;" class="alert custom-error alert-success"></div>
                      </div>
                      <div class="modal-footer"> <a href="#" id="submit_type2" class="btn btn-primary mybtn_primary">Save</a>
                        <button type="button" class="btn btn-default mybtn_primary"  data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
              
              <!--collapsible data-->
              
              <div class="table tableup" id="data-1">
              <div class="scrollbox3">
                <table>
                  <tr>
				  <td></td>
                    <td><b>Task</b></td>
                    <td><b>Deadline</b></td>
                    <td><b>Assigned To</b></td>
					<td><b>Prority</b></td>
                      <td><b>Project</b></td>
                  </tr>
                  <?php foreach($all_user_task as $aut):?>
                  <tr style="cursor:pointer;">
                  	 <td data-toggle="modal" data-target="#tskstatus" onClick="get_task_status('<?php echo $aut->task_id;?>','<?php echo $aut->task_status;?>')" >
                    
					 <?php  if($aut->task_status==1){ echo "<i class='fa fa-circle complete' aria-hidden='true' title='Complete'></i>";}?>
                   <?php  if($aut->task_status==2){ echo "<i class='fa fa-circle inprogress' aria-hidden='true' title='In Progress'></i>";}?>
                   <?php  if($aut->task_status==3){ echo "<i class='fa fa-circle onhold' aria-hidden='true' title='On Hold or not Started'></i>";}?>
                   </td>
                    <td onClick="get_single_task('<?php echo $aut->task_id;?>')" data-toggle="modal" data-target="#get_task_data"><?php echo $aut->name;?></td>
                    <td onClick="get_single_task('<?php echo $aut->task_id;?>')" data-toggle="modal" data-target="#get_task_data"><?php echo $aut->deadline;?></td>
                    <td onClick="get_single_task('<?php echo $aut->task_id;?>')" data-toggle="modal" data-target="#get_task_data"><?php echo $aut->fullname;?></td>
                    <td data-toggle="modal" data-target="#tskpriority" onClick="get_task_pri('<?php echo $aut->task_id;?>','<?php echo $aut->task_piority;?>')" >
					
					<?php if($aut->task_piority=='p1'){echo "<span title='critical' class='block'><span class='critical sm3'>P1</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> 
Critical&nbsp;&nbsp;</span>--></span>";} ?>
                     	<?php if($aut->task_piority=='p2'){echo "<span title='High' class='block'><span class='high sm3'>P2</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> High&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>--></span>";} ?>
                     	<?php if($aut->task_piority=='p3'){echo "<span title='Medium' class='block'><span class='medium sm3'>P3</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> Medium</span>--></span>";} ?>
                     	<?php if($aut->task_piority=='p4'){echo "<span title='Low' class='block'><span class='low sm3'>P4</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> Low&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>--></span>";} ?>
                     </td>
                   <td onClick="get_single_task('<?php echo $aut->task_id;?>')" data-toggle="modal" data-target="#get_task_data"><?php echo $aut->project_name; ?></td>
                  </tr>
                  <?php endforeach;?>
                    </tr>
                  
                </table>
                </div>
              </div>
              
              <!-- </div>--> 
              
              <!-- 2nd-->
              
              <div class="table tableup" id="data-2">
              <div class="scrollbox3">
                <table>
                  <tr>
					<td></td>
                    <td><b>Task</b></td>
                    <td><b>Deadline</b></td>
                    <td><b>Assigned To</b></td>
					 <td><b>Prority</b></td>
					 <td><b>Project</b></td>
                  </tr>
                  <?php foreach($all_task as $at):
							  $data_array=$this->dashboard_model->get_task_user($at->task_id);
							//  print_r($at);

								
							
						?>
                  <tr style="cursor:pointer;">
                 <!-- <a  data-toggle="modal" data-target="#get_task_data" onclick="get_single_task('<?php echo $at->task_id;?>')" class="btn btn-primary btn-icon btn-iconlast view" title="View"> </a>-->
                   <td data-toggle="modal" data-target="#tskstatus" onClick="get_task_status('<?php echo $aut->task_id;?>','<?php echo $aut->task_status;?>')"><?php  if($at->task_status==1){ echo "<i class='fa fa-circle complete' aria-hidden='true' title='Complete'></i>";}?>
                   <?php  if($at->task_status==2){ echo "<i class='fa fa-circle inprogress' aria-hidden='true' title='In Progress'></i>";}?>
                   <?php  if($at->task_status==3){ echo "<i class='fa fa-circle onhold' aria-hidden='true' title='On Hold or not Started'></i>";}?>
                   </td>
                  
                    <td onClick="get_single_task('<?php echo $at->task_id;?>')" data-toggle="modal" data-target="#get_task_data"><?php echo $at->name;?></td>
                    <td onClick="get_single_task('<?php echo $at->task_id;?>')" data-toggle="modal" data-target="#get_task_data"><?php echo $at->deadline;?></td>
                    <td onClick="get_single_task('<?php echo $at->task_id;?>')" data-toggle="modal" data-target="#get_task_data"><?php echo implode(",",$data_array);?></td>
                     <td data-toggle="modal" data-target="#tskpriority" onClick="get_task_pri('<?php echo $at->task_id;?>','<?php echo $at->task_piority;?>')"><?php if($at->task_piority=='p1'){echo "<span title='Critical' class='block'><span class='critical sm3'>P1</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> 
Critical&nbsp;&nbsp;</span>--></span>";} ?>
                     	<?php if($at->task_piority=='p2'){echo "<span title='High' class='block'><span class='high sm3'>P2</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> High&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>--></span>";} ?>
                     	<?php if($at->task_piority=='p3'){echo "<span title='Medium' class='block'><span class='medium sm3'>P3</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> Medium</span>--></span>";} ?>
                     	<?php if($at->task_piority=='p4'){echo "<span title='Low' class='block'><span class='low sm3'>P4</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> Low&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>--></span>";} ?>
                     </td>
                     <td onClick="get_single_task('<?php echo $at->task_id;?>')" data-toggle="modal" data-target="#get_task_data" ><?php echo $at->project_name; ?></td>
                  </tr>
                  <?php endforeach;?>
                </table>
                </div>
              </div>
            </div>
            
            <!--style="float:right;width:300px;margin-top:50px;margin-right:13px; max-height:300px; overflow-y: scroll;"-->
            <div class="col-lg-4 dash-new rem_padd">
            <div class="col-lg-12 title">
              <h1>Customers News Feed</h1>
                          <a href="#" style="margin-top:10px;  float: right;" class="cus-btn" data-toggle="modal" data-target="#add_customer_feed">
                            <i class="fa fa-plus" aria-hidden="true"></i> </a>
                            
                            
                             
              
                            </div>
                            
                            <div class="clearfix"></div>
                         <div class="col-lg-12 dragging scrollbox3" >
              <?php /*?><?php foreach($all_newfeed as $an):?>
             <p style="margin-left:10px;"><?php echo $an->message?></p>
             <?php endforeach;?><?php */ //print_r($all_newfeed);?>
             
              <?php $get_all_cuts=$this->dashboard_model->get_all_cutomers();
			
			   foreach($get_all_cuts as $an){
				   $get_latest_news=$this->dashboard_model->get_latest_news($an['cust_id']);
				
				 if(!empty($get_latest_news)){
				  
				   ?>
              <div class="das-feed">
              <a href="#" onclick="get_feed_note('<?php echo $get_latest_news->customer_id; ?>')" class=""  data-toggle="modal" data-target="#view_feed_customer">
              
             
               <h4 class="hchange" style="margin-bottom:2px; color:#D33724;"><?php echo $get_latest_news->name;?></h4>
              </a>
               
         <p class="feed-date"><?php echo $get_latest_news->feed_date;?> &nbsp;&nbsp;&nbsp;</p>
		    
				 
           
               <p class="mesg"><?php 
			   $str = $get_latest_news->message;
			   $certificate_id=explode(",,",$str);
			
			
			   $result = mb_substr($get_latest_news->message, 3, 8);
		//	echo "------".$result."------------";
			
			   if($result=="tificati"){
				   $gstr = $get_latest_news->message;
			   $certificate_id=explode(",,",$gstr);
				echo  $certificate_id[0]." ";	if(isset($certificate_id[2])){
			   echo $certificate_id[2]." "; }
			   //	$ff = mb_substr($get_latest_news->message,-5);
				 // echo "---- : ".$ff ; 
			   ?> 
               
<div><a target="_blank" href="<?php echo base_url().$this->config->item('certificate_path')?>view_pdf/<?php  if(isset($certificate_id[1])){
			   echo $certificate_id[1]; } ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></div>
			   <?php }else{ echo  $get_latest_news->message;?></p>
                <p class="img-attachment">
				  
				
				<?php  if(!empty($get_latest_news->news_feed_img)){
			  		$last3chars = substr($get_latest_news->news_feed_img, -3);
		//echo $last3chars."<br>";
		if($last3chars=='ocx'){
			$ab="<div><a target='_blank' href='".base_url()."uploads/".$get_latest_news->news_feed_img."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a></div>";
			}elseif($last3chars=='jpg'){
				$ab= "<div><a target='_blank' href='".base_url()."uploads/".$get_latest_news->news_feed_img."'>
                	<img src='".base_url()."uploads/".$get_latest_news->news_feed_img."'  width='50' height ='50'/></a></div>";
			//$ab= "<a target='_blank' href='".base_url()."uploads/".$da['attachement']."'><i class='fa fa-file-image-o' aria-hidden='true'></i></a>";
			
			}elseif($last3chars=='pdf'){
			$ab="<div><a target='_blank' href='".base_url()."uploads/".$get_latest_news->news_feed_img."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a></div>";	
			//$ab="<a target='_blank' href= '".base_url()."uploads/no_thub.png> <img src='".base_url()."uploads/no_thub.png'  width='50' height ='50'/></a>";	
			}
			if(isset($ab)){
				echo $ab;
				}
				}?></p>
				<?php }?>
                 
              
              <!--<div class="message feed-img col-lg-3">
              
              </div>-->
               
              </div>
              <?php } }?>
              </div>   
            </div>
            
            <!-- 2nd column end--    div>
		   </div>    <!--header--> 
            
          </div>
          <!--sidebrend--> 
        </div>
        <!-- row closed --> 
        
        <!--
            <div class="box-footer clearfix">
              <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
            </div>
			-->
        
        <div class="row rowfooter">
          <div class="col-lg-3 col-xs-6"> 
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo count($all_cust);?></h3>
                <p>Total Customers</p>
              </div>
              <div class="icon"> <i class="fa fa-user" aria-hidden="true"></i> </div>
              <a href="<?php echo base_url()?>user/manage_user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6"> 
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo count($all_pro);?></h3>
                <p>Total Templates</p>
              </div>
              <div class="icon"> <i class="fa fa-shopping-basket" aria-hidden="true"></i> </div>
              <a href="<?php echo base_url();?>product/manage_product" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6"> 
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo count($all_cer);?></h3>
                <p>Total Certificates</p>
              </div>
              <div class="icon"> <i class="fa fa-files-o"></i> </div>
              <a href="<?php echo base_url();?>certificate/manage_certificate" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
          </div>
          <div class="col-lg-3 col-xs-6"> 
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo count($all_project);?></h3>
                <p>Total Projects</p>
              </div>
              <div class="icon"> <i class="fa fa-files-o"></i> </div>
              <a href="<?php echo base_url();?>project/manage_project" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
          </div>
          <?php /*?>   <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>
              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>?php */?>
          <!-- ./col --> 
        </div>
      </section>
      <!-- /.Left col --> 
    </div>
    <!-- /.row (main row) --> 
    
  </section>
  <!-- /.content --> 
</div>
<!------------ get task data ----------->
<div id="get_task_data" class="modal fade modalfadeup" role="dialog" style="width: 720px; padding-left:0;">
                <div class="modal-dialog">
                  <form id="task_form"  method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                        <h4 class="modal-title">View Task</h4>
                      </div>
                      <div class="modal-body col-lg-12">
                          <div class="import_task_data">
                          
                          </div>
                     
                      
                      </div>
                      <div class="col-lg-6">
                        <div id="error_msg" style=" display:none;" class="alert custom-error alert-danger"></div>
                        <div id="success_msg" style=" display:none;" class="alert custom-error alert-success"></div>
                      </div> <div class="modal-footer"> 
                     
                        <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
                
                
<!------update task--------------->
<div id="update_project_modal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
        
            <!-- Modal content-->
            <form id="update_task_form" name="update_task_form"  method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Task</h4>
              </div>
              <div class="modal-body">
                
                        <div class="form-group cs_account_main">
                          <div class="row">
                          <div class="col-lg-6">
                              <label >Task Name</label>
                            <input type="text"  name="name" id="name" class="form-control" />
                         </div>
                         
                         <div class="col-lg-6">
               <div class="form-group">
                    <label for="section">Project </label>
                           <select class="select2 form-control" name="project_id" id="project">
                           		<option value="">Select Project</option>
                                <?php foreach($all_project as $ap): ?>
                                <option value="<?php echo $ap['project_id']?>"><?php echo $ap['name']?></option>
                                <?php endforeach;?>
                           </select>
               </div>
           </div>
           					<div class="col-lg-6">
                              <label>Priority </label><br />
                            <select class=" form-group form-control" name="priority" id="task_piority">
                                 <option value="">Select Priority</option>
                                 
                                  <option value="p1">P1</option>
                                  <option value="p2">P2</option>
                                  <option value="p3">P3</option>
                                  <option value="p4">P4</option>
                            </select>
                            </div>
                            
                            <div class="col-lg-6">
                            <div class="form-group">
                             <label>Status </label><br />
                            <select class="form-group form-control" name="status" id="task_status">
                             	<option value="0">Select Status</option>
                                  <option value="1">Complete</option>
                                  <option value="2">In Progress</option>
                                  <option value="3">On Hold or Not started</option>
                            </select>
                            </div>
                          </div>
           
           <div class="col-lg-6">
           <div class="form-group">
         <div class="checks">
                    <label>User </label><br/>
                           <select class="form-group" multiple name="user[]"  id="user">
                              <?php foreach($all_user as $au): ?>
                                <option  value="<?php echo $au['userid']?>"><?php echo $au['fullname']?></option>
                                <?php endforeach;?>
                           </select>
        </div>
               </div>
           </div>
           
           <div class="col-lg-6 up_temp">
           <div class="form-group">
                    <label for="section">Date </label>
                           <input type="text" id="deadline_dead" readonly  name="date"  class="form-control datepicker" />  
               </div>
           </div>
                  </div>
                </div>
        		<div class="row">
        		  <div class="col-lg-12">
            		<div class="form-group">
                    	
                    <label for="section">Description</label>
                            <textarea type="text"  name="description" id="description2" class="description form-control"></textarea>
                   	</div>
                  </div>
                </div>
                <div class="row">
        		  <div class="col-lg-12">
            		<div class="form-group">
                    	
                    <label for="section">File</label>
                           <input type="file" multiple  name="file_img[]" />
                   	</div>
                  </div>
                </div>
              </div>
           <div class="col-lg-6">
            <div id="error_2_msg" style=" display:none;" class="alert custom-error alert-danger"></div>
            <div id="success_2_msg" style=" display:none;" class="alert custom-error alert-success"></div>
           
          </div>
           <input type="hidden"  name="task_id" id="task_id"/>
          <div class="modal-footer">
          <a href="#" id="update_task" class="btn btn-primary">Update</a>
          
            <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
          </div>
        </div>
        
        </form>
        <input type="hidden"  value="<?php echo base_url();?>" id="base_url"/>
          </div>
   </div>
   <script>
   	function get_task(id){
$.ajax({
        type:"POST",
        url:'<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>'+"edit_task/"+id,
        success: function(response){
			var obj = jQuery.parseJSON(response);
			//alert(response);
		//CKEDITOR.instances.ck_editor2.setData( '<p>This is the editor data.</p>' );
			$("#name").val(obj['task'].name);
			
			$("#task_id").val(obj['task'].task_id);
			$("#deadline_dead").val(obj['task'].deadline);
			$("#project").val(obj['task'].project_id);
			$("#task_piority").val(obj['task'].task_piority);
			$("#task_status").val(obj['task'].task_status);
			CKEDITOR.instances.description2.setData(obj['task'].description);
			
			var fld = document.getElementById('user');
			//$("#user").val(obj['task'].user_id);
			$("#row_id").val(id);
			//alert(obj['user_task'].length);
			  for (i = 0; i < obj['user_task'].length; i++) {
			var ids=obj['user_task'][i].user_id;
            	$('#user option[value='+ids+']').attr("selected", "selected");
				}
				$('#user').multiselect('refresh');
				$('#user').multiselect({

includeSelectAllOption: true

});

				//$('#user').multiselect('rebuild');
				
			//	$('#user').multiselect();
		}
				

    });
return false;

}


$("#update_task").click(function(){
	for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
var formData = new FormData($('#update_task_form')[0]);
$.ajax({
        type:"POST",
        url:'<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>'+"update_task",
        data:formData,
		processData: false,  //Add this
        contentType: false, //Add this
        success: function(response){
			//alert(response);return false;
			var obj = jQuery.parseJSON(response);
				if(obj.status==0){
					//alert(obj.message);
				$("#error_2_msg").html(obj.message).show();
			
					setTimeout(function() {
					$('#error_2_msg').fadeOut('slow');
				}, 5000);
			}else{
				$("#success_2_msg").html(obj.message).show();
				setTimeout(function() {$('#success_msg').fadeOut('slow');}, 5000);
				 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('dashboard_path'); ?>");}, 2000);
			/*	var row_val=$("#row_id").val();
			
			//alert(row_val);
				//$("#pr"+row_val).remove();
				var table = $('#data_table').DataTable();
 					table.row("#pr"+row_val).remove();
				//	table.row.add( obj['data'] ).draw();
				
				//$("#append_data").append(obj['data']);
				//$(obj['data']).appendTo(".append_data");
		    //	$(".append_data").append(obj['data']);
				var dt = $('#data_table').DataTable();
			
			var rowid =dt.row.add( [
						obj.name,
						obj.description,
						'<a class="btn btn-primary btn-icon" href="#" data-toggle="modal" onclick="get_project('+obj.project_id+')" data-target="#update_project_modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a class="btn btn-danger btn-icon" onclick="return confirm('+"'Are you sure want to delete this record.'"+')" href=project_path'); ?>delete_project/'+obj.project_id+'><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
					] ).draw( false );
				var theNode = $('#data_table').dataTable().fnSettings().aoData[rowid[0]].nTr;
theNode.setAttribute('id',"pr"+obj.project_id);
				//dt.row.add(obj['data']);
				//dt.draw();
			//	var table = $('#data_table').DataTable();
 			//	table.ajax.reload()
				$("#update_project_modal").modal('hide');
				*/
			

		}
		
        }
    });
return false;
});
	
		
 $(function () {

	 
    CKEDITOR.replace('description');

	CKEDITOR.replace('description2');
  });
   

   </script>
<!------ update task end -------------->                
<!------------ get task data ----------->                
                
<div id="view_feed_customer" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width:800px;"> 
    
    <!-- Modal content-->
    
    <div class="modal-content">
      
      
      <div class="col-lg-12" id="load_html"> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="add_customer_feed" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width:600px;"> 
  
  	
    
    <!-- Modal content-->
     <form id="validation_forms">
    <div class="modal-content">
    
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Customer Feeds</h3>
      </div>
      <div class="modal-body"><section class="tttt">
        <div class="row">
          <div class="col-lg-6">
          	
          
            <div class="row">
            	
                 <div class="col-lg-12">
                	<div class="form-group">
                    	<label>Customer Name</label>
                        <input type="text"  name="c_name" id="c_name" placeholder="Search by name" class="form-control" >
                    </div>
                </div>
               
                <div class="col-lg-12">
                	<div class="form-group">
                    	<label>Message</label>
                        <textarea type="text" name="message_n"   class="form-control" style="width:100%"></textarea>
                    </div>
                </div>
                 <div class="col-lg-12">
               <div class="form-group">
					  <label for="section">File</label>
					  <input type="file" name="userfile" />
            </div>
                </div>
            </div>
            <div id="error_msgs" style=" display:none;" class="alert custom-error alert-danger"></div>
             <div id="success_msgs" style=" display:none;" class="alert custom-error alert-success"></div>
            <div class="row">
            <div class="col-lg-12 text-right form-group">
          	 <input type="hidden" id="customer_id" name="customer_id" value="" />
            
           
            </div>
            </div>
     
            
          </div>
        </div>
        <div id="error_msg" class="alert custom-error alert-danger" style="display:none"></div>
        <div id="success_msg" class="alert custom-error alert-success" style="display:none"></div>
      </section> </div>
      <div class="col-lg-12" id="load_html"> </div>
      <div class="modal-footer">
       <input type="button" class="btn btn-info mybtn_primary" value="Submit" id="submit_certificate">
       
        <button type="button" class="btn btn-default mybtn_primary"  data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal status-->
  <div class="modal fade" id="tskstatus" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Status</h4>
        </div>
        <div class="modal-body row">
           						
                            
                            <div class="col-lg-6">
                            <div class="form-group">
                             <label>Status </label><br />
                            <select class="form-control" name="status" id="tsk_sta_id">
                             	
                                  <option value="1">Complete</option>
                                  <option value="2">In Progress</option>
                                  <option value="3">On Hold or Not started</option>
                                
                              
                              
                            </select>
                            <input type="hidden" value="" name="task_id" id="update_tsk_id" class="form-control"/>
                            </div>
                          </div>
                          
        </div>
         <div class="col-lg-6">
                        <div style="display:none;" class="alert custom-error alert-danger error_msg_s"></div>
                        <div style=" display:none;" class="alert custom-error alert-success success_msg_s"></div>
          </div>
        <div class="modal-footer">
         <input type="button" class="btn btn-info" value="Update" id="update_task_status">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Modal status-->
  <div class="modal fade" id="tskpriority" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Priority</h4>
        </div>
        <div class="modal-body row">
         <div class="col-lg-6">
                              <label>Priority </label><br />
                            <select class="form-control form-control" name="priority" id="update_prio">
                               
                                 
                                  <option value="p1">P1</option>
                                  <option value="p2">P2</option>
                                  <option value="p3">P3</option>
                                  <option value="p4">P4</option>
                            </select>
                              <input type="hidden" value="" name="task_id" id="update_tsk_up_id" class="form-control"/>
                            </div>
        </div>
         <div class="col-lg-6">
                        <div style=" display:none;" class="alert custom-error alert-danger error_msg_s"></div>
                        <div style=" display:none;" class="alert custom-error alert-success success_msg_s"></div>
          </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-info" value="Update" id="update_tsk_prioo">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>




<!-- /.content-wrapper -->
<?php $this->load->view('commons/footer'); ?>

<!-- by ismail --> 
<script type="text/javascript">
 $(document).ready(function() {
  
	$(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
  });


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
	var formData = new FormData($('#validation_forms')[0]);
$.ajax({
        type:"POST",
        url:'<?php echo base_url()?><?php echo $this->config->item('certificate_path'); ?>'+"save_newsfeed",
        data:formData,
		processData: false,  //Add this
		contentType: false,
        success: function(response){
			//alert(response);return false
			var obj = jQuery.parseJSON(response);
			//alert(response);
			if(obj.status==0){
				$("#error_msgs").html(obj.message).show();
			
					setTimeout(function() {
					$('#error_msgs').fadeOut('slow');
				}, 5000);
			}else if(obj.status==1){
				$("#success_msgs").html(obj.message).show();
				//$("#validation_form")[0].reset();
				 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('dashboard_path'); ?>");}, 2000);
			}
			
        }
    });
return false;
});
</script>
<script>



 $('.collapse1').click(function(){
	
	 $('#data-1').show();
	 $('#data-2').hide();
	 
 });
 $('.collapse2').click(function(){
	 
	 $('#data-1').hide();
	 $('#data-2').show();
	 
 });
	
	$("#submit_type2").click(function(){
	for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
var formData = new FormData($('#task_form')[0]);

$.ajax({
        type:"POST",
        url:'<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>'+"save_task",
        data:formData,
		processData: false,  //Add this
        contentType: false, //Add this
        success: function(response){
			var obj = jQuery.parseJSON(response);
			//alert(obj.status);
			if(obj.status==0){
				$("#error_msg").html(obj.message).show();
				setTimeout(function() {$('#error_msg').fadeOut('slow');}, 5000);
			}else{
				$("#success_msg").html(obj.message).show();
				setTimeout(function() {$('#success_msg').fadeOut('slow');}, 5000);
				 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('dashboard_path'); ?>");}, 2000);
		
			
			}
        }
    });
return false;
});

		
 $(function () {

	 
    CKEDITOR.replace('description');

	
  });
   
</script> 
<script>
function get_feed_note(id){

				

        	    $.ajax({

                    type:"POST",

                    url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"get_single_user_feed/"+id,

                    success: function(response){

						//alert(response);

						$("#load_html").html(response)

						 $("#user_feed").DataTable({})

						//return false;

                     

                      

                     }

                });

            	return false;

            

            }





 
  </script> 
  
  <script>
		function get_task_status(task_id,status){
			$("#tsk_sta_id").val(status);
			$("#update_tsk_id").val(task_id);
       }
		
		$("#update_task_status").click(function(){
			var status=$("#tsk_sta_id").val();
			var task_id= $("#update_tsk_id").val();
			
		 $.ajax({
					type:"POST",
					url:'<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>'+"update_task_status/"+task_id+"/"+status,
					success: function(response){
							//alert(response);return false;
							var obj = jQuery.parseJSON(response);
					
						if(obj.status==1){
							$(".success_msg_s").html(obj.message).show();
						setTimeout(function() {$('.success_msg_s').fadeOut('slow');}, 5000);
						 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('dashboard_path'); ?>");}, 2000);
							
						
						}else{
							$(".error_msg_s").html(obj.message).show();
							setTimeout(function() {$('.error_msg_s').fadeOut('slow');}, 5000);
						}
						
					}
                });
 		});
		
		function get_task_pri(task_id,pri){
			$("#update_prio").val(pri);
			$("#update_tsk_up_id").val(task_id);
       }
		
		$("#update_tsk_prioo").click(function(){
			var pri=$("#update_prio").val();
			var task_id= $("#update_tsk_up_id").val();
			
		 $.ajax({
					type:"POST",
					url:'<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>'+"update_task_pirority/"+task_id+"/"+pri,
					success: function(response){
							//alert(response);return false;
							var obj = jQuery.parseJSON(response);
					
						if(obj.status==1){
							$(".success_msg_s").html(obj.message).show();
						setTimeout(function() {$('.success_msg_s').fadeOut('slow');}, 5000);
						 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('dashboard_path'); ?>");}, 2000);
							
						
						}else{
							$(".error_msg_s").html(obj.message).show();
							setTimeout(function() {$('.error_msg_s').fadeOut('slow');}, 5000);
						}
						
					}
                });
 		});



  </script>
  <script>
function get_single_task(task_id){

			//	alert(task_id);
			//	return false;

        	    $.ajax({

                    type:"POST",

                    url:'<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>'+"get_single_task/"+task_id,

                    success: function(response){

						//alert(response);return false;

						$(".import_task_data").html(response)

						 $("#get_sinlge_task").DataTable({})

						//return false;
                     }
                });
            	return false;
            }





  /*$(document).ready(function() {
  
	$(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
  });*/
  </script>
  
<script type="text/javascript">

    $(document).ready(function() {

        $('#test').multiselect();
		
		

    });

</script>

<!--<script>
$(document).ready(function(e) {
    $(function () {

    $(".js-table").on("click", "tr[data-url]", function () {
        window.location = $(this).data("url");
    });

});
});
</script>-->