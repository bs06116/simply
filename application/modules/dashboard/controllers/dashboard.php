<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('commons/commons_model');		
		$this->load->model('dashboard/dashboard_model');
		$this->load->model('task/task_model');	
		$this->load->library('commons/commons_lib');
        $this->load->model('document/document_model');
		if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url().'login');
		}elseif($this->session->userdata('logged_in') && $this->session->userdata('user_type')==2){
				redirect(base_url().$this->config->item('certificate_path').'manage_certificate');
			
			}		
	}
	public function index()
	{	
		$data["all_pro"]=$this->commons_model->all_record_delete_bit('products');
		$data["all_cust"]=$this->commons_model->all_record('cust');
		$data["all_cer"]=$this->commons_model->all_record('certificate');
		$data["all_newfeed"]=$this->dashboard_model->get_newfeed();
		$data["all_task"]=$this->dashboard_model->get_task();
		$data["all_user_task"]=$this->dashboard_model->get_user_task();
		$data["all_project"]=$this->commons_model->all_active_record('project');
		$data["all_user"]=$this->task_model->all_user();
        $data["all_document"]=$this->document_model->get_all_document();
        $data["all_doctype"]=$this->commons_model->all_record_delete_bit('doctype');

		$this->load->view('dashboard',$data);
	}
	public function change_password()
	{	
		$this->load->view('change_password');
	}
	
	public function check_old_password_varification()
	{	
		 $old_password=$this->input->post('old_password');

		$result_old_password = $this->commons_lib->check_old_password($old_password);
		if ($result_old_password == 0)
		{
			$this->form_validation->set_message('check_old_password_varification', 'your old password does not recognized.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}		
	}

	public function submit_change_password()
	
	{
	
		$old_password=$this->input->post('old_password');	
		$new_password=$this->input->post('new_password');
		$c_password=$this->input->post('c_password');
		$this->form_validation->set_rules('old_password', 'Old Password', 'required|xss_clean|callback_check_old_password_varification');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[3]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('c_password', 'Confirm Passoword', 'required|matches[new_password]|min_length[3]|max_length[12]|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('change_password');
		}else
		{ 
			$data=array("password"=>md5($c_password));
			$updated_status = $this->commons_model->update_record('users','userid',$this->session->userdata("user_id"), $data);
	
			if($updated_status > 0)
			{
				$this->session->set_flashdata('message',"Your Password has been updated successfully.");
				redirect(base_url().$this->config->item('dashboard_path').'change_password');
			}
			else
			{
				$this->session->set_flashdata('message',"some problem.");
				redirect(base_url().$this->config->item('dashboard_path').'change_password');
			}
		}
	}
 
}
