<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	function __construct()
	{
		parent::__construct();	
	
		$this->load->model('user/user_model');	
		$this->load->model('commons/commons_model');	
		$this->load->library('commons/commons_lib');	
		if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url().'login');
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
	public function manage_user()
		{		
			//$data["all_user"]=$this->commons_model->all_record_with_id('cust','user_id',$this->session->userdata('user_id'));
			$data["all_user"]=$this->commons_model->all_record('cust');
			
			$this->load->view('manage_user',$data);
		}
	
	public function add_user()
		{	
			$this->load->view('add_user');
		}	

	public function save_user()
	{   $message="";
		$account=$this->input->post('account');
		$person=$this->input->post('person');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$website=$this->input->post('website');
		
		
			
		$name=$this->input->post('name');
		$phone_2=$this->input->post('phone_2');
		$email_2=$this->input->post('email_2');
		$designation=$this->input->post('designation');
		
		$address_one=$this->input->post('address_one');
		$address_two=$this->input->post('address_two');
		$country=$this->input->post('country');
		$city=$this->input->post('city');
		$postal_code=$this->input->post('postal_code');
		$country=$this->input->post('country');
		
		
		
		
		if(empty($account)){
			  $message.="<p>Fileds are empty.</p>";	
			}
		if(!empty($account)){	
		$result_account = $this->commons_lib->check_customer_account($account);
		if($result_account>0){
			  $message.="<div class='alert custom-error alert-danger'>Account Number already exist.</div>";	
			}
		}
		if(!empty($message)){
			$data=array("status"=>0,"message"=>$message);				
			echo json_encode($data);	
			die;
		}
		
			$user_data=array(
			"account"=>$account,
			"person"=>$person,
			"phone"=>$phone,
			"email"=>$email,
			"website"=>$website,
			"user_id"=>$this->session->userdata('user_id'));
			
			$last_id=$this->commons_model->insert_record('cust',$user_data);
			$data_personal=array();
			$data_address=array();
			if($last_id){
				 for($i=0;$i<count($name); $i++){
				  	if($name[$i]!=''){	 
				  		 $data_personal[]=array('name'=>$name[$i],'phone'=>$phone_2[$i],'email'=>$email_2[$i],'designation'=>$designation[$i],'cust_id'=>$last_id);
				  	}
				  }
			 	$this->db->insert_batch('cust_info', $data_personal);
				 for($j=0;$j<count($address_one); $j++){
				  	if($address_one[$j]!=''){	 
				 $data_address[]=array('street_one'=>$address_one[$j],'street_two'=>$address_two[$j],'city'=>$city[$j],'postal_code'=>$postal_code[$j],
				 'country'=>$country[$j],'cust_id'=>$last_id);
				  	}
				  }
			 	$this->db->insert_batch('cust_address', $data_address);
			}
			if($last_id){
				$data=array("status"=>1,"message"=>"<div class='alert custom-error alert-success'>Your data has been submitted.</div>");				
				echo json_encode($data);	
				die;
				
			}else{
				$data=array("status"=>0,"message"=>"<div class='alert custom-error alert-danger'>some error.</div>");				
				echo json_encode($data);	
				die;
			}
	}


//------------------------------------------------- Update ----------------------------------------------------------------------------
	public function edit_user($user_id=0)
		{	
			
			$data['cust_id']=$user_id;
			$data['user_data']=$this->commons_model->single_record('cust','cust_id',$user_id);
			$data['user_info']=$this->commons_model->all_record_with_id('cust_info','cust_id',$user_id);
			$data['user_address']=$this->commons_model->all_record_with_id('cust_address','cust_id',$user_id);
			
			$this->load->view('edit_user',$data);
		}
	public function update_user()
	{
	 $cust_id=$this->input->post('cust_id');
		
		$message="";
		//$account=$this->input->post('account');
		$person=$this->input->post('person');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$website=$this->input->post('website');
		
		
			
		$name=$this->input->post('name');
		$phone_2=$this->input->post('phone_2');
		$email_2=$this->input->post('email_2');
		$designation=$this->input->post('designation');
		
		$address_one=$this->input->post('address_one');
		$address_two=$this->input->post('address_two');
		$country=$this->input->post('country');
		$city=$this->input->post('city');
		$postal_code=$this->input->post('postal_code');
		$country=$this->input->post('country');
		
		
		
		
		if(empty($person)){
			  $message.="<div class='alert custom-error alert-danger'>Fileds are empty.</div>";	
			}
	
		if(!empty($message)){
			$data=array("status"=>0,"message"=>$message);				
			echo json_encode($data);	
			die;
		}
		
			$user_data=array(
			"person"=>$person,
			"phone"=>$phone,
			"email"=>$email,
			"website"=>$website);
		
		
			$last_id=$this->commons_model->update_record('cust','cust_id',$cust_id,$user_data);	
			$result_info=$this->commons_model->delete_record_from_db('cust_info','cust_id',$cust_id);
			$result_address=$this->commons_model->delete_record_from_db('cust_address','cust_id',$cust_id);
			$data_personal=array();
			$data_address=array();
			if($cust_id){
				 for($i=0;$i<count($name); $i++){
				  	if($name[$i]!=''){	 
				  		 $data_personal[]=array('name'=>$name[$i],'phone'=>$phone_2[$i],'email'=>$email_2[$i],'designation'=>$designation[$i],'cust_id'=>$cust_id);
				  	}
				  }
			 	$this->db->insert_batch('cust_info', $data_personal);
				 for($j=0;$j<count($address_one); $j++){
				  	if($address_one[$j]!=''){	 
				 $data_address[]=array('street_one'=>$address_one[$j],'street_two'=>$address_two[$j],'city'=>$city[$j],'postal_code'=>$postal_code[$j],
				 'country'=>$country[$j],'cust_id'=>$cust_id);
				  	}
				  }
			 	$this->db->insert_batch('cust_address', $data_address);
			}
			if($cust_id){
				$data=array("status"=>1,"message"=>"<div class='alert custom-error alert-success'>Your data has been Updated</div>");				
				echo json_encode($data);	
				die;	
			}else{
			 	$data=array("status"=>0,"message"=>"<div class='alert custom-error alert-danger'>some error</div>");				
				echo json_encode($data);	
				die;
			}
		
		
			
		
				
					
		
	}
	public function delete_user($user_id=0)
		{	
			$data=array('delete_bit'=>1);
			$this->commons_model->update_record('cust','cust_id',$user_id,$data);
			$this->session->set_flashdata('msg', $this->config->item('delete_msg'));
			@redirect(base_url().$this->config->item('user_path').'manage_user');
		}
		

		
	
	
		
}
