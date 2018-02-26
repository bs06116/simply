<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {


	function __construct()
	{
		parent::__construct();	
	
		$this->load->model('task/task_model');
		$this->load->model('dashboard/dashboard_model');	
		$this->load->model('commons/commons_model');	
		$this->load->library('commons/commons_lib');	
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
	public function manage_task()
		{		
			$data["all_task"]=$this->commons_model->all_record('task');
			$data["all_project"]=$this->commons_model->all_active_record('project');
			$data["all_task_project"]=$this->task_model->all_task_project();
				$data["all_user"]=$this->task_model->all_user();
			
			$this->load->view('manage_task',$data);
		}
	
	public function add_task()
		{	//$data["all_user_type"]=$this->commons_model->all_record_delete_bit('user_type');
			//$data["all_desg"]=$this->commons_model->all_record_delete_bit('designation');
			$this->load->view('add_project');
		}	

	public function save_task()
	{
		$message="";
		
		$name = $this->input->post('name');
		if(empty($name)){
		 $message.="<p>Task field is required.</p>";
		 
		}
		$project = $this->input->post('project_id');
		
		if($project==0){
			$message.="<p>Project field Required.</p>";
			
		}
		$user = $this->input->post('user');
		
		if(empty($user)){
			$message.="<p>User field Required.</p>";
			
		}
		$date = $this->input->post('date');
		
		if(empty($date)){
			$message.="<p>Date field Required.</p>";
			
		}
		 $description = $this->input->post('description');
		
		if(empty($description)){
			$message.="<p>Description field Required.</p>";
			
		}
		$priority = $this->input->post('priority');
		
		if(empty($priority)){
			$message.="<p>Priority field Required.</p>";
			
		}
		$status = $this->input->post('status');
		
		if($status==0){
			$message.="<p>Status field Required.</p>";
			
		}
		
		if(!empty($message)){
			
			$data=array("status"=>0,"message"=>$message);				
				echo json_encode($data);	
				die;
				
		}else{
			
			$task_data=array(
					"name"=>$name,
					"project_id"=>$project,
					"deadline"=>$date,
					"task_piority"=>$priority,
					"description"=>$description,
					"task_status"=>$status
					);
				
					
			
			$last_id=$this->commons_model->insert_record('task',$task_data);
			$data_attachemnt=array();
			$fileCount = count($_FILES["file_img"]['name']);
			 if(!empty($_FILES["file_img"]['name'][0])){
				 if($fileCount>0){
					 for($i=0; $i < $fileCount; $i++)
					 {
							
								$final_name=time().$_FILES['file_img']['name'][$i];
								$final_name_remove_special_char = preg_replace('/[^a-zA-Z0-9_.]/', '', $final_name);
								$sourcePath = $_FILES['file_img']['tmp_name'][$i];       // Storing source path of the file in a variable
								$targetPath = "./uploads/".$final_name_remove_special_char; // Target path where file is to be stored
								move_uploaded_file($sourcePath,$targetPath);
								$data_attachemnt[]=array("attachement"=>$final_name_remove_special_char,"task_id"=>$last_id); 
					 }
					 
					 $this->db->insert_batch('attachement_task', $data_attachemnt);
				 }
			 }
			$data_user=array();
				if($last_id){
					 for($j=0;$j<count($user); $j++){
				  		if($user[$j]!=''){	 
						 $data_user[]=array('user_id'=>$user[$j],'task_id'=>$last_id);
				  		}
				  }
			 	$this->db->insert_batch('user_task', $data_user);
				
					
					$data=array("status"=>1,"message"=>"Your data has been save.");		
					echo json_encode($data);	
					die;
					
				}else{
					$data=array("status"=>0,"message"=>"something problem");				
					echo json_encode($data);	
					die;
				}
			
/*			if($last_id){
					$data['single_data']=$this->commons_model->single_record('project','project_id',$last_id);
					//$data=array("status"=>1,"data"=>$this->load->view("insert_new_product",$data, true));	
					$p_data=$data['single_data'];	
					$data=array("status"=>1,"message"=>"Your data has been save.","project_id"=>$p_data->project_id,"name"=>$p_data->name,"description"=>$p_data->description,);		
					echo json_encode($data);	
					die;
					
				}else{
					$data=array("status"=>0,"message"=>"something problem");				
					echo json_encode($data);	
					die;
				}
				
*/				
					
		}
	}


		public function get_single_task($task_id){
			
			//echo $task_id;exit;
		$data['get_sinlge_task']=$this->task_model->get_sinlge_task($task_id);
		echo 	$this->load->view('ajax_get_task_data',$data);
			
		}
		
		public function update_task_status($task_id,$status){
			
			
		$update_task_status=$this->task_model->update_task_status($task_id,$status);
		
				if($update_task_status>0){
					$data=array("status"=>1,"message"=>"Status updated successfully.");		
					echo json_encode($data);	
					die;
				}else{
					$data=array("status"=>0,"message"=>"Your Status not Update");		
					echo json_encode($data);	
					die;
				}
		}
		
		
		public function update_task_pirority($task_id,$pri){
			
			
		$update_task_status=$this->task_model->update_task_pirority($task_id,$pri);
		
				if($update_task_status>0){
					$data=array("status"=>1,"message"=>"Status updated successfully.");		
					echo json_encode($data);	
					die;
				}else{
					$data=array("status"=>0,"message"=>"Your Status not Update");		
					echo json_encode($data);	
					die;
				}
		}
		
		
		
		

//------------------------------------------------- Update ----------------------------------------------------------------------------
public function edit_task($task_id=0)
			{	
			
				$data['task_id']=$task_id;
				$data['task_data']=$this->commons_model->single_record('task','task_id',$task_id);
				$data['user_task']=$this->task_model->get_user_task_assing($task_id);
				$data=array("task"=>$data['task_data'],"user_task"=>$data['user_task']);				
				echo json_encode($data);	
				die;
			}

	public function update_task()
	{
		$message="";
	 	$task_id = $this->input->post('task_id');
	
		$name = $this->input->post('name');
		if(empty($name)){
		 $message.="<p>Task field is required.</p>";
		 
		}
		$project = $this->input->post('project_id');
		
		if(empty($project)){
			$message.="<p>Project field Required.</p>";
			
		}
		$user = $this->input->post('user');
		if(empty($user) or $user[0]==''){
			$message.="<p>User field Required.</p>";
			
		}
		$date = $this->input->post('date');
		
		if(empty($date)){
			$message.="<p>Date field Required.</p>";
			
		}
		 $description = $this->input->post('description');
		
		if(empty($description)){
			$message.="<p>Description field Required.</p>";
			
		}
		 $priority = $this->input->post('priority');
		if(empty($priority)){
			$message.="<p>Priority field Required.</p>";
			
		}
		$status = $this->input->post('status');
		
		if($status==0){
			$message.="<p>Status field Required.</p>";
			
		}
		
		if(!empty($message)){
			
			$data=array("status"=>0,"message"=>$message);				
				echo json_encode($data);	
				die;
				
		}else{
				$task_data=array(
					"name"=>$name,
					"project_id"=>$project,
					"deadline"=>$date,
					"description"=>$description,
					"task_piority"=>$priority,
					"task_status"=>$status);
				
				
			 $id=$this->commons_model->update_record('task','task_id',$task_id,$task_data);
			$data_attachemnt=array();
			$fileCount = count($_FILES["file_img"]['name']);
			if(!empty($_FILES["file_img"]['name'][0])){
			 if($fileCount>0){
				  $result_info=$this->commons_model->delete_record_from_db('attachement_task','task_id',$task_id);
					 for($i=0; $i < $fileCount; $i++)
					 {
							
								$final_name=time().$_FILES['file_img']['name'][$i];
								$final_name_remove_special_char = preg_replace('/[^a-zA-Z0-9_.]/', '', $final_name);
								//echo $string;exit;
								$sourcePath = $_FILES['file_img']['tmp_name'][$i];       // Storing source path of the file in a variable
								$targetPath = "./uploads/".$final_name_remove_special_char; // Target path where file is to be stored
								move_uploaded_file($sourcePath,$targetPath);
								$data_attachemnt[]=array("attachement"=>$final_name_remove_special_char,"task_id"=>$task_id); 
					 }
					 
					 $this->db->insert_batch('attachement_task', $data_attachemnt);
				 }
			}
			 if($task_id){
				 $result_info=$this->commons_model->delete_record_from_db('user_task','task_id',$task_id);
				 $data_user=array();
				 for($j=0;$j<count($user); $j++){
				  		if($user[$j]!=''){	 
						 $data_user[]=array('user_id'=>$user[$j],'task_id'=>$task_id);
				  		}
				  }
				  
			 	$this->db->insert_batch('user_task', $data_user);
					
						
					$data=array("status"=>1,"message"=>"Your data has been update.");		
					echo json_encode($data);	
					die;
			 }
			
		}
//			
//			if($project_id){
//					$data['single_data']=$this->commons_model->single_record('project','project_id',$project_id);
//					//$data=array("status"=>1,"data"=>$this->load->view("insert_new_product",$data, true));	
//					$p_data=$data['single_data'];	
//					$data=array("project_id"=>$p_data->project_id,"name"=>$p_data->name,"description"=>$p_data->description,);		
//					echo json_encode($data);	
//					die;
//					
//				}else{
//					$data=array("status"=>0,"message"=>"something problem");				
//					echo json_encode($data);	
//					die;
//				}
			
	}

	public function delete_task($task_id=0)
		{	
			$data=array('delete_bit'=>1);
			$this->commons_model->update_record('task','task_id',$task_id,$data);
			$this->session->set_flashdata('msg', $this->config->item('delete_msg'));
			@redirect(base_url().$this->config->item('task_path').'manage_task');
		}
		
		
	public function hold_task()
		{
			$data['hold_task']=$this->task_model->hold_task();	
			$this->load->view('hold_task',$data);
		}
	
		public function in_prog_task()
		{
			$data['in_prog_task']=$this->task_model->in_prog_task();	
			$this->load->view('in_prog_task',$data);
		}
		
		public function com_task()
		{
			$data['com_task']=$this->task_model->com_task();	
			$this->load->view('com_task',$data);
		}
		
		
		public function my_task()
		{
			$data['my_task']=$this->task_model->my_task();	
			$this->load->view('my_task',$data);
		}	
		
		
	
	
		
}
