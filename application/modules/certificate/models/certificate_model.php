<?php 
class Certificate_model extends CI_Model
{
	
	public function get_last_row()
	{
			$query =$this->db->query("SELECT cert_code,certificate_id FROM certificate ORDER BY cert_code DESC LIMIT 1");
			return $query->row();
			//$query =$this->db->query("SELECT certificate_id FROM certificate ORDER BY certificate_id DESC LIMIT 1");
			//return $query->row('certificate_id');
	}
public function get_product_data($p_id){
		 $query = $this->db->query('SELECT * FROM   products WHERE identification like "%'.$p_id.'%" and  delete_bit=0');
//echo  $this->db->last_query();
		   return $query->result_array();
	}
	public function get_certificate_data($cert_id){
		$this->db->select('certificate.*,products.*');
		$this->db->from('certificate');
		$this->db->join('products', 'products.products_id = certificate.products_id', 'inner');
		
		$this->db->where('certificate.certificate_id', $cert_id);	
		 $query = $this->db->get();
		 //echo  $this->db->last_query();
		return $query->row();
	}
	public function get_customer($name){
		$query = $this->db->query('SELECT * FROM  cust WHERE person like "%'.$name.'%" and  delete_bit=0');
		 return $query->result_array();
	}
	
	
	public function get_all_certificate(){
		$query = $this->db->query("SELECT  * FROM `certificate`
									INNER JOIN `products` ON (`certificate`.`products_id` = `products`.`products_id`) 
									WHERE `certificate`.`delete_bit`=0 AND `products`.`delete_bit`=0");
		 return $query->result_array();
	}
	
	
	public function get_all_certificate_by_id(){
		/*$query = $this->db->query("SELECT  * FROM `certificate`
									INNER JOIN `products` ON (`certificate`.`products_id` = `products`.`products_id`) 
									WHERE `certificate`.`delete_bit`=0 AND `products`.`delete_bit`=0 AND `certificate`.customer_id='".$this->session->userdata('user_id')."' ");
								//echo	$this->db->last_query();
		 return $query->result_array();*/
		$customer = $this->db->query("SELECT * FROM `user_custtomers` where user_id = '".$this->session->userdata('user_id')."'");
		$cus_id = $customer->row();
		if(isset($cus_id->customer_id)){
	    $cus_id->customer_id;
		$query = $this->db->query("SELECT  * FROM `certificate`
									INNER JOIN `products` ON (`certificate`.`products_id` = `products`.`products_id`) 
									WHERE `certificate`.`delete_bit`=0 AND `products`.`delete_bit`=0 AND `certificate`.customer_id='".$cus_id->customer_id."' ");
								//echo	$this->db->last_query();
		 return $query->result_array();}
	}
	
	
	/*
	public function get_customer_data($customer_id){
	$query = $this->db->query('SELECT * FROM  cust,cust_address WHERE ');
		 return $query->row();
	}*/
	
	
		public function get_customer_data($customer_id){
		$this->db->select('cust.account,cust.cust_id,cust_address.city');
		$this->db->from('cust');
		$this->db->join('cust_address', 'cust_address.cust_id = cust.cust_id', 'inner');
		
		$this->db->where('cust.cust_id', $customer_id);
		$this->db->where('cust.delete_bit',0);	
		//$this->db->group_by('cust.cust_id');	
		 $query = $this->db->get();
	  //echo  $this->db->last_query();
		return $query->row();
	}
	
	/////////////////////////END TEAMLEAD//////////////////////////
	
	public function get_new_feed($customer_id){
		$query = $this->db->query('SELECT * FROM  news_feed WHERE customer_id="'.$customer_id.'" ORDER BY news_feed_id DESC' );
		 return $query->result_array();
	}
	
	
	public function update_cus_date($customer_id,$updated_date)
		{
			
			$this->db->set('cust_date', $updated_date);
			$this->db->where('cust_id', $customer_id);
			$this->db->update('cust'); 
			
			
			return $this->db->affected_rows();		
		}
	
		public function update_product_qality($id,$data)
		{
			//$this->db->where($colum, $id);
			$this->db->where('products_id', $id);
			$this->db->update('products',$data); 
			//echo $this->db->affected_rows();
			//exit;
			
			return $this->db->affected_rows();		//$this->db->where($colum, $id);
			$this->db->where('products_id', $id);
			$this->db->update('products',$data); 
			//echo $this->db->affected_rows();
			//exit;
			
			return $this->db->affected_rows();		
		}
}


?>