<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {


	function __construct()
	{
		parent::__construct();	
	
		$this->load->model('project/project_model');	
		$this->load->model('commons/commons_model');	
		$this->load->library('commons/commons_lib');	
		if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url().'login');
		}elseif($this->session->userdata('logged_in') && $this->session->userdata('user_type')==2){
				redirect(base_url().$this->config->item('certificate_path').'manage_certificate');
			
		}	
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
	public function manage_project()
		{		
			$data["all_project"]=$this->commons_model->all_record('project');
			
			$this->load->view('manage_project',$data);
		}
	
	public function add_project()
		{	//$data["all_user_type"]=$this->commons_model->all_record_delete_bit('user_type');
			//$data["all_desg"]=$this->commons_model->all_record_delete_bit('designation');
			$this->load->view('add_project');
		}	

	public function save_project()
	{
		$message="";
		$name = $this->input->post('name');
		if(empty($name)){
		 $message.="<p>Project Name field is required.</p>";
		 
		}
		
		 $description = $this->input->post('description');
		
		if(empty($description)){
			$message.="<p>Description field Required.</p>";
			
		}
		if(!empty($message)){
			
			$data=array("status"=>0,"message"=>$message);				
				echo json_encode($data);	
				die;
				
		}else{
			$project_data=array(
			"name"=>$name,
			"description"=>$description);
			
			$last_id=$this->commons_model->insert_record('project',$project_data);
			if($last_id){
					$data['single_data']=$this->commons_model->single_record('project','project_id',$last_id);
					//$data=array("status"=>1,"data"=>$this->load->view("insert_new_product",$data, true));	
					$p_data=$data['single_data'];	
					$data=array("status"=>1,"message"=>"Your data has been save.","project_id"=>$p_data->project_id,"name"=>$p_data->name,
					"task"=>0,"description"=>$p_data->description,);		
					echo json_encode($data);	
					die;
					
				}else{
					$data=array("status"=>0,"message"=>"something problem");				
					echo json_encode($data);	
					die;
				}
				
				
					
		}
	}


//------------------------------------------------- Update ----------------------------------------------------------------------------
public function edit_project($project_id=0)
			{	
			
				$data['project_id']=$project_id;
				$data['pro_data']=$this->commons_model->single_record('project','project_id',$project_id);
				$data=array("project"=>$data['pro_data']);				
				echo json_encode($data);	
				die;
			}
			public function edit_project_status($status,$id)
			{	
			
				//echo $status."--------------------------------".$id;exit;
				$data['pro_data']=$this->project_model->edit_project_status($status,$id);
				
			}
			
/*	public function edit_project($project_id=0)
		{	
			$data['original_form_values']=1;
			$data['project_id']=$project_id;
			$data['project_data']=$this->commons_model->single_record('project','project_id',$project_id);
			$this->load->view('edit_project',$data);
		}*/
	public function update_project()
	{
		$project_id=$this->input->post('project_id');
		$name=$this->input->post('name');
		$description=$this->input->post('description');
		
		
		
		$message="";
		$name = $this->input->post('name');
		if(empty($name)){
		 $message.="<p>Project Name field is required.</p>";
		 
		}
		
		 $description = $this->input->post('description');
		
		if(empty($description)){
			$message.="<p>Description field Required.</p>";
			
		}
		if(!empty($message)){
			
			$data=array("status"=>0,"message"=>$message);				
				echo json_encode($data);	
				die;
				
		}else{
		
				
				
	$project_data=array(
			"name"=>$name,
			"description"=>$description);
				
			}
			
			$id=$this->commons_model->update_record('project','project_id',$project_id,$project_data);
			
			if($project_id){
					$data['single_data']=$this->commons_model->single_record('project','project_id',$project_id);
					//$data=array("status"=>1,"data"=>$this->load->view("insert_new_product",$data, true));	
					$p_data=$data['single_data'];	
					//$data=array(//"project_id"=>$p_data->project_id,"name"=>$p_data->name,"description"=>$p_data->description,);
					$data=array("status"=>1,"message"=>"Record Updated Successfully");				
					echo json_encode($data);	
					die;
					
				}else{
					$data=array("status"=>0,"message"=>"something problem");				
					echo json_encode($data);	
					die;
				}
			
	}

	public function delete_project($project_id=0)
		{	
			$data=array('delete_bit'=>1);
			$this->commons_model->update_record('project','project_id',$project_id,$data);
			$this->commons_model->update_record('task','project_id',$project_id,$data);
			$this->session->set_flashdata('msg', $this->config->item('delete_msg'));
			@redirect(base_url().$this->config->item('project_path').'manage_project');
		}
		

		
	
	
		
}
