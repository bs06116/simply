
                  <table id="in_pro_task" class="table table-bordered table-striped icon_space in_prog_tasks">
                    <thead>
                      <tr>
                      <th>Sr.#</th>
                      <th>Attachment</th>
                        <th>Task</th>
                        <th>Deadline</th>
                        <th>Assigned To</th>
                        <th>Prority</th>
                        <th>Project</th>
                        <!--<th>Description</th>-->
                         
                        <th>Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      
                      <? $k=1; if(!empty($in_prog_task)){foreach($in_prog_task as $task) {
						   $data_array=$this->dashboard_model->get_task_user($task['task_id']);
						   
						     $get_task_arrachment=$this->dashboard_model->get_task_arrachment($task['task_id']);
							
						
						   ?>
                      
                      <tr id="pr<?=$task['task_id'];?>">
                      <td><?php echo $k;?></td>
                      <td><?php  echo implode(",",$get_task_arrachment);?></td>
                        <td><?=$task['name'];?></td>
                        
                        <td><?=$task['deadline'];?></td>
                        <td><?php echo implode(",",$data_array);?></td>
                        <td>
					<?php if($task['task_piority']=='p1'){echo "<span title='critical' class='block'><span class='critical sm3'>P1</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> 
Critical&nbsp;&nbsp;</span>--></span>";} ?>
                     	<?php if($task['task_piority']=='p2'){echo "<span title='High' class='block'><span class='high sm3'>P2</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> High&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>--></span>";} ?>
                     	<?php if($task['task_piority']=='p3'){echo "<span title='Medium' class='block'><span class='medium sm3'>P3</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> Medium</span>--></span>";} ?>
                     	<?php if($task['task_piority']=='p4'){echo "<span title='Low' class='block'><span class='low sm3'>P4</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> Low&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>--></span>";} ?></td>
                        <td><?=$task['project_name'];?></td>
                        <!--<td><?=$task['description'];?></td>-->
                       
                        <td><a data-toggle="modal" data-target="#get_task_data" onclick="get_single_task('<?=$task['task_id'];?>')" class="btn btn-primary btn-icon btn-iconlast view" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a> <a class="btn btn-primary btn-icon" data-toggle="modal" data-target="#update_project_modal"   href="#" onclick="get_task('<?php echo $task['task_id']?>')" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a  class="btn btn-danger btn-icon" onclick="return confirm('Are you sure want to delete this record.')" href="<?=base_url();?><?php echo $this->config->item('task_path'); ?>delete_task/<?=$task['task_id'];?>" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                      
                      </tr>
                      <? $k++;}} ?>
                      
                    </tbody>
                   
                  </table>
               