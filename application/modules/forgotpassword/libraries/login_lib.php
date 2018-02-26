<?php 
class Login_lib {
	
	public function validate_login($user,$password)
	{	
		session_start();
		$this->ci =& get_instance();
		$this->ci->load->model('admin/admin_model');
		$result=$this->ci->admin_model->get_login($user,$password);

		if(count($result)>0)		
			{	
				$array=array(
				'user_id'=>$result->id,
				'username'=>$result->username,
				'type'=>$result->type,
				'logged_in'=>true
			);
			$this->ci->session->set_userdata($array);
			return true;
			}
			else
			{			
				return false;			
			}
		
			
	}
	
	
	public function user_right_for_page($group_id,$right_id)
	{
		if($group_id<=0)
		{
			return false;
		}
		else
		{
			$this->ci =& get_instance();
			$this->ci->load->model('admin/admin_model');
			if($this->ci->admin_model->user_rights_for_page($group_id,$right_id))			
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	
	
	public function icons($group_id)
	{
		$this->ci =& get_instance();
		$this->ci->load->model('admin/admin_model');
		$all_icons=$this->ci->admin_model->get_icons($group_id);
		return $all_icons;
	}
	
	
	
	
	/*
	public function set_admin($user, $password)
	{
		$this->ci =& get_instance();
		$this->ci->load->model('admin/admin_model');
		
		if($this->ci->admin_model->make_admin($user,$password))
		{
			return true;
		}
		else
		{
			return false;
		}
		
	
	}
	
	
	*/
	

	
}

