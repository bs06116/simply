<?php 
class Project_model extends CI_Model
{
	
	
	public function get_task_count($project_id)
		{
		$query = $this->db->query("SELECT COUNT(*) AS total_task FROM `task` WHERE delete_bit=0 AND `project_id`='".$project_id."'");
		
		return $query->row();		
		}
	
	public function edit_project_status($status,$project_id)
		{
			
			$this->db->set('active_bit', $status);
			$this->db->where('project_id', $project_id);
			$this->db->update('project'); 
			
			return $this->db->affected_rows();		
		}
	
	
	
}

?>