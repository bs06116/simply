<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Certificate extends CI_Controller {





	function __construct()

	{

		parent::__construct();	

	

		$this->load->model('user/user_model');	

		$this->load->model('commons/commons_model');	

		//$this->load->model('project/project_model');	

		$this->load->model('certificate/certificate_model');
        $this->load->model('document/document_model');

		$this->load->library('commons/commons_lib');	

		
		if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url().'login');
		}/*elseif($this->session->userdata('logged_in') && $this->session->userdata('user_type')==2){
				redirect(base_url().$this->config->item('certificate_path').'manage_certificate');
			
			}	
*/
	}

	



	

	public function add_certificate()

	{
		 if($this->session->userdata('user_type')==1){ 
			$cert_code=$this->certificate_model->get_last_row();
			//$cert_code++;
			//$data['cert_code_id'] = $cert_code;
			//$data['cert_code'] = sprintf('%05d',$cert_code);
			//$data['cert_code'] = $cert_code;
			$data['cert_code_id'] = ++$cert_code->certificate_id;
			$data['cert_code'] = ++$cert_code->cert_code;
             $data['all_document'] = $this->document_model->get_all_document();
			$this->load->view('add_certificate',$data);
		}else{ 
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			redirect(base_url().'login');
	  	}
		
	
	}



	

	public function edit_certificate($cert_id=0)
 	{	
		 if($this->session->userdata('user_type')==1){ 
			 $data["certificate"]=$this->certificate_model->get_certificate_data($cert_id);
	 		$data['single_data']=$this->commons_model->single_record('cust','cust_id',$data["certificate"]->customer_id);
             $data['all_document'] = $this->document_model->get_all_document();
	 		$this->load->view('edit_certificate',$data);
		}else{
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			redirect(base_url().'login');
	  	}
 	}

		

		

	



		

	

		public function manage_certificate()

		{

			//$data["all_cer"]=$this->commons_model->all_record_with_id('certificate','user_id',$this->session->userdata('user_id'));
			$data["all_cer"]=$this->certificate_model->get_all_certificate();
			$data["get_all_certificate_by_id"]=$this->certificate_model->get_all_certificate_by_id();



		//	$data["all_cer"]=$this->commons_model->all_record('certificate');

			$this->load->view('manage_certificate',$data);

		}

		

	

		public function save_certificate(){

			$message="";
			/* $import_btn=$this->input->post('import_btn');
			 echo $import_btn;*/
			
		 /*if(isset($this->input->post('import_btn'))){
	  
	  				echo "asdsadsad";
	  
	  
	  		}
			*/
		//	//$d_d = $this->input->post('d_d');
		//	$r_i_d = $this->input->post('r_i_d');
		///	echo $d_d."------------".$r_i_d;exit;
			
   
			$c_name = $this->input->post('c_name');

			$p_no = $this->input->post('p_no');

			$cert_code_id = $this->input->post('cert_code_id');

			$customer_id = $this->input->post('customer_id');

			$products_id = $this->input->post('products_id');

			if(empty($products_id)){

			 $message.="<p>Template Identification No Required.</p>";

			}

			if(empty($customer_id)){

			 $message.="<p> Customer Name required.</p>";

			}



			

			$cert_code = $this->input->post('cert_code');

			if(empty($cert_code)){

				$message.="<p>Certification Code field  Required.</p>";

			}

			

			$sale_person = $this->input->post('sale_person');

			if(empty($sale_person)){

				$message.="<p>Sales Person field  Required.</p>";

			}


		

			$c_order_no = $this->input->post('c_order_no');

			if(empty($c_order_no)){

				$message.="<p>Customer Order No field  Required.</p>";

				

			}

			

			$e_doc_no = $this->input->post('e_doc_no');

			if(empty($e_doc_no)){

				$message.="<p>External Doc No valid field Required.</p>";

				

			}

			

			$identification_nos = $this->input->post('identification_nos');

			if(empty($identification_nos)){

				$message.="<p>Identification No  valid field Required.</p>";

				

			}

			$q_test = $this->input->post('q_test');

			if(empty($q_test)){

				$message.="<p>Quality test  valid field Required.</p>";

				

			}
			
			$d_d = $this->input->post('d_d');

			if(empty($d_d)){

				$message.="<p>Delivery Date  is require.</p>";

			}
			
			$i_d = $this->input->post('i_d');

			if(empty($i_d)){

				$message.="<p>Inspection Date  is require.</p>";

			}
			
			$r_i_d = $this->input->post('r_i_d');

			if(empty($r_i_d)){

				$message.="<p>Re-inspection Date  is require.</p>";

			}
			
			$tested_by = $this->input->post('tested_by');

			if(empty($tested_by)){

				$message.="<p>Tested by field  is require.</p>";

			}
			
			$inspected_by = $this->input->post('inspected_by');

			if(empty($inspected_by)){

				$message.="<p>Inspected by field  is require.</p>";

			}
		$identification_to = $this->input->post('identification_to');
            $document = $this->input->post('document');
			

			

			if(!empty($message)){

				

				$data=array("status"=>0,"message"=>$message);				

					echo json_encode($data);	

					die;

					

			}else{

			$certi_data=array(

						"cert_code"=>$cert_code,

						"c_name"=>$c_name,



						"p_no"=>$products_id,

						"sale_person"=>$sale_person,

						//"ref_to_standard"=>$ref_to_standard,

						"c_order_no"=>$c_order_no,

						//"c_attention"=>$c_attention,

						//"c_location"=>$c_location,

						"e_doc_no"=>$e_doc_no,

						"products_id"=>$products_id,

						"customer_id"=>$customer_id,

						"user_id"=>$this->session->userdata('user_id'),
						
						"t_quatilty"=>$q_test,
						
						

						"identuty_no"=>$identification_nos,
						
						"delivery_date"=>$d_d,
						"inspection_date"=>$i_d,
						"re_inspection_date"=>$r_i_d,
						"tested_by"=>$tested_by,
						"inspected_by"=>$inspected_by,
						"identity_to"=>$identification_to,
						"cer_date"=>date("Y-m-d")

						);

				$updated_date=date('Y-m-d H:i:s');
				$data_message=array("name"=>$c_name,"feed_date"=>date("Y-m-d"),"feed_by_id"=>$this->session->userdata('user_id'),"feed_date"=>date('Y-m-d H:i:s'),"customer_id"=>$customer_id,"message"=>"Certification # ".$cert_code.',,'.$cert_code_id.",,"."Generated");		

				$last_certificate_id=$this->commons_model->insert_record('certificate',$certi_data);

				$result=$this->commons_model->insert_record('news_feed',$data_message);
				
				$update_cus_date=$this->certificate_model->update_cus_date($customer_id,$updated_date);
                $result_user_id=$this->certificate_model->get_user_id($customer_id);


                $return_data = array();
                foreach ($document as $value)
                {
                    $return_data[] = array("document_id"=>$value, "certficate_id"=>$last_certificate_id, "user_id"=>$result_user_id);
                }
                $this->db->insert_batch('document_assign',$return_data);
				/*$t_prod_data=array(

							

							"t_quatilty"=>$q_test

						);

				

				$result=$this->certificate_model->update_product_qality($products_id,$t_prod_data);*/

				if($last_certificate_id){

						//$data['single_data']=$this->commons_model->single_record('products','products_id',$last_product_id);

						//$data=array("status"=>1,"data"=>$this->load->view("insert_new_product",$data, true));	

						//$p_data=$data['single_data'];	

						$data=array("status"=>1,"message"=>"Your data has been save.");		

						echo json_encode($data);	

						die;

						

					}else{

						$data=array("status"=>0,"message"=>"something problem");				

						echo json_encode($data);	

						die;

					}

			}

		}
		
		
		public function save_certificate_1(){

			

			$message="";
			/* $import_btn=$this->input->post('import_btn');
			 echo $import_btn;*/
			
		 /*if(isset($this->input->post('import_btn'))){
	  
	  				echo "asdsadsad";
	  
	  
	  		}
			*/
		//	//$d_d = $this->input->post('d_d');
		//	$r_i_d = $this->input->post('r_i_d');
		///	echo $d_d."------------".$r_i_d;exit;
			
   
			$c_name = $this->input->post('c_name');

			$p_no = $this->input->post('p_no');

			$cert_code_id = $this->input->post('cert_code_id');

			$customer_id = $this->input->post('customer_id');

			$products_id = $this->input->post('products_id');

			if(empty($products_id)){

			 $message.="<p>Template Identification No Required.</p>";

			}

			if(empty($customer_id)){

			 $message.="<p> Customer Name required.</p>";

			}

			/*$order_no = $this->input->post('order_no');

			if(empty($order_no) or !is_numeric($order_no)){

			 $message.="<p>Only numeric field required in Order No.</p>";

			}*/

			/*$production_no = $this->input->post('production_no');

			if(empty($production_no) or !is_numeric($order_no)){

			 $message.="<p> Only numeric field required in Production No.</p>";

			}*/

			

			$cert_code = $this->input->post('cert_code');

			if(empty($cert_code)){

				$message.="<p>Certification Code field  Required.</p>";

			}

			

			$sale_person = $this->input->post('sale_person');

			if(empty($sale_person)){

				$message.="<p>Sales Person field  Required.</p>";

			}

			

			/*$ref_to_standard = $this->input->post('ref_to_standard');

			if(empty($ref_to_standard)){

				$message.="<p>Reference To Standard valid  field Required.</p>";

				

			}*/

		

			$c_order_no = $this->input->post('c_order_no');

			if(empty($c_order_no)){

				$message.="<p>Customer Order No field Required.</p>";

				

			}

			

			
/*
			$c_attention = $this->input->post('c_attention');

			if(empty($c_attention)){

				$message.="<p>Customer Attention vlaid field Required.</p>";

				

			}
*/
			

		/*	$c_location = $this->input->post('c_location');

			if(empty($c_location)){

				$message.="<p>Customer Location vlaid field Required.</p>";

				

			}*/
/*
			$e_doc_no = $this->input->post('e_doc_no');

			if(empty($e_doc_no)){

				$message.="<p>External Doc No vlaid field Required.</p>";

				

			}*/

			

			$identification_nos = $this->input->post('identification_nos');

			if(empty($identification_nos)){

				$message.="<p>Identification No  vlaid field Required.</p>";

				

			}

			$q_test = $this->input->post('q_test');

			if(empty($q_test)){

				$message.="<p>Quality test  vlaid field Required.</p>";

				

			}
			
			$d_d = $this->input->post('d_d');

			if(empty($d_d)){

				$message.="<p>Delivery Date  is require.</p>";

			}
			
			$i_d = $this->input->post('i_d');

			if(empty($i_d)){

				$message.="<p>Inspection Date  is require.</p>";

			}
			
			$r_i_d = $this->input->post('r_i_d');

			if(empty($r_i_d)){

				$message.="<p>Re-inspection Date  is require.</p>";

			}
			
			$tested_by = $this->input->post('tested_by');

			if(empty($tested_by)){

				$message.="<p>Tested by field  is require.</p>";

			}
			
			$inspected_by = $this->input->post('inspected_by');

			if(empty($inspected_by)){

				$message.="<p>Inspected by field  is require.</p>";

			}
		$identification_to = $this->input->post('identification_to');
			

			

			if(!empty($message)){

				

				$data=array("status"=>0,"message"=>$message);				

					echo json_encode($data);	

					die;

					

			}else{

			$certi_data=array(

						"cert_code"=>$cert_code,

						"c_name"=>$c_name,

						//"order_no"=>$order_no,

						//"production_no"=>$production_no,

						"p_no"=>$products_id,

						"sale_person"=>$sale_person,

						//"ref_to_standard"=>$ref_to_standard,

						"c_order_no"=>$c_order_no,

						//"c_attention"=>$c_attention,


						//"c_location"=>$c_location,

						//e_doc_no"=>$e_doc_no,

						"products_id"=>$products_id,

						"customer_id"=>$customer_id,

						"user_id"=>$this->session->userdata('user_id'),
						
						"t_quatilty"=>$q_test,
						
						

						"identuty_no"=>$identification_nos,
						
						"delivery_date"=>$d_d,
						"inspection_date"=>$i_d,
						"re_inspection_date"=>$r_i_d,
						"tested_by"=>$tested_by,
						"inspected_by"=>$inspected_by,
						"identity_to"=>$identification_to,
						

						

						"cer_date"=>date("Y-m-d")

						);	

				$data_message=array("name"=>$c_name,"feed_date"=>date("Y-m-d"),"feed_by_id"=>$this->session->userdata('user_id'),"feed_date"=>date('Y-m-d H:i:s'),"customer_id"=>$customer_id,"message"=>"Certification # ".$cert_code.',,'.$cert_code_id.",,"."Generated");		

				$last_certificate_id=$this->commons_model->insert_record('certificate',$certi_data);

				$result=$this->commons_model->insert_record('news_feed',$data_message);
				
				$updated_date=date('Y-m-d H:i:s');
				$update_cus_date=$this->certificate_model->update_cus_date($customer_id,$updated_date);
				/*$t_prod_data=array(

							

							"t_quatilty"=>$q_test

						);

				

				$result=$this->certificate_model->update_product_qality($products_id,$t_prod_data);*/


				if($last_certificate_id){


		

			

			$date=time();

			$data["certificate"]=$this->certificate_model->get_certificate_data($last_certificate_id);

			$data['single_data']=$this->commons_model->single_record('cust','cust_id',$data["certificate"]->customer_id);

			$data['address_data']=$this->commons_model->single_record('cust_address','cust_id',$data["certificate"]->customer_id);

		
		  $html=$this->load->view('pdf1',$data, true); 
			$path=base_url()."pdf.css";
			$pdfFilePath = "certification-".$date.".pdf";

    		$this->load->library('m_pdf');
			//$header="<html><head><title></title><link rel='stylesheet' type='text/css' href='css/demo.css'></head>";
			$footer="<p  style='font-size:11px;font-weight:bold'>Wenning House, Forge Lane, Halton, Lancaster, LA2 6RH. TEl: 0800 678 5178, Email: technical@simply-precast.co.uk</p>";
			
			$stylesheet = file_get_contents($path);
		
  			$this->m_pdf->pdf->mPDF('utf-8','A4','','','15','15','28','18'); 

    		$this->m_pdf->pdf->WriteHTML($stylesheet,1);


   			$this->m_pdf->pdf->WriteHTML($html,2);
	
     		$this->m_pdf->pdf->SetHTMLFooter($footer);
			ob_clean();
			
   			$result_mpdf=$this->m_pdf->pdf->Output('./mpdf_folder/'.$pdfFilePath,'F');
			  	$data=array("status"=>1,"message"=>"Your data has been save","pdf_name"=>$pdfFilePath);		
 					echo json_encode($data);	
					 die;
						

					}else{

						$data=array("status"=>0,"message"=>"something problem");				

						echo json_encode($data);	

						die;

					}

			}

		

	

		}

		public function update_certificate(){

			

			$message="";

			//$order_no = $this->input->post('order_no');

			$p_no = $this->input->post('p_no');

			$c_name = $this->input->post('c_name');

			$products_id = $this->input->post('products_id');

			$customer_id = $this->input->post('customer_id');
			
			$products_id = $this->input->post('products_id');

			$identification_nos = $this->input->post('identification_nos');
			
			$q_test = $this->input->post('q_test');


			if(empty($customer_id)){

			 $message.="<p> Customer Name required.</p>";

			}

			

			/*if(empty($order_no) ){

			 $message.="<p>Only numeric field required in Order No.</p>";

			}*/

			

			/*$production_no = $this->input->post('production_no');

			if(empty($production_no) ){

			 $message.="<p>Only numeric field required in Production No.</p>";

			}*/

			$p_no = $this->input->post('p_no');

			if(empty($p_no)){

			 $message.="<p>Template Identification No field required.</p>";

			}

			

			

			

			$sale_person = $this->input->post('sale_person');

			if(empty($sale_person)){

				$message.="<p>Sales Person field  Required.</p>";

			}

			
/*
			$ref_to_standard = $this->input->post('ref_to_standard');

			if(empty($ref_to_standard)){

				$message.="<p>Reference To Standard valid  field Required.</p>";

				

			}*/

		

			$c_order_no = $this->input->post('c_order_no');

			if(empty($c_order_no)){

				$message.="<p>Customer Order No field  Required.</p>";

				

			}

			

			

			/*$c_attention = $this->input->post('c_attention');

			if(empty($c_attention)){

				$message.="<p>Customer Attention vlaid field Required.</p>";

				

			}

			

			$c_location = $this->input->post('c_location');

			if(empty($c_location)){

				$message.="<p>Customer Location vlaid field Required.</p>";

				

			}*/

			$e_doc_no = $this->input->post('e_doc_no');

		/*	if(empty($e_doc_no)){

				$message.="<p>External Doc No vlaid field Required.</p>";

				

			}*/
			
			
$d_d = $this->input->post('d_d');

			if(empty($d_d)){

				$message.="<p>Delivery Date  is require.</p>";

			}
			
			$i_d = $this->input->post('i_d');

			if(empty($i_d)){

				$message.="<p>Inspection Date  is require.</p>";

			}
			
			$r_i_d = $this->input->post('r_i_d');

			if(empty($r_i_d)){

				$message.="<p>Re-inspection Date  is require.</p>";

			}
			
			$tested_by = $this->input->post('tested_by');

			if(empty($tested_by)){

				$message.="<p>Tested by field  is require.</p>";

			}
			
			$inspected_by = $this->input->post('inspected_by');

			if(empty($inspected_by)){

				$message.="<p>Inspected by field  is require.</p>";

			}
			$cer_id = $this->input->post('cer_id');

			$identification_to = $this->input->post('identification_to');
            $document = $this->input->post('document');

			

			if(!empty($message)){

				

				$data=array("status"=>0,"message"=>$message);				

					echo json_encode($data);	

					die;

					

			}else{

			$certi_data=array(

						//"order_no"=>$order_no,

						"c_name"=>$c_name,
						
						"identuty_no"=>$identification_nos,
						
					    "t_quatilty"=>$q_test,
						
					//	"production_no"=>$production_no,

						"sale_person"=>$sale_person,

						//"ref_to_standard"=>$ref_to_standard,

						"c_order_no"=>$c_order_no,

					//	"c_attention"=>$c_attention,

					//	"c_location"=>$c_location,

						//"e_doc_no"=>$e_doc_no,

						"products_id"=>$products_id,

						"customer_id"=>$customer_id,
						"delivery_date"=>$d_d,
						"inspection_date"=>$i_d,
						"re_inspection_date"=>$r_i_d,
						"tested_by"=>$tested_by,
						"inspected_by"=>$inspected_by,
						"identity_to"=>$identification_to
						


						);	

				$last_certificate_id=$this->commons_model->update_record('certificate','certificate_id',$cer_id,$certi_data);
                $last_certificate_id=$this->commons_model->delete_record_from_db('document_assign','certficate_id',$cer_id);
                $result_user_id=$this->certificate_model->get_user_id($customer_id);
                $return_data = array();
                foreach ($document as $value)
                {
                    $return_data[] = array("document_id"=>$value, "certficate_id"=>$cer_id, "user_id"=>$result_user_id);
                }
                $this->db->insert_batch('document_assign',$return_data);

				if($cer_id){

						//$data['single_data']=$this->commons_model->single_record('products','products_id',$last_product_id);

						//$data=array("status"=>1,"data"=>$this->load->view("insert_new_product",$data, true));	

						//$p_data=$data['single_data'];	

						$data=array("status"=>1,"message"=>"Your data has been updated.");		

						echo json_encode($data);	

						die;

						

					}else{

						$data=array("status"=>0,"message"=>"something problem");				

						echo json_encode($data);	

						die;

					}

			}

		

	

		

		}

	

	    public  function get_product_data(){

			

				$result_product=$this->certificate_model->get_product_data($_GET['term']);

				$data=array();

						foreach($result_product as $rp):

					 $data[] = array('label'=>$rp['identification'],'id'=>$rp['products_id']);

					endforeach;

				echo json_encode($data);

				die;	

					

		  }

		  public function get_all_product_data(){

			  $search_keyword=$this->input->post('search_keyword');

			  $data['single_data']=$this->commons_model->single_record('products','products_id',$search_keyword);

					//$data=array("status"=>1,"data"=>$this->load->view("insert_new_product",$data, true));	

					$p_data=$data['single_data'];	

					$data=array("status"=>1,"pro_id"=>$p_data->products_id,"identification"=>$p_data->identification,"description"=>$p_data->description,"swl"=>$p_data->swl,"pla"=>$p_data->pla);		

					echo json_encode($data);	

					die;

			}

		

		public function get_customer(){

			$result_product=$this->certificate_model->get_customer($_GET['term']);

				$data=array();

						foreach($result_product as $rp):

					 $data[] = array('label'=>$rp['person'],'id'=>$rp['cust_id']);

					endforeach;

				echo json_encode($data);

				die;	

			

		}

			

		public function get_all_customer_data(){

			 $search_keyword=$this->input->post('search_keyword');

			 $result=$this->certificate_model->get_customer_data($search_keyword);

			/*  $data['single_data']=$this->commons_model->single_record(' Structurecust_address','cust_id',$search_keyword);

					//$data=array("status"=>1,"data"=>$this->load->view("insert_new_product",$data, true));	

					$c_data=$data['single_data'];*/	

				$data=array("status"=>1,"cust_id"=>$result->cust_id,"city"=>$result->city,"account"=>$result->account);		

					echo json_encode($data);	

					die;

		}

		public function delete_certificate($cer_id=0)

		{
			 if($this->session->userdata('user_type')==1){ 
				if($cer_id!=0){	
 					$data=array('delete_bit'=>1);
 					$this->commons_model->update_record('certificate','certificate_id',$cer_id,$data);
 				}
 				@redirect(base_url().$this->config->item('certificate_path').'manage_certificate');
			}else{ 
				$this->session->unset_userdata('logged_in');
				$this->session->unset_userdata('user_id');
				redirect(base_url().'login');
	  		}
		}

		

		public function view_pdf($certificate_id){

		

			

			$date=time();

			$data["certificate"]=$this->certificate_model->get_certificate_data($certificate_id);

			$data['single_data']=$this->commons_model->single_record('cust','cust_id',$data["certificate"]->customer_id);

			$data['address_data']=$this->commons_model->single_record('cust_address','cust_id',$data["certificate"]->customer_id);
	
	//$html=$this->load->view('pdf1',$data);
			
		  $html=$this->load->view('pdf1',$data, true); 
			$path=base_url()."pdf.css";
			$pdfFilePath = "certification-".$date.".pdf";

    		$this->load->library('m_pdf');
			//$header="<html><head><title></title><link rel='stylesheet' type='text/css' href='css/demo.css'></head>";
			$footer="<p  style='font-size:11px;font-weight:bold'>Wenning House, Forge Lane, Halton, Lancaster, LA2 6RH. TEl: 0800 678 5178, Email: technical@simply-precast.co.uk</p>";
			
			$stylesheet = file_get_contents($path);
  			$this->m_pdf->pdf->mPDF('utf-8','A4','','','15','15','28','18'); 

			$this->m_pdf->pdf->WriteHTML($stylesheet,1);
   			$this->m_pdf->pdf->WriteHTML($html,2);

     		$this->m_pdf->pdf->SetHTMLFooter($footer);

   			$this->m_pdf->pdf->Output($pdfFilePath, "D");

			

		}

		

		public function create_pdf()

		{

			$this->load->view("pdf");

		}

		

		public function manage_newsfeed(){

		

		$this->load->view('manage_newsfeed');

		}

			public function add_newsfeed(){

			

			$this->load->view('add_newsfeed');

		}

			public function save_newsfeed(){

			

			$message="";

			

		 	$c_name = $this->input->post('c_name');

			$customer_id = $this->input->post('customer_id');
			//echo  $customer_id;exit;
			
			$user_id=$this->session->userdata('user_id');	
			
			
			$name= $_FILES['userfile']['name'];
			$filenam = preg_replace('/[^a-zA-Z0-9_.]/', '', $name);
			//$filenam = str_replace(" ", "_", $name);
		
			$config=  array(
			  'file_name' => $filenam,
			  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/",
			 // 'upload_url'      => base_url()."uploads/",
			  'allowed_types' => "*",
			  'max_size'        => "2048000",
			);
		
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
		

			if(empty($c_name)){

				$message.="<p>Name field Required.</p>";

				

			}

			$message_n = $this->input->post('message_n');

			if(empty($message_n)){

				$message.="<p>Message field Required.</p>";

				

			}

		

			if(!empty($message)){

				

				$data=array("status"=>0,"message"=>$message);				

					echo json_encode($data);	

					die;

					

			}else{

			$data_message=array(

						"name"=>$c_name,

						"customer_id"=>$customer_id,

						"message"=>$message_n,

						"feed_date"=>date('Y-m-d H:i:s'),
						
						"feed_by_id"=>$user_id,
						
						"news_feed_img"=>$filenam,
						

						

						);	

			

				$updated_date=date('Y-m-d H:i:s');

				$result=$this->commons_model->insert_record('news_feed',$data_message);
				$update_cus_date=$this->certificate_model->update_cus_date($customer_id,$updated_date);

				if($update_cus_date){

						$data=array("status"=>1,"message"=>"Your data has been save.");		

						echo json_encode($data);	

						die;

						

					}else{

						$data=array("status"=>0,"message"=>"something problem");				

						echo json_encode($data);	

						die;

					}

			}

		 }

		 

		 public function get_new_feed(){

			 $search_keyword=$this->input->post('search_keyword');

			 $data['result']=$this->certificate_model->get_new_feed($search_keyword);

			 $this->load->view('load_newsfeed',$data); 

		}

}

