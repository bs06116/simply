<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {


	function __construct()
	{
		parent::__construct();	
	
		$this->load->model('member/member_model');	
		$this->load->model('commons/commons_model');	
		$this->load->library('commons/commons_lib');	
		/*if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url().'login');
		}*/
		
		if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url().'login');
		}elseif($this->session->userdata('logged_in') && $this->session->userdata('user_type')==2){
				redirect(base_url().$this->config->item('certificate_path').'manage_certificate');
			
			}
			
		/*if($this->session->userdata('user_type')!=$this->config->item('admin_type_id'))
			 {
				@redirect(base_url().$this->config->item('dashboard_path').'dashboard');
			}*/
	}
	
	public function email_exists($email)
	{
		$email = $this->commons_lib->check_email_exist($email);
		if ($email > 0)
		{
			$this->form_validation->set_message('email_exists', 'Email Already Exists.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function user_exist($user_name){
		
		
		$user_name = $this->commons_lib->check_username_exist($user_name);
		if ($user_name > 0)
		{
			$this->form_validation->set_message('user_exist', 'User Name Already Exists.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}
	
		public function update_email_exists($email)
	{
		$user_id=$this->input->post('user_id');
		$email = $this->commons_lib->check_update_email_exist($email,$user_id);
		if ($email > 0)
		{
			$this->form_validation->set_message('update_email_exists', 'Email Already Exists.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	public function manage_member()
		{		
			$data["all_user"]=$this->commons_model->all_record('users');
			
			$this->load->view('manage_member',$data);
		}
	
	public function add_member()
		{	//$data["all_user_type"]=$this->commons_model->all_record_delete_bit('user_type');
			//$data["all_desg"]=$this->commons_model->all_record_delete_bit('designation');
			$this->load->view('add_member');
		}	

public function save_member()
{
	$fullname=$this->input->post('fullname');
	$user_name=$this->input->post('user_name');
	$password=$this->input->post('password');
	$email=$this->input->post('email');
	$designation=$this->input->post('designation');
	
	
	
	$this->form_validation->set_rules('fullname', 'Name', 'trim|required|min_length[3]');
	$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[3]|callback_user_exist['.$user_name.']');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[13]');
	$this->form_validation->set_rules('email', 'Email', 'trim|required|Email|callback_email_exists['.$email.']');
	$this->form_validation->set_rules('designation', 'Designation', 'trim|required');
	
	
	
	if ($this->form_validation->run() == FALSE)
	{	
		$this->load->view('add_member');
	}
	else
	{
		
		$user_data=array(
		"fullname"=>$fullname,
		"username"=>$user_name,
		"email"=>$email,
		"password"=>md5($password),
		"designation"=>$designation,
		);
		
		$last_id=$this->commons_model->insert_record('users',$user_data);
		if($last_id){
			$this->session->set_flashdata('msg', $this->config->item('save_msg'));
		}else{
			$this->session->set_flashdata('msg', $this->config->item('error_msg'));
		}
		@redirect(base_url().$this->config->item('member_path').'manage_member');
			
			
				
	}
}


//------------------------------------------------- Update ----------------------------------------------------------------------------
	public function edit_member($user_id=0)
		{	
			$data['original_form_values']=1;
			$data['user_id']=$user_id;
			$data['user_data']=$this->commons_model->single_record('users','userid',$user_id);
			$this->load->view('edit_member',$data);
		}
	public function update_member()
	{
		$user_id=$this->input->post('user_id');
		$fullname=$this->input->post('fullname');
		$password=$this->input->post('password');
		$email=$this->input->post('email');
	
		$designation=$this->input->post('designation');
	
		$this->form_validation->set_rules('fullname', 'Name', 'trim|required|min_length[3]');
	//	$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|callback_update_email_exists['.$email.']');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['original_form_values']=1;
			$data['user_id']=$user_id;
			$data['user_data']=$this->commons_model->single_record('users','userid',$user_id);
			@redirect(base_url().$this->config->item('member_path').'edit_member/'.$user_id);
		//	$this->load->view('edit_member',$data);
		}
		else
		{
		
				
				
			if($password!=''){
					$user_data=array(
						"fullname"=>$fullname,
						"email"=>$email,
						"password"=>md5($password),
						"designation"=>$designation,
												
						);
						
					}else{
					$user_data=array(
						"fullname"=>$fullname,
						"email"=>$email,
						"designation"=>$designation,
						
						);
					}				
			}
			
			$id=$this->commons_model->update_record('users','userid',$user_id,$user_data);
			
			if($id){
				$this->session->set_flashdata('msg', $this->config->item('update_msg'));
			}else{
				$this->session->set_flashdata('msg', $this->config->item('update_msg'));
			}
			@redirect(base_url().$this->config->item('member_path').'manage_member');
			
		
				
					
		
	}
	public function delete_user($user_id=0)
		{	
			$data=array('delete_bit'=>1);
			$this->commons_model->update_record('users','userid',$user_id,$data);
			$this->session->set_flashdata('msg', $this->config->item('delete_msg'));
			@redirect(base_url().$this->config->item('member_path').'manage_member');
		}
		

		
	
	
		
}
