
                  <div id="get_sinlge_task">
                    <h1 class="task-name"><?php echo $get_sinlge_task->task_name?></h1>
                    <a class="btn btn-primary btn-icon" data-toggle="modal" data-target="#update_project_modal"   href="#" onclick="get_task('<?php echo $get_sinlge_task->task_id;?>')" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <div class="col-lg-12 rem_padd">
						<div class="col-lg-3 rem_padd">
							<p class="task-head">Project:</p>
						</div>
						<div class="col-lg-9">
							<p class="task-det"><?php echo $get_sinlge_task->project_name?></p>
						</div>
					</div>
					<div class="col-lg-12 rem_padd">
						<div class="col-lg-3 rem_padd">
							<p class="task-head">Description:</p>
						</div>
						<div class="col-lg-9">
							<p class="task-det"><?php echo $get_sinlge_task->t_des?></p>
						</div>
					</div>
                    <div class="col-lg-12 rem_padd">
						<div class="col-lg-3 rem_padd">
						<p class="task-head">Dead Line:</p>
						</div>
						<div class="col-lg-9">
						<p class="task-det"><?php echo $get_sinlge_task->deadline?></p>
						</div>
					</div>
					<div class="col-lg-12 rem_padd">
						<div class="col-lg-3 rem_padd">
						<p class="task-head">Status:</p>
						</div>
						<div class="col-lg-9">
						<p class="task-det">
					<?php  if($get_sinlge_task->task_status==1){ echo "<i class='fa fa-circle complete' aria-hidden='true'></i>";}?>
                   <?php  if($get_sinlge_task->task_status==2){ echo "<i class='fa fa-circle inprogress' aria-hidden='true'></i>";}?>
                   <?php  if($get_sinlge_task->task_status==3){ echo "<i class='fa fa-circle onhold' aria-hidden='true'></i>";}?>
					</p>
						</div>
					</div>
                    <div class="col-lg-12 rem_padd">
						<div class="col-lg-3 rem_padd">
						<p class="task-head">Priority:</p>
						</div>
						<div class="col-lg-9">
						<p class="task-det">
							<?php if($get_sinlge_task->task_piority=='p1'){echo "<span title='critical' class='block'><span class='critical sm3'>P1</span><span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> 
Critical&nbsp;&nbsp;</span></span>";} ?>
                     	<?php if($get_sinlge_task->task_piority=='p2'){echo "<span title='High' class='block'><span class='high sm3'>P2</span><span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> High&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>";} ?>
                     	<?php if($get_sinlge_task->task_piority=='p3'){echo "<span title='Medium' class='block'><span class='medium sm3'>P3</span><span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> Medium</span></span>";} ?>
                     	<?php if($get_sinlge_task->task_piority=='p4'){echo "<span title='Low' class='block'><span class='low sm3'>P4</span><span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> Low&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>";} ?>
					</p>
						</div>
					</div>
                    <?php  
					$get_task_attachment=$this->task_model->get_task_attachment($get_sinlge_task->task_id);?>
                    <div class="col-lg-12 rem_padd">
						<div class="col-lg-3 rem_padd">
						<p class="task-head">Attachment: </p>
						</div>
						<div class="col-lg-9">
						<p class="task-det">
                       
                 <?php  if(!empty($get_task_attachment)){
							foreach ( $get_task_attachment as $task_attachment ){  
							$last3chars = substr($task_attachment['attachement'], -3);
							if($last3chars=='ocx'){?>
						<a href="<?php echo base_url()."uploads/".$task_attachment['attachement']; ?>" target="_blank" ><i class='fa fa-file-word-o' aria-hidden='true'></i></a>		
						<?php }elseif($last3chars=='jpg'){ ?>
						<a href="<?php echo base_url()."uploads/".$task_attachment['attachement']; ?>" target="_blank" ><i class='fa fa-file-image-o' aria-hidden='true'></i></a>	
			
			<?php }elseif($last3chars=='pdf'){ ?>
				
						<a href="<?php echo base_url()."uploads/".$task_attachment['attachement']; ?>" target="_blank" ><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a>
         <?php
				
			}else{ ?>
					<a href="<?php echo base_url()."uploads/".$task_attachment['attachement']; ?>" target="_blank" ><i class='fa fa-download' aria-hidden='true'></i></a>	
				
		
			<?php }?>
								<?php /*?><a href="<?php echo base_url()."uploads/".$task_attachment['attachement']; ?>" target="_blank" ><?php echo base_url()."uploads/".$task_attachment['attachement']; ?></a><?php */?>
							<?php }
						}else{ echo "No Attachment";?>
                        
							
					<?php }?>
                    </p>
						</div>
					</div>
					
                      </div>
               