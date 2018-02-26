<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		
		$this->load->model('forgotpassword/forgot_model');
        $this->load->model('commons/commons_model');
        $this->load->model('login/login_model');
		$this->load->library('form_validation');
		/*if($this->session->userdata('logged_in') && $this->session->userdata('user_type')==2)
		{
			
			redirect(base_url().'dashboard/');
		}*/
		
		
	}
	
	public function change_pass()
	{
		$this->load->view('change_pass');
	}
	
	public function update_pass(){
		$user_id=$this->session->userdata('user_id');
		$password=$this->input->post('password');
		$update_pass=$this->login_model->update_pass($user_id,$password );
		if($update_pass){
			redirect(base_url().$this->config->item('certificate_path').'manage_certificate');
			
			}else{
				
				$this->session->set_flashdata('login_error','password not set');
				redirect(base_url(). $this->config->item('login_path').'change_pass');
				
				}
		
		
		
	}

	public function index()
	{
		//echo "asdasd";exit;
		$this->load->view('forgot');
	}
	
	public function forgot()
	
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('forgot');
		}
		else
		{
		   $main_url=base_url();
			$email = $this->input->post('email');
            $result_email=$this->commons_model->single_record('users','email',$email);
            if($result_email){
                $newpassword=rand(1111111,9999999);
                $user_id=$this->forgot_model->forgot_password($email,$newpassword);

                $message_div='<div><b>YOUR PASSWORD HAS BEEN CHANGED</b> </br>
                    <p>This email confirms that your password has been changed.</p>
                    <p>Username: '.$result_email->username.'</p>
                    <p>Password: '.$newpassword.'</p>
                    <p>You can login by following this link: '.$main_url.'/certificates </p>
                    <p>If you have any questions or encounter any problems logging in then please contact us.</p>
                    <p>Kind regards,</p>
                    <p>technical@simplyprecast.co.uk </p>
                    </div>';
                
                $this->load->library('email');
                $this->email->from('technical@simplyprecast.co.uk', 'Simply');
                $this->email->to($email);
                $this->email->subject('Change Password');
                $this->email->message($message_div);
                if($this->email->send())
                {
                    $data['msgs']="A new password has been sent to your e-mail address.";
                    $this->load->view('forgot',$data);
                    // @redirect(base_url()."signup_msgs");
                }else{
                    $data['msgs']="New Password cannot send to your Account due to some issues";
                    $this->load->view('forgot',$data);
                }
            }else{
                $data['msgs']="New Password cannot send to your Account due to some issues";
                $this->load->view('forgot',$data);
            }

		}
			
		
		

	}

	
}

