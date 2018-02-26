<?php 
class commons_lib {
	function __construct()
	{		
		$this->ci =& get_instance();
		$this->ci->load->model('commons/commons_model');
		
	}
		public function check_email_exist($email)
	{
		$result = $this->ci->commons_model->check_email_exist($email);
		return $result;
	}
		public function check_username_exist($user_name)
	{
		$result = $this->ci->commons_model->check_username_exist($user_name);
		return $result;
	}
	public function check_update_email_exist($email,$user_id){
		
		$result = $this->ci->commons_model->check_update_email_exist($email,$user_id);
		
		return $result;
	}
	
		public function check_identification_exist($identification)
	{
		$result = $this->ci->commons_model->check_identification_exist($identification);
		return $result;
	}
	public function check_customer_account($account)
	{
		$result = $this->ci->commons_model->check_customer_account($account);
		return $result;
	}
	
	public function check_old_password($old_password){
		$result = $this->ci->commons_model->checkk_old_password($old_password);
		return $result;
	}
}

