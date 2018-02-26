<?php 
class commons_model extends CI_Model
{
	
	
	public function check_email_exist($email)
	{
		
		$this->db->where('email',$email);
		
		$this->db->where('delete_bit', 0);
		$this->db->from('users');	
		
		
		return $this->db->count_all_results();
		
	}
	
	
		public function check_username_exist($user_name)
	{
		
		$this->db->where('username',$user_name);
		
		$this->db->where('delete_bit', 0);
		$this->db->from('users');	
		return $this->db->count_all_results();
	}
	
	
	
	
		public function check_update_email_exist($email,$user_id)
	{
		
		$this->db->where('email',$email);
		$this->db->where('delete_bit', 0);
		$this->db->where('userid !=',$user_id);
		$this->db->from('users');	
		
		return $this->db->count_all_results();
		
		
	}
	
		public function insert_record($table,$data)
	{
		$this->db->insert($table,$data);
		//echo $this->db->last_query();
		//die;
		return $this->db->insert_id();		
	}
	public function all_records($table)
	{
		$this->db->select('*');
		$this->db->where('delete_bit', 0);
		$this->db->where('active_bit', 1);
		
		$this->db->order_by("certificate_id", "desc");
		$query = $this->db->get($table);	
		return $query->result_array();		
	}
	
		public function all_active_record($table)
	{
		$this->db->select('*');
		$this->db->where('delete_bit', 0);
		$this->db->where('active_bit', 1);
		
		
		
		$query = $this->db->get($table);	
		return $query->result_array();		
	}
	
		public function all_record($table)
	{
		$this->db->select('*');
		$this->db->where('delete_bit', 0);
		
		
		
		$query = $this->db->get($table);	
		return $query->result_array();		
	}
	
	
	public function all_record_delete_bit($table)
	{
		$this->db->select('*');
		$this->db->where('delete_bit', 0);
	
		$query = $this->db->get($table);	
		return $query->result_array();		
	}
	public function delete_record($table,$data,$colum,$id)
	{
		$this->db->where($colum, $id);
		$this->db->update($table,$data); 
		return $this->db->affected_rows();		
	}
	public function single_record($table,$colum,$id)
	{
		$this->db->where($colum, $id);
		$query = $this->db->get($table);	
	//	echo $this->db->last_query();
	//	die;
		return $query->row();		
	}
	
	public function all_record_with_id($table,$colum,$id)
	{
		$this->db->where($colum, $id);
		$this->db->where('delete_bit', 0);
		$query = $this->db->get($table);	
		return $query->result_array();		
	}
	public function update_record($table,$colum,$id,$data)
	{
		$this->db->where($colum, $id);
		$this->db->update($table,$data); 
		//echo $this->db->affected_rows();
		//exit;
		
		return $this->db->affected_rows();		
	}
	
	public function delete_record_from_db($table,$colum,$id)
	{
		$this->db->where($colum, $id);
		$this->db->delete($table); 
		return $this->db->affected_rows();		
	}
	public function all_record_with_id_without_del($table,$colum,$id)
	{
		$this->db->where($colum, $id);
	
		$query = $this->db->get($table);	
		return $query->result_array();		
	}
		public function check_identification_exist($identification)
	{
		
		$this->db->where('identification',$identification);
		
		$this->db->where('delete_bit', 0);
		$this->db->from('products');	
		return $this->db->count_all_results();
	}
		public function check_customer_account($account)
	{
		
		$this->db->where('account',$account);
		
		$this->db->where('delete_bit', 0);
		$this->db->from('cust');	
		return $this->db->count_all_results();
	}
	public function checkk_old_password($old_password)
	{
		$this->db->where('password',md5($old_password));
		$this->db->where('userid',$this->session->userdata('user_id'));
		$this->db->from('users');
		return $this->db->count_all_results();
	}
	
}

?>