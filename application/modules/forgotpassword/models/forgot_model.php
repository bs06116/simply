<?php 
class Forgot_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function get_login($username,$password)
	{
		$hash_pass="password('".$password."')";	
		$this->db->select('id');
		$this->db->select('username');
		$this->db->select('type');
		$this->db->where('username',$username);		
		$this->db->where('password',$hash_pass, FALSE);	
		$this->db->where('status',1);		
		$query=$this->db->get('admin');		
		return $query->row();	
	}	
	
	
/********************************************s*******************************************/	

	public function forgot_password($email,$newpassword)
	{	
		echo $newpassword;//exit;
		
		$this->db->where("email",$email);
	    $query=$this->db->get("users");
		 if($query->num_rows()>0)
	     {
	       $hash_pass= md5($newpassword);//"password('".$newpassword."')";	
		   $this->db->where('email',$email);
		   $this->db->set('password',$hash_pass);
		   $this->db->update('users');
	     }
	     else{
	       	$this->session->set_flashdata('error', 'Email not Found');
			@redirect(base_url()."forgotpassword");

	     }
	
		
		
		
	}


}

?>