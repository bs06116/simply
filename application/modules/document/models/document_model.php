<?php 
class Document_model extends CI_Model
{
	

	public function get_all_document(){
		$query = $this->db->query('SELECT document.id,document.file_name,document.name,doctype.name as doctypename FROM  document,doctype WHERE  doctype.id=document.document_type_id AND document.delete_bit=0');
		 return $query->result_array();
	}
    public function assign_document($user_id){
        $query = $this->db->query("SELECT document.id,document.file_name,document.name,document.document_type_id FROM  document,document_assign,doctype  WHERE 	document_assign.document_id=document.id    AND document_assign.user_id='$user_id' AND document.delete_bit=0 GROUP by document.id");
       //echo $this->db->last_query();
        return $query->result_array();
    }
    public function singe_document($certificate_id){
        $query = $this->db->query("SELECT id FROM  document WHERE 	certificate_id='$certificate_id' AND document.delete_bit=0");
        return $query->row('id');
    }
    public function filter_document($docment_type_id){
        if($docment_type_id==0){
            $query = $this->db->query('SELECT * FROM  document WHERE  document_type=1 AND delete_bit=0');
        }else{
            $query = $this->db->query('SELECT * FROM  document WHERE document_type_id="'.$docment_type_id.'"  AND document_type=1 AND delete_bit=0');
        }

        return $query->result_array();
    }

}


?>