<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class User extends CI_Controller {





	function __construct()

	{

		parent::__construct();	

	

		$this->load->model('user/user_model');	

		$this->load->model('commons/commons_model');	

		$this->load->model('user/user_model');
		$this->load->model('certificate/certificate_model');	

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
	
	
	public function insert_cus_into_user(){
		
		
	
		$get_customer_details= $this->user_model->get_customer_details();
		foreach($get_customer_details as $customer_details){
			$user_id=$customer_details['cust_id'];
			$user_name=$customer_details['account'];
			$user_full=$customer_details['person'];
			$user_email=$customer_details['email'];
			$type=2;
			$desination="Customer";
			$password=md5('123456');
			
			$insert_users= $this->user_model->insert_users($user_id,$user_name,$user_full,$user_email,$type,$desination,$password);
			}
			
		
		
		
	 }

	
	
	public function get_single_certifate($cust_id){
		
		
		//$this->load->model('user/user_model');
			$data['all_cer'] = $this->user_model->get_sigle_certifate($cust_id);
			
			$this->load->view('ajax_certificate',$data);
			//print_r($get_sigle_certifate);exit;
		
	//	echo $cust_id;exit;
		
		
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

	{  

	

	

		 $message="";

		$account=$this->input->post('account');

		$person=$this->input->post('person');

		$phone=$this->input->post('phone');

		$email=$this->input->post('email');

		$website=$this->input->post('website');

		

		

			

		$name=$this->input->post('name');

		$phone_2=$this->input->post('phone_2');

		$email_2=$this->input->post('email_2');

		$designation=$this->input->post('designation');

		////////////////////////////////////////

		

		$append_name=$this->input->post('append_name');

		$append_phone_2=$this->input->post('append_phone_2');

		$append_email_2=$this->input->post('append_email_2');

		$append_designation=$this->input->post('append_designation');

		

		

        ////////////////////////////////////////////

		

		$address_one=$this->input->post('address_one');

		$address_two=$this->input->post('address_two');

		$country=$this->input->post('country');

		$city=$this->input->post('city');

		$postal_code=$this->input->post('postal_code');

		$country=$this->input->post('country');

		$r_address=$this->input->post('r_address');

		

		////////////////////////////////////////

		

		$append_address_one=$this->input->post('append_address_one');

		$append_address_two=$this->input->post('append_address_two');

		$append_country=$this->input->post('append_country');

		$append_city=$this->input->post('append_city');

		$append_postal_code=$this->input->post('append_postal_code');

		$append_country=$this->input->post('append_country');

		$append_r_address=$this->input->post('append_r_address');

		

        ////////////////////////////////////////////

		

		

		if(empty($account)){

			  $message.="<p>fields are empty.</p>";	

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
			$last_users_id=$this->user_model->insert_userss($user_data["account"],$user_data["person"],$user_data["email"]);
			$insert_users=$this->user_model->insert_customer_users($last_id,$last_users_id);

			$data_personal=array();

			$data_personal_append=array();

			$data_address=array();

			$data_address_append=array();

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

				 'country'=>$country[$j],'cust_id'=>$last_id,'ref_address'=>$r_address[$j]);

				  	}

				  }

			 	$this->db->insert_batch('cust_address', $data_address);

				

				

				//////////////////////////////////APPEND////////////////////////////////

				 if(!empty($append_name)){

					

				for($i=0;$i<count($append_name); $i++){

				  	if($append_name[$i]!=''){	 

				  		 $data_personal_append[]=array('name'=>$append_name[$i],'phone'=>$append_phone_2[$i],'email'=>$append_email_2[$i],'designation'=>$append_designation[$i],'cust_id'=>$last_id);

				  	}

				  }

				   for($i=0;$i<count($append_name); $i++){

				  	if($append_name[$i]!=''){	

					 $this->db->insert_batch('cust_info', $data_personal_append);

					}}

				 }

				  

			  if(!empty($append_address_one)){

				

				 for($j=0;$j<count($append_address_one); $j++){

				  	if($append_address_one[$j]!=''){	 

				 $data_address_append[]=array('street_one'=>$append_address_one[$j],'street_two'=>$append_address_two[$j],'city'=>$append_city[$j],'postal_code'=>$append_postal_code[$j], 'country'=>$append_country[$j],'ref_address'=>$append_r_address[$j],'cust_id'=>$last_id);

				  	}

				  }

				  

				    for($j=0;$j<count($append_address_one); $j++){

				  	if($append_address_one[$j]!=''){	

					

			 	$this->db->insert_batch('cust_address', $data_address_append);

					}}

			 	

				}

				///////////////////////////////////END APPEND////////////////////////////////////

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

			public function view_user($user_id=0)

		{	

			

			$data['cust_id']=$user_id;

			$data['user_data']=$this->commons_model->single_record('cust','cust_id',$user_id);

		//	print_r($data['user_data']);exit;

			$data['user_info']=$this->commons_model->all_record_with_id('cust_info','cust_id',$user_id);

			//print_r($data['user_info']);exit;

			$data['user_address']=$this->commons_model->all_record_with_id('cust_address','cust_id',$user_id);

		//	print_r($data['user_address']);exit;

			$this->load->view('view_user',$data);

		}

		

		 public function edit_cus_form()

		{

		$cust_id=$this->input->post('edit_cust_id');

		$person=$this->input->post('person');

		$phone=$this->input->post('phone');

		$email=$this->input->post('email');

		$website=$this->input->post('website');

			

		$user_data=array(

			"person"=>$person,

			"phone"=>$phone,

			"email"=>$email,

			"website"=>$website

			);

		

	//	$last_id=$this->commons_model->update_record('cust','cust_id',$cust_id,$user_data);

		if(empty($person) && empty($phone) && empty($email) && empty($website)){

				$data=array("status"=>0,"message"=>"fields are empty.");		

					echo json_encode($data);	

					die;

			}

			$user_data= $user_data=array(

								"person"=>$person,

								"phone"=>$phone,

								"email"=>$email,

								"website"=>$website

								);

			

			$id=$this->commons_model->update_record('cust','cust_id',$cust_id,$user_data);

			$data=array("status"=>1,"message"=>"Your data updated successfully.");		

			echo json_encode($data);	

			die;

			

		//echo  $cust_id."----------".$person."----------".$email."----------".$phone."----------".$website;			

			

		}

		

		 public function edit_cus_info_form()

		{

			$edit_cust_info_id=$this->input->post('edit_cust_info_id');

			$designation=$this->input->post('designation');

			$email_2=$this->input->post('email_2');

			$phone_2=$this->input->post('phone_2');

			$name=$this->input->post('name');

			

		

	

			if(empty($name)){

				$data=array("status"=>0,"message"=>"fields are empty.");		

					echo json_encode($data);	

					die;

			}

			$user_data=array(

								

								"name"=>$name,

								"phone"=>$phone_2,

								"email"=>$email_2,

								"designation"=>$designation

								

								);

			

			$id=$this->user_model->update_cust_info_record($edit_cust_info_id,$user_data);

			$data=array("status"=>1,"message"=>"Your data updated successfully.");		

			echo json_encode($data);	

			die;

			

		

			

		}

		

		 public function edit_cus_address_form()

		 {

			$street_1=$this->input->post('street_1');

			$street_2=$this->input->post('street_2');

			$country=$this->input->post('country');

			$city=$this->input->post('city');

			$psot_code=$this->input->post('psot_code');

			$r_address=$this->input->post('r_address');

			$edit_address_info_id=$this->input->post('edit_address_info_id');

			

		

	

			if(empty($r_address)){

				$data=array("status"=>0,"message"=>"Refrence field is empty.");		

					echo json_encode($data);	

					die;

			}

			$user_data=array(

								

								"street_one"=>$street_1,

								"street_two"=>$street_2,

								"city"=>$city,

								"postal_code"=>$psot_code,

								"country"=>$country,

								"ref_address"=>$r_address

								

								

								);

			

			$id=$this->user_model->update_cust_address_record($edit_address_info_id,$user_data);

			$data=array("status"=>1,"message"=>"Your data updated successfully.");		

			echo json_encode($data);	

			die;

			

		

			

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

		////////////////////////////////////////

		

		$append_name=$this->input->post('append_name');

		$append_phone_2=$this->input->post('append_phone_2');

		$append_email_2=$this->input->post('append_email_2');

		$append_designation=$this->input->post('append_designation');
		

		

		

        ////////////////////////////////////////////

		

		

		

		$address_one=$this->input->post('address_one');

		$address_two=$this->input->post('address_two');

		$country=$this->input->post('country');

		$city=$this->input->post('city');

		$postal_code=$this->input->post('postal_code');

		$country=$this->input->post('country');

		$r_address=$this->input->post('r_address');
		

		////////////////////////////////////////

		

		$append_address_one=$this->input->post('append_address_one');

		$append_address_two=$this->input->post('append_address_two');

		$append_country=$this->input->post('append_country');

		$append_city=$this->input->post('append_city');

		$append_postal_code=$this->input->post('append_postal_code');

		$append_country=$this->input->post('append_country');
		
		$append_r_address=$this->input->post('append_r_address');

		

        ////////////////////////////////////////////

		

		

		if(empty($person)){

			  $message.="<div class='alert custom-error alert-danger'>fields are empty.</div>";	

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

			$data_personal_append=array();

			$data_address=array();

			$data_address_append=array();

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

				 'country'=>$country[$j],'cust_id'=>$cust_id,'ref_address'=>$r_address[$j]);

				  	}

				  }

			 	$this->db->insert_batch('cust_address', $data_address);

			/////////////////////////////////////////////////////////////////

				if(!empty($append_name)){

				

				for($i=0;$i<count($append_name); $i++){

				  	if($append_name[$i]!=''){	 

				  		 $data_personal_append[]=array('name'=>$append_name[$i],'phone'=>$append_phone_2[$i],'email'=>$append_email_2[$i],'designation'=>$append_designation[$i],'cust_id'=>$cust_id);

				  	}

					

				  }

				  for($i=0;$i<count($append_name); $i++){

				  	if($append_name[$i]!=''){	

					 $this->db->insert_batch('cust_info', $data_personal_append);

					}}

				}	

				if(!empty($append_address_one)){

				

				 for($j=0;$j<count($append_address_one); $j++){

				  	if($append_address_one[$j]!=''){	 

				 $data_address_append[]=array('street_one'=>$append_address_one[$j],'street_two'=>$append_address_two[$j],'city'=>$append_city[$j],'postal_code'=>$append_postal_code[$j], 'country'=>$append_country[$j],'ref_address'=>$append_r_address[$j],'cust_id'=>$cust_id);

				  	}

				  }

				  

				   for($j=0;$j<count($append_address_one); $j++){

				  	if($append_address_one[$j]!=''){	

					

			 	$this->db->insert_batch('cust_address', $data_address_append);

					}}

				}

				

				///////////////////////////////////END APPEND////////////////////////////////////

				

				

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

		public function import_data ()

		{	

			$this->load->view('import_data');

		}

  

	public function submit_data ()

	{	

		$last_id="";

		$this->load->library('excel');

	

		 $filename=$_FILES["file_excel"]["tmp_name"];

		

		 if(empty($_FILES['file_excel']['name'])) {

			$data=array("status"=>0,"message"=>"Plese upload a file.");		

					echo json_encode($data);	

					die;	

		}else{

			

		 if($_FILES["file_excel"]["size"] > 0)

			{	

					$allowed =  array('xls','xlsx');

					$filename_2 = $_FILES['file_excel']['name'];

					$ext = pathinfo($filename_2, PATHINFO_EXTENSION);

					if(in_array($ext,$allowed) ) {

						$objPHPExcel = PHPExcel_IOFactory::load($filename);

						$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

						$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet

				

					 

				

					for($i=2;$i<=$arrayCount;$i++){

			

						if($allDataInSheet[$i]["A"]!='' and $allDataInSheet[$i]["B"]!=''){

							$result_account = $this->commons_lib->check_customer_account($allDataInSheet[$i]["A"]);

							if($result_account==0){

			
						
		

							$account_number = trim($allDataInSheet[$i]["A"]);

							$name = trim($allDataInSheet[$i]["B"]);

							$phone = trim($allDataInSheet[$i]["I"]);

							$email = trim($allDataInSheet[$i]["AA"]);

							$website = trim($allDataInSheet[$i]["AB"]);

							$data=array("account"=>$account_number,"person"=>$name,"phone"=>$phone,"email"=>$email,"website"=>$website,"user_id"=>$this->session->userdata('user_id'));

						 $last_id=$this->commons_model->insert_record('cust',$data);
						 
						 $last_users_id=$this->user_model->insert_userss($account_number,$name ,$email );
						$insert_users=$this->user_model->insert_customer_users($last_id,$last_users_id);

						  /////////////////////////////////////////////////////////////

							$contact_name = trim($allDataInSheet[$i]["H"]);

							

						 

						 $data_cust_info=array("name"=>$contact_name,"cust_id"=>$last_id);

						 $result=$this->commons_model->insert_record('cust_info',$data_cust_info);

						 

						 

						 /////////////////////////////////////////////////////////////

							$street_one = trim($allDataInSheet[$i]["C"]);

							$street_two = trim($allDataInSheet[$i]["D"]);

							$town = trim($allDataInSheet[$i]["E"]);

							$country = trim($allDataInSheet[$i]["F"]);

							$postal_cod = trim($allDataInSheet[$i]["G"]);
 
  $data_cust_address=array("street_one"=>$street_one,"street_two"=>$street_two,"city"=>$town,"postal_code"=>$postal_cod,"country"=>$country,"cust_id"=>$last_id);

						 $result=$this->commons_model->insert_record('cust_address',$data_cust_address);

						 

					    }else{

							$last_id=true;

						 	

						 }

					  }

					}

				}else{

					$data=array("status"=>0,"message"=>"Plese import the valid file format.");		

					echo json_encode($data);	

					die;

					

				}

			}

	  }  if($last_id){

		  $data=array("status"=>0,"message"=>"Your data has been import sucessfully.");		

					echo json_encode($data);	

					die;

	      	

	  		}

	  	

	  

	}

	

		public function del_user_note($id)

		{	

			$data['user_data']=$this->user_model->del_single_user_note($id);

			

					if($data['user_data']){;

					

					$this->session->set_flashdata('msg', $this->config->item('delete_msg'));

					@redirect(base_url().$this->config->item('user_path').'view_user/'.$id);

					

						

					}

			

		}

		

		public function add_news_feed()

		{	

		

			$message_n=$this->input->post('message_n');

			$fed_cust_id=$this->input->post('fed_cust_id');

			$fed_cust_name=$this->input->post('fed_cust_name');

			$fed_feed_by_id=$this->input->post('fed_feed_by_id');

			$fed_feed_date=date('Y-m-d h:i:s A');
			$user_id=$this->session->userdata('user_id');
			//time().
			$name= $_FILES['userfile']['name'];
			$filenam = preg_replace('/[^a-zA-Z0-9_.]/', '', $name);
			//$filenam = str_replace(" ", "_", $name);
		
			$config=  array(
			  'file_name' => $filenam,
			  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/",
			 // 'upload_url'      => base_url()."uploads/",
			  'allowed_types' => "*",
			  'max_size'        => "2048000000000",
			);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
		

			//echo $fed_feed_date;exit;

			

			if(empty($message_n)){

				$data=array("status"=>0,"message"=>"Refrence field is empty.");		

					echo json_encode($data);	

					die;

			}

			$user_data=array(	"message"=>$message_n,

								"customer_id"=>$fed_cust_id,

								"name"=>$fed_cust_name,

								"feed_by_id"=>$fed_feed_by_id,

								"feed_date"=>$fed_feed_date,
								
								"news_feed_img"=>$filenam,

								"delete_bit"=>0

								

							);

			

			$id=$this->user_model->add_news_feed_record($user_data);
				$updated_date=date('Y-m-d H:i:s');
				$update_cus_date=$this->certificate_model->update_cus_date($fed_cust_id,$updated_date);

			if($id){

				$data=array("status"=>1,"message"=>"Your data updated successfully.");		

				echo json_encode($data);	

				die;

			}

			

		}

		

	

		public function get_user_note($user_id=0)

		{	

			$data['user_data']=$this->commons_model->single_record('cust','cust_id',$user_id);

			

					$u_data=$data['user_data'];

					$data=array("status"=>1,"note"=>$u_data->note);		

					echo json_encode($data);	

					die;

			

		}
		public function get_single_user_feed($customer_id)
		{	
		//echo $customer_id;exit;
			$data['user_data']=$this->user_model->get_single_new_feed($customer_id);
			 $this->load->view('load_newsfeed',$data); 
					/*$u_data=$data['user_data'];
					$data=array("status"=>1,"note"=>$u_data->note);		
					echo json_encode($data);	
					die;*/
		}
		

		public function sale_path_user_feed($customer_id)

		{	

		//echo $customer_id;exit;

			$data['user_data']=$this->user_model->get_single_new_feed($customer_id);

		

			

			

			 $this->load->view('load_newsfeed',$data); 

			

					/*$u_data=$data['user_data'];

					$data=array("status"=>1,"note"=>$u_data->note);		

					echo json_encode($data);	

					die;*/

			

		}

		

			public function add_note()

		{	

			$note = $this->input->post('note');

			$cust_id = $this->input->post('cust_id');

			if(empty($note)){

				$data=array("status"=>0,"message"=>"fields are empty.");		

					echo json_encode($data);	

					die;

			}

			$user_data=array("note"=>$note);	

			$id=$this->commons_model->update_record('cust','cust_id',$cust_id,$user_data);

			$data=array("status"=>1,"message"=>"Your note has been submitted.");		

			echo json_encode($data);	

			die;

			

		}

			public function remove_note()

		{	

			$cust_id = $this->input->post('cust_id');

			$user_data=array("note"=>"");	

			$id=$this->commons_model->update_record('cust','cust_id',$cust_id,$user_data);

			$data=array("status"=>1,"message"=>"Your note has been remove.");		

			echo json_encode($data);	

			die;

			

		}

	public function delete_user($user_id=0)

		{	

			$data=array('delete_bit'=>1);

			$this->commons_model->update_record('cust','cust_id',$user_id,$data);

			$this->session->set_flashdata('msg', $this->config->item('delete_msg'));

			@redirect(base_url().$this->config->item('user_path').'manage_user');

		}

		



		

	

	

		

}

