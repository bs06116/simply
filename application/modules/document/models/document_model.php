<?php 
class Document_model extends CI_Model
{
	

	public function get_all_document(){
		$query = $this->db->query('SELECT * FROM  document WHERE delete_bit=0');
		 return $query->result_array();
	}
    public function assign_document($user_id){
        $query = $this->db->query("SELECT * FROM  document,document_assign WHERE 	document_assign.document_id=document.id AND document_assign.user_id='$user_id' AND document.delete_bit=0");
        return $query->result_array();
    }
	

}


?>