<?php 
class Dashboard_model extends CI_Model
{
	public function get_newfeed()
	{   
	
			$query = $this->db->query(" SELECT  * FROM  `news_feed`  
		
   								
       								 WHERE `news_feed`.`delete_bit`=0 
									ORDER BY news_feed_id DESC  ");
			return $query->result_array();		
//  INNER JOIN `users`   ON (`users`.`userid` = `news_feed`.`feed_by_id`)
	
		/*$this->db->order_by("feed_date", "desc");
		$this->db->limit(10);
		$query=$this->db->get('news_feed');
		//echo $this->db->last_query();
		return $query->result();*/
		
		
	}
	
	
	
	public function get_task()
	{   
	
		$this->db->select('task.name,task.deadline,task_id,task.task_status,task.task_piority,project.name AS project_name');
		$this->db->from('task');
		$this->db->where('task.delete_bit',0);
		$this->db->order_by("task.task_id", "desc");
		$this->db->join('project', 'task.project_id =project.project_id', 'inner');
		//$this->db->join('user_task', 'user_task.task_id =task.task_id', 'inner');
		//$this->db->join('users', 'users.userid =user_task.user_id', 'inner');
		$this->db->group_by('task.task_id'); 
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	
	}
	public function get_task_user($task_id)
	{   
		$this->db->select('users.fullname');
		$this->db->from('users');
	
		$this->db->join('user_task', 'user_task.user_id =users.userid', 'inner');
		//$this->db->join('users', 'users.userid =user_task.user_id', 'inner');
		$this->db->where('user_task.task_id', $task_id);
		$query = $this->db->get();
		$ab=array();
		foreach($query->result_array() as $da):
		$ab[]=$da['fullname'];
		endforeach;
		return $ab;
	
	}
	
	public function get_all_cutomers()
	{ 
		$query = $this->db->query("SELECT * FROM `cust` WHERE delete_bit=0 ORDER BY cust_date DESC; ");
		
		
		return $query->result_array();
	}
	
	public function get_latest_news($cut_id)
	{ 
		$query = $this->db->query("SELECT * FROM `news_feed` WHERE delete_bit=0 AND customer_id='".$cut_id."' ORDER BY news_feed_id DESC  LIMIT 1;
		");
		
		
		return $query->row();
	}
	
	public function get_user_certification($cust_id)
	{   
	
			$query = $this->db->query("SELECT * FROM `certificate`  WHERE delete_bit=0  AND  customer_id='".$cust_id."' ORDER BY  `certificate_id` DESC; ");
			return $query->row();		

		
		
	}
	
	
		public function get_task_arrachment($task_id)
		{   
		$query = $this->db->query("SELECT `task`.`task_id` , `attachement_task`.`attachement`   ,`task`.`delete_bit`   , `task`.`active_bit`
								FROM `task`
   								 INNER JOIN `attachement_task`    ON (`task`.`task_id` = `attachement_task`.`task_id`)
								 WHERE `task`.`delete_bit`=0 AND `task`.`active_bit`=1 AND `task`.`task_id`='".$task_id."'");
		$ab=array();
		
		foreach($query->result_array() as $da):
		$last3chars = substr($da['attachement'], -3);
		//echo $last3chars."<br>";
		if($last3chars=='ocx'){
			$ab[]="<a target='_blank' href='".base_url()."uploads/".$da['attachement']."'><i class='fa fa-file-word-o' aria-hidden='true'></i></a>";
			}elseif($last3chars=='jpg'){
				
			$ab[]="<a target='_blank' href='".base_url()."uploads/".$da['attachement']."'><i class='fa fa-file-image-o' aria-hidden='true'></i></a>";
			}elseif($last3chars=='pdf'){
			$ab[]="<a target='_blank' href='".base_url()."uploads/".$da['attachement']."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a>";	
				
			}else{
				$ab[]="<a target='_blank' href='".base_url()."uploads/".$da['attachement']."'><i class='fa fa-download' aria-hidden='true'></i></a>";
		
			} 
		//$ab[]="<a target='_blank' href='".base_url()."uploads/".$da['attachement']."'>". $da['attachement'] ."</a>";
		
		endforeach;
		
		
		return $ab;
	
	}
	
	
	
	public function get_user_task()
	{   
		$this->db->select('task.task_id,task.name,task.deadline,task.task_piority,task.task_status,users.fullname,task.delete_bit,project.name AS project_name');
		$this->db->from('task');
		$this->db->order_by("task.task_id", "desc");
		$this->db->join('project', 'task.project_id =project.project_id', 'inner');
		$this->db->join('user_task', 'user_task.task_id =task.task_id', 'inner');
		$this->db->join('users', 'users.userid=user_task.user_id', 'inner');
		$this->db->where('users.userid',$this->session->userdata('user_id'));
		$this->db->where('task.delete_bit',0);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
}

?>