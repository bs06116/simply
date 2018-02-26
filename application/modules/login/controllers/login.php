<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->library('login/login_lib');
		$this->load->model('login/login_model');
		if($this->session->userdata('logged_in') > '1' && $this->session->userdata('user_type')==1)
		{
			
			redirect(base_url().'dashboard/');
		}elseif($this->session->userdata('logged_in') > '1' && $this->session->userdata('user_type')==2 && $this->session->userdata('pass')== 'e10adc3949ba59abbe56e057f20f883e')
		{
			redirect(base_url().'forgotpassword/change_pass');
			
			
		}elseif($this->session->userdata('logged_in') > '1' && $this->session->userdata('user_type')==2){
			
			redirect(base_url().$this->config->item('certificate_path').'manage_certificate');
			}
		
	}
	public function index()
	{
		$this->load->view('login');
	}
	
	public function change_pass()
	{
		$this->load->view('change_pass');
	}
	public function check_username($user_name){
		//echo $user_name."<br><br><br>";
		$validate = preg_match('/[A-Z]/', $user_name);//exit;
		//echo "check_username";exit;
		
		if($validate){
			 $this->form_validation->set_message('check_username', 'User Name must have Lowercase.');
			return FALSE;
		}else
		{
			return TRUE;
		}	
	}
	
	
	
	public function login_verify()
	
	{
			
			
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		
		//echo $username."<br><br><br>";
		//echo $password;exit;
		
//callback_check_username['.$username.']
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[3]|max_length[13]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[13]');
		if ($this->form_validation->run() == FALSE)
		{	//echo "asdsad";exit;
		
			$this->load->view('login');
		}else{
			if($this->login_lib->validate_login($username, $password) )
			{ 
			
			if($this->session->userdata('user_type')==1){
						
					redirect(base_url().'dashboard');
				
				}else{
					$password_check='123456';
					$check_pass=$this->login_model->check_pass($this->session->userdata('user_id'),$password_check );
					//print_r($check_pass);
					if(!empty($check_pass)){
						
						redirect(base_url().$this->config->item('login_path').'change_pass');
						}else{
					redirect(base_url().$this->config->item('certificate_path').'manage_certificate');
					}
					
					
					}
			
				
				
			}
			else
			{
				//echo "else";exit;
				$this->session->set_flashdata('username',$username);
				$this->session->set_flashdata('login_error','Incorrect Username or Password');
				redirect(base_url(). $this->config->item('login_path'));
			}
		}

	}
	
	
	public function update_pass(){
		$user_id=$this->session->userdata('user_id');
		$password=$this->input->post('password');
		$update_pass=$this->login_model->update_pass($user_id,$password );
		if($update_pass){
			redirect(base_url().$this->config->item('certificate_path').'manage_certificate');
			
			}else{
				
				$this->session->set_flashdata('login_error','password not set');
				redirect(base_url(). $this->config->item('login_path').'change_pass');
				
				}
		
		
		
	}
}
