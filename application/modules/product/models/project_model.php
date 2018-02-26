<?php 
class Project_model extends CI_Model
{
	
	public function get_last_row()
	{
		
			$query =$this->db->query("SELECT project_id FROM project ORDER BY project_id DESC LIMIT 1");
			return $query->row('project_id');
	}
	public function check_user_on_assign_project($user_id,$project_id)
	{
		
			$query =$this->db->query("SELECT user_id FROM assign_project WHERE user_id='".$user_id."' AND project_id='".$project_id."'");
			//echo $this->db->last_query();
			//die;
			return $query->row('user_id');
	}
	public function get_all_user()
	{
		
			$query =$this->db->query("SELECT * FROM users WHERE user_type_id!='1' AND delete_bit='0'");
			//echo $this->db->last_query();
			//die;
			return $query->result_array();
	}
}

?>