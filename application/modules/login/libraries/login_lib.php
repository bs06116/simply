<?php 
class login_lib {

	public function validate_login($user,$password)
	{	
	
	//echo $user;
	//echo $password;exit;
	
		$this->ci =& get_instance();
		$this->ci->load->model('login/login_model');
		$result=$this->ci->login_model->get_login($user,$password);
		//print_r($result);exit;

		if(count($result)>0)		
			{	
				$array=array(
				'user_id'=>$result->userid,
				'username'=>$result->username,
				'user_type'=>$result->user_type,
				'pass'=>$result->password,
				'logged_in'=>'1'
				//'logged_in'=>true
			);
			$this->ci->session->set_userdata($array);
			return true;
			}
			else
			{			
				return false;			
			}
		
	}
	
}

