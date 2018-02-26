<?php 
class Login_model extends CI_Model
{
	
	public function get_login($username,$password)
	{
		 
		
		$this->db->select('*');
		$this->db->where('username',$username);		
		$this->db->where('password',md5($password));		
		$query=$this->db->get('users');
		
			
		return $query->row();	
	}	
	
	public function check_pass($user_id,$password)
	{
		 
		
		$this->db->select('*');
		$this->db->where('userid',$user_id);		
		$this->db->where('password',md5($password));
		$this->db->where('user_type',2);			
		$query=$this->db->get('users');
		
			
		return $query->row();	
	}
	
	public function update_pass($user_id,$password)
	{
		 
		$this->db->set('password',md5($password));
		$this->db->where('userid',$user_id);		
		$this->db->update('users'); 
		return $this->db->affected_rows();	
		
			
		
	}
	
		
}

?>