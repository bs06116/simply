<?php 
class Task_model extends CI_Model
{
	
	public function get_user_task_assing($task_id)
	{
		$this->db->select('*');
		$this->db->where('task_id', $task_id);
		$query = $this->db->get('user_task');	
		return $query->result_array();		
	}
	
	public function get_sinlge_task($task_id)
	{   
	
	
			$query = $this->db->query(" SELECT   `project`.`name` as project_name
												, `task`.`task_id`
												, `task`.`project_id`
												, `task`.`deadline`
												, `task`.`name` as task_name
												, `task`.`description` as t_des
												, `task`.`active_bit`
												, `task`.`delete_bit`
												, `task`.`task_piority`
												, `task`.`task_status`
												, `project`.`project_id`
												, `project`.`description` FROM `task`
									 INNER JOIN `project`  ON (`task`.`project_id` = `project`.`project_id`)
									 WHERE  `task`.`delete_bit`=0 AND `task`.`task_id`='".$task_id."'");
			//echo $this->db->last_query();						   
			return $query->row();		
	}
	public function update_task_status($task_id,$status)
	{   
	
				//$this->db->where($colum, $id);
			$this->db->set('task_status', $status);
			$this->db->where('task_id', $task_id);
			$this->db->update('task'); 
			
			return $this->db->affected_rows();	
	}
	
	public function update_task_pirority($task_id,$pri)
	{   
	
				//$this->db->where($colum, $id);
			$this->db->set('task_piority', $pri);
			$this->db->where('task_id', $task_id);
			$this->db->update('task'); 
			
			return $this->db->affected_rows();	
	}
	
	
	
	public function all_task_project()
	{   
	
			$query = $this->db->query(" SELECT `task`.`delete_bit`
												, `task`.`active_bit`
												, `task`.`project_id`
												, `task`.`task_id`
												, `task`.`deadline`
												, `task`.`name`
												, `task`.`description`
												, `task`.`task_piority`
												, `task`.`task_status`
												, `project`.`name` AS project_name  FROM `task`
   							 INNER JOIN `project`  ON (`task`.`project_id` = `project`.`project_id`) 
							 WHERE `task`.`delete_bit` =0 AND `task`.`active_bit`=1;");
								   
			return $query->result_array();		
	}
	
	
	public function hold_task()
		{
			$query = $this->db->query(" SELECT `task`.`delete_bit`
												, `task`.`active_bit`
												, `task`.`project_id`
												, `task`.`task_id`
												, `task`.`deadline`
												, `task`.`name`
												, `task`.`description`
												, `task`.`task_piority`
												, `task`.`task_status`
												, `project`.`name` AS project_name  FROM `task`
   							 INNER JOIN `project`  ON (`task`.`project_id` = `project`.`project_id`) 
							 WHERE `task`.`delete_bit` =0 AND `task`.`active_bit`=1 AND `task`.`task_status`=3;");
								   
			return $query->result_array();			
			
		}
		
		
		public function in_prog_task()
		{
			$query = $this->db->query(" SELECT `task`.`delete_bit`
												, `task`.`active_bit`
												, `task`.`project_id`
												, `task`.`task_id`
												, `task`.`deadline`
												, `task`.`name`
												, `task`.`description`
												, `task`.`task_piority`
												, `task`.`task_status`
												, `project`.`name` AS project_name  FROM `task`
   							 INNER JOIN `project`  ON (`task`.`project_id` = `project`.`project_id`) 
							 WHERE `task`.`delete_bit` =0 AND `task`.`active_bit`=1 AND `task`.`task_status`=2;");
								   
			return $query->result_array();			
			
		}
		
			public function com_task()
		{
			$query = $this->db->query(" SELECT `task`.`delete_bit`
												, `task`.`active_bit`
												, `task`.`project_id`
												, `task`.`task_id`
												, `task`.`deadline`
												, `task`.`name`
												, `task`.`description`
												, `task`.`task_piority`
												, `task`.`task_status`
												, `project`.`name` AS project_name  FROM `task`
   							 INNER JOIN `project`  ON (`task`.`project_id` = `project`.`project_id`) 
							 WHERE `task`.`delete_bit` =0 AND `task`.`active_bit`=1 AND `task`.`task_status`=1;");
								   
			return $query->result_array();			
			
		}
		
		
			public function my_task()
		{
			$query = $this->db->query(" SELECT `task`.`delete_bit`
												, `task`.`active_bit`
												, `task`.`project_id`
												, `task`.`task_id`
												, `task`.`deadline`
												, `task`.`name`
												, `task`.`description`
												, `task`.`task_piority`
												, `task`.`task_status`
												, `user_task`.`user_id`
												, `project`.`name` AS project_name  FROM `task`
   							 INNER JOIN `project`  ON (`task`.`project_id` = `project`.`project_id`) 
							  INNER JOIN `user_task`  ON (`task`.`task_id` = `user_task`.`task_id`) 
							 WHERE `task`.`delete_bit` =0 AND `task`.`active_bit`=1 AND `user_task`.`user_id`='".$this->session->userdata('user_id')."';");
								   
			return $query->result_array();			
			
		}
		
		
		

	public function all_user()
	{   
	
			$query = $this->db->query(" SELECT * FROM `users` WHERE delete_bit=0 AND active_bit=1 AND user_type=1;");
			//echo $this->db->last_query();						   
			return $query->result_array();		
	}
	
	public function get_task_attachment($task_id)
	{   
	
			$query = $this->db->query(" SELECT `task`.`task_id` , `attachement_task`.`attachement` , `task`.`delete_bit` FROM `task`
    									INNER JOIN `attachement_task`   ON (`task`.`task_id` = `attachement_task`.`task_id`)
										 WHERE  `task`.`delete_bit`=0 AND `task`.`task_id`='".$task_id."'");
			//echo $this->db->last_query();						   
			return $query->result_array();		
	}
	
	
}

?>