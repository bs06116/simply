<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Doctype extends CI_Controller {





	function __construct()

	{

		parent::__construct();	

	

		$this->load->model('user/user_model');	

		$this->load->model('commons/commons_model');	

		//$this->load->model('project/project_model');	

		$this->load->model('certificate/certificate_model');
        $this->load->model('doctype/doctype_model');

		$this->load->library('commons/commons_lib');	

		
		if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url().'login');
		}/*elseif($this->session->userdata('logged_in') && $this->session->userdata('user_type')==2){
				redirect(base_url().$this->config->item('certificate_path').'manage_certificate');
			
			}	
*/
	}




    public function doctype_exist($doctype_name){


        $doctype_name = $this->doctype_model->check_doctype_exist($doctype_name);
        if ($doctype_name > 0)
        {
            $this->form_validation->set_message('doctype_exist', 'Document Type Already Exists.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    public function update_doctype_exist($doctype_name){

        $doc_id=$this->input->post('doctype_id');
        $doctype_name = $this->doctype_model->update_check_doctype_exist($doctype_name,$doc_id);

        if ($doctype_name > 0)
        {
            $this->form_validation->set_message('update_doctype_exist', 'Document Type Already Exists.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
	

	public function add_doctype()

	{
		 if($this->session->userdata('user_type')==1){ 

			$this->load->view('add_doctype');
		}else{ 
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			redirect(base_url().'login');
	  	}
		
	
	}



	

	public function edit_doctype($doctype_id=0)
 	{	
		 if($this->session->userdata('user_type')==1){ 

	 		$data['single_data']=$this->commons_model->single_record('doctype','id',$doctype_id);
	 		$this->load->view('edit_doctype',$data);
		}else{ 
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			redirect(base_url().'login');
	  	}
 	}

		

		

	



		

	

		public function manage_doctype()

		{
            $data["all_doctype"]=$this->commons_model->all_record_delete_bit("doctype");


			$this->load->view('manage_doctype',$data);

		}

		

	

		public function save_document_type(){
            $name = $this->input->post('name');
            $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_doctype_exist['.$name.']');

            if ($this->form_validation->run() == FALSE)
            {



                $this->load->view('add_doctype');
            }
            else{






                $data=array(

                    "name"=>$name,


                );



               // $updated_date=date('Y-m-d H:i:s');

                $result=$this->commons_model->insert_record('doctype',$data);
              //  $update_cus_date=$this->certificate_model->update_cus_date($customer_id,$updated_date);

                if($result){
                    $this->session->set_flashdata('sucess_message', "Your data has been save successfully");
                }
                else{
                    $this->session->set_flashdata('error_msg', "something error");
                }
                @redirect(base_url().$this->config->item('doctype_path').'manage_doctype');

            }

		}



    public function update_doctype()
    {
        $doc_id=$this->input->post('doctype_id');
        $name=$this->input->post('name');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_update_doctype_exist['.$name.']');

        if ($this->form_validation->run() == FALSE)
        {

            $data['single_data']=$this->commons_model->single_record('doctype','id',$doc_id);
            $this->load->view('edit_doctype',$data);
        }
        else
        {


                $doc_data=array(
                    "name"=>$name,


                );



        $id=$this->commons_model->update_record('doctype','id',$doc_id,$doc_data);

        if($id){
            $this->session->set_flashdata('msg', $this->config->item('update_msg'));
        }else{
            $this->session->set_flashdata('msg', $this->config->item('update_msg'));
        }
        @redirect(base_url().$this->config->item('doctype_path').'manage_doctype');
        }




    }
	


			

		public function delete_doctype($doc_id=0)

		{

 			$data=array('delete_bit'=>1);
            $result=$this->commons_model->update_record('doctype','id',$doc_id,$data);
            if($result){
                $this->session->set_flashdata('sucess_message', "Your data has been delete successfully");
            }
            else{
                $this->session->set_flashdata('error_msg', "something error");
            }
            @redirect(base_url().$this->config->item('doctype_path').'manage_doctype');

		}


		


}

