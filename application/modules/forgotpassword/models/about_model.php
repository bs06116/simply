<?php 
class About_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function aboutus_pages($id)
	{	
		$this->db->where('status',1);	
		$this->db->where('parent_bit',$id);	
		$query=$this->db->get('static_pages');	
		return $query->result_array();
	}
	
	public function page_detail($page_id)
	{
		//$this->db->where('status',1);	
		$this->db->where('id',$page_id);	
		$query=$this->db->get('static_pages');	
		return $query->row();	
	}
	
	
	public function page_title($page_id)
	{
		//$this->db->where('status',1);	
		$this->db->where('id',$page_id);	
		$query=$this->db->get('static_pages');	
		return $query->row();	
	}
	
	
	/*
	
	public function get_all_aboutus()
	{	
		$query=$this->db->get('static_pages');	
		return $query->result_array();
	}
	
	
	
	public function get_parent_count($parent_id)
	{	
		$this->db->select('count(*) as child_count');
		$this->db->where('parent_bit',$parent_id);	
		$query=$this->db->get('static_pages');	
		return $query->row();
	}
	*/
	
}

?>