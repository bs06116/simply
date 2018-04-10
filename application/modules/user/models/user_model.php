<?php 

class User_model extends CI_Model

{

	

		/*public function get_single_new_feed($cust_id)

		{

		$query = $this->db->query("SELECT * FROM `cust`

									INNER JOIN `news_feed` 

										ON (`cust`.`cust_id` = `news_feed`.`customer_id`)

										WHERE customer_id='".$cust_id."' AND`news_feed`.`delete_bit`=0

								 AND `cust`.`delete_bit` =0 AND  `cust`.`active_bit`=1 ORDER BY feed_date DESC ");
		return $query->result_array();		

		}*/
		public function get_single_new_feed($cust_id)
		{

			$query = $this->db->query("SELECT * FROM `news_feed` 
										INNER JOIN `cust`   ON (`news_feed`.`customer_id` = `cust`.`cust_id`)
  									  INNER JOIN `users` ON (`news_feed`.`feed_by_id` = `users`.`userid`)
       								 WHERE customer_id='".$cust_id."' AND`news_feed`.`delete_bit`=0 AND `cust`.`delete_bit` =0 AND  `cust`.`active_bit`=1 
									 ORDER BY   `news_feed`.`news_feed_id` DESC  ");
			return $query->result_array();		

		}
		
		public function get_customer_details()
		{

			$query = $this->db->query("SELECT `cust_id`  , `account`  , `person` , `email` , `delete_bit` FROM `cust` WHERE delete_bit = 0");
			return $query->result_array();		

		}
		
		public function insert_users($user_id,$user_name,$user_full,$user_email,$type,$desination,$password)
		{

			$this->db->set('userid', $user_id);
			$this->db->set('username', $user_name);
			$this->db->set('password', $password);
			$this->db->set('fullname', $user_full);
			$this->db->set('email', $user_email);
			$this->db->set('designation', $desination);
			$this->db->set('user_type',$type);
			$this->db->set('active_bit', 1);
			$this->db->set('delete_bit',0);
			
			$this->db->insert('users'); 
			
			

		}
		public function insert_userss($user_name,$user_full,$user_email)
		{
			$type=2;
			$desination="Customer";
			$password=md5("123456");
			
			$this->db->set('username', $user_name);
			$this->db->set('password', $password);
			$this->db->set('fullname', $user_full);
			$this->db->set('email', $user_email);
			$this->db->set('designation', $desination);
			$this->db->set('user_type',$type);
			$this->db->set('active_bit', 1);
			$this->db->set('delete_bit',0);
			
			$this->db->insert('users'); 
			return $this->db->insert_id();
		}
		
		public function insert_customer_users($last_id,$last_users_id)
		{
			$this->db->set('user_id', $last_users_id);
			$this->db->set('customer_id', $last_id);
			$this->db->insert('user_custtomers'); 
			return $this->db->insert_id();
		}
		
		
		
		

		public function get_sigle_certifate($cust_id){
			
 					$query = $this->db->query("SELECT * FROM `certificate` WHERE   `delete_bit`=0 AND active_bit=1 AND customer_id='".$cust_id."' ORDER BY certificate_id DESC;");
				    return $query->result_array();		
		}

		

		public function get_last_feed_date($cust_id)

		{

		$query = $this->db->query("SELECT * FROM  `news_feed`   WHERE customer_id='".$cust_id."' ORDER BY feed_date DESC;");

		

		return $query->row();		

		}

		

		

		public function get_note_box_text($cust_id)

		{

		$query = $this->db->query("SELECT * FROM  `cust` WHERE `cust_id`='".$cust_id."' AND `delete_bit`=0 AND `active_bit`=1;");

		

		return $query->row();		

		}

		

		

		public function update_cust_info_record($id,$data)

		{

			//$this->db->where($colum, $id);

			$this->db->where('cust_info_id', $id);

			$this->db->update('cust_info',$data); 

			//echo $this->db->affected_rows();

			//exit;

			

			return $this->db->affected_rows();		

		}

		

			public function update_cust_address_record($id,$data)

			{

				

				$this->db->where('cust_address_id', $id);

				$this->db->update('cust_address',$data); 

			

			

			return $this->db->affected_rows();		

			}

		

		

			public function del_single_user_note($id)

			{

				$note="";

				

				$this->db->set('note',$note);

				$this->db->where('cust_id',$id);

				$this->db->update('cust'); 

				return $this->db->affected_rows();		

				

		

				

			}

		

		

			public function add_news_feed_record($data)

			{

					$this->db->insert('news_feed',$data);

					return $this->db->insert_id();		

		}



		public function get_attached_newsfeed($news_feed_id){

            $query = $this->db->query("SELECT * FROM  document,assign_newsfeed_document WHERE document.id=assign_newsfeed_document.document_id AND assign_newsfeed_document.news_feed_id='$news_feed_id'");



            return $query->result();
        }

		

	

	

	

	

}



?>