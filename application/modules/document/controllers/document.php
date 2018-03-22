<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Document extends CI_Controller {





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

	



	

	public function add_document()

	{
		 if($this->session->userdata('user_type')==1){ 
			$cert_code=$this->certificate_model->get_last_row();
			//$cert_code++;
			//$data['cert_code_id'] = $cert_code;
			//$data['cert_code'] = sprintf('%05d',$cert_code);
			//$data['cert_code'] = $cert_code;
			$data['cert_code_id'] = ++$cert_code->certificate_id;
			$data['cert_code'] = ++$cert_code->cert_code;
			$this->load->view('add_document',$data);
		}else{ 
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			redirect(base_url().'login');
	  	}
		
	
	}



	

	public function edit_document($cert_id=0)
 	{	
		 if($this->session->userdata('user_type')==1){ 
			 $data["certificate"]=$this->certificate_model->get_certificate_data($cert_id);
	 		$data['single_data']=$this->commons_model->single_record('cust','cust_id',$data["certificate"]->customer_id);
	 		$this->load->view('edit_certificate',$data);
		}else{ 
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			redirect(base_url().'login');
	  	}
 	}

		

		

	



		

	

		public function manage_document()

		{
			//$data["all_cer"]=$this->commons_model->all_record_with_id('certificate','user_id',$this->session->userdata('user_id'));
            if($this->session->userdata('user_type')==1) {
                $data["all_document"]=$this->document_model->get_all_document();
            }else{
                $data["all_document"]=$this->document_model->assign_document($this->session->userdata('user_id'));
            }



			$this->load->view('manage_document',$data);

		}

		

	

		public function save_document(){
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('type', 'Type', 'trim|required');
          //  $this->form_validation->set_rules('upload_document', 'Document', 'required');
            if ($this->form_validation->run() == FALSE)
            {



                $this->load->view('add_document');
            }
            else{


                $name = $this->input->post('name');

                $type = $this->input->post('type');
                $upload_document= $_FILES['upload_document']['name'];

                $filename = preg_replace('/[^a-zA-Z0-9_.]/', '', $upload_document);

                $config=  array(
                    'file_name' => $filename,
                    'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/",
                    // 'upload_url'      => base_url()."uploads/",
                    'allowed_types' => "*",
                    'max_size'        => "2048000",
                );

                $this->load->library('upload', $config);
                $this->upload->do_upload('upload_document');


                $data=array(

                    "name"=>$name,

                    "type"=>$type,

                    "file_name"=>$filename,


                );



               // $updated_date=date('Y-m-d H:i:s');

                $result=$this->commons_model->insert_record('document',$data);
              //  $update_cus_date=$this->certificate_model->update_cus_date($customer_id,$updated_date);

                if($result){
                    $this->session->set_flashdata('sucess_message', "Your data has been save successfully");
                }
                else{
                    $this->session->set_flashdata('error_msg', "something error");
                }
                @redirect(base_url().$this->config->item('document_path').'manage_document');

            }

		}
		
		


	


			

		public function delete_document($doc_id=0)

		{

 					$data=array('delete_bit'=>1);
            $result=$this->commons_model->update_record('document','id',$doc_id,$data);
            if($result){
                $this->session->set_flashdata('sucess_message', "Your data has been delete successfully");
            }
            else{
                $this->session->set_flashdata('error_msg', "something error");
            }
            @redirect(base_url().$this->config->item('document_path').'manage_document');

		}

		


}

