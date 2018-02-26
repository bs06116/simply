<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {


	function __construct()
	{
		parent::__construct();	
	
		$this->load->model('user/user_model');	
		$this->load->model('commons/commons_model');	
		$this->load->model('project_model');	
		$this->load->library('commons/commons_lib');	
		if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url().'login');
		}elseif($this->session->userdata('logged_in') && $this->session->userdata('user_type')==2){
				redirect(base_url().$this->config->item('certificate_path').'manage_certificate');
			
			}
		
		
	}
	

		
		public function manage_product()
	{		
		//$data["all_pro"]=$this->commons_model->all_record_with_id('products','user_id',$this->session->userdata('user_id'));
		$data["all_pro"]=$this->commons_model->all_record('products');
		$this->load->view('manage_product',$data);
	}
	public function add_project()
	{	
		$project_code=$this->project_model->get_last_row('project');
		$project_code++;
		$data['project_code'] = sprintf('%05d',$project_code);
		
		$data["all_project_type"]=$this->commons_model->all_record_delete_bit('project_type');
		$data["all_user"]=$this->project_model->get_all_user();
		$this->load->view('add_project',$data);
	}
	
	public function save_product()
	{
		
		$message="";
		$identification = $this->input->post('identification');
		if(empty($identification)){
		 $message.="<p>Identification field is required.</p>";
		 
		}
		$result_identification = $this->commons_lib->check_identification_exist($identification);
		
		if($result_identification>0){
		  $message.="<p>Identification already exist.</p>";	
		}
		 $description = $this->input->post('ck_editor');
		
		if(empty($description)){
			$message.="<p>Description field Required.</p>";
			
		}
		
	/*	$factor = $this->input->post('factor');
	
		if(empty($factor)){
			$message.="<p>Factor field  Required.</p>";
			
		}
		*/
	
		$swl = $this->input->post('swl');
		if(empty($swl) or !is_numeric($swl)){
			$message.="<p>SWL required valid numeric field.</p>";
			
		}
	
	/*	$wll = $this->input->post('wll');
		if(empty($wll) or !is_numeric($wll)){
			$message.="<p>WLL valid field Required.</p>";
			
		}
		$mbl = $this->input->post('mbl');
		if(empty($mbl) or !is_numeric($mbl)){
			$message.="<p>MBL vlaid field Required.</p>";
			
		}*/
		
		$pla = $this->input->post('pla');
	
		if(empty($pla) or !is_numeric($pla)){
			$message.="<p>PLA required valid numeric field.</p>";
			
		}
		
		if(!empty($message)){
			
			$data=array("status"=>0,"message"=>$message);				
				echo json_encode($data);	
				die;
				
		}else{
		$product_data=array(
					"identification"=>$identification,
					"description"=>$description,
					"swl"=>$swl,
					"pla"=>$pla,
					"user_id"=>$this->session->userdata('user_id')
					);	
			$last_product_id=$this->commons_model->insert_record('products',$product_data);
			if($last_product_id){
					$data['single_data']=$this->commons_model->single_record('products','products_id',$last_product_id);
					//$data=array("status"=>1,"data"=>$this->load->view("insert_new_product",$data, true));	
					$p_data=$data['single_data'];	
					$data=array("status"=>1,"message"=>"Your data has been save.","pro_id"=>$p_data->products_id,"identification"=>$p_data->identification,"description"=>$p_data->description,"swl"=>$p_data->swl,"pla"=>$p_data->pla);		
					echo json_encode($data);	
					die;
					
				}else{
					$data=array("status"=>0,"message"=>"something problem");				
					echo json_encode($data);	
					die;
				}
		}
		
		
	}
		public function edit_product($pro_id=0)
			{	
			
				$data['pro_id']=$pro_id;
				$data['pro_data']=$this->commons_model->single_record('products','products_id',$pro_id);
				$data=array("product"=>$data['pro_data']);				
				echo json_encode($data);	
				die;
			}
		public function update_product()
		{
		$pro_id=$this->input->post('pro_id');
		//$row_id=$this->input->post('row_id');
		
		$message="";
		/*$identification = $this->input->post('identification');
		if(empty($identification)){
		 echo $message.="<p>identification field is required.</p>";
		 
		}*/
		 $description = $this->input->post('ck_editor2');
		
		if(empty($description)){
			$message.="<p>description field Required.</p>";
			
		}
		
		$factor = $this->input->post('factor');
	
		
		
	
		$swl = $this->input->post('swl');
		if(empty($swl) or !is_numeric($swl)){
			$message.="<p>SWL required valid numeric field.</p>";
			
		}
	
	
		
		
		$pla = $this->input->post('pla');
		if(empty($pla) or !is_numeric($pla)){
			$message.="<p>PLA required valid numeric field.</p>";
			
		}
		
		if(!empty($message)){
			$data=array("status"=>0,"message"=>$message);				
				echo json_encode($data);	
				die;	
		}else{
				$product_data=array(
					/*"identification"=>$identification,*/
					"description"=>$description,
					
					"swl"=>$swl,
					
					"pla"=>$pla,
					);	
			$id=$this->commons_model->update_record('products','products_id',$pro_id,$product_data);
			if($pro_id){
					$data['single_data']=$this->commons_model->single_record('products','products_id',$pro_id);
					$p_data=$data['single_data'];
					//$data=array("status"=>1,"pro_id"=>$this->load->view("insert_new_product",$data, true));				
					$data=array("status"=>1,"message"=>"Your data has been save.","pro_id"=>$p_data->products_id,"identification"=>$p_data->identification,"description"=>$p_data->description,"swl"=>$p_data->swl,"pla"=>$p_data->pla);				
					echo json_encode($data);	
					die;
				}else{
					echo "<p>Something error.</p>";
					die;
				}
		}
			
		
			
		
		}
		public function delete_product($pro_id=0)
		{
			if($pro_id!=0){
				
				
				$data=array('delete_bit'=>1);
				$this->commons_model->update_record('products','products_id',$pro_id,$data);
				
				$this->session->set_flashdata('msg', $this->config->item('delete_msg'));
			}else{
				$this->session->set_flashdata('msg', $this->config->item('error_msg'));
			}
			@redirect(base_url().$this->config->item('product_path').'manage_product');
		}		
		
		
	function check_user_type(){
	 if($this->session->userdata('user_type')!=$this->config->item('admin_type_id'))
			 {
				@redirect(base_url().$this->config->item('dashboard_path').'dashboard');
			}	
	}
	
		
}
