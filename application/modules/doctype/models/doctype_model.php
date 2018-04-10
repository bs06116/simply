<?php 
class Doctype_model extends CI_Model
{
	

	public function check_doctype_exist($doctype_name){

        $this->db->where('name',$doctype_name);

        $this->db->where('delete_bit', 0);
        $this->db->from('doctype');
        return $this->db->count_all_results();

	}
    public function update_check_doctype_exist($doctype_name,$id){


        $this->db->where('name',$doctype_name);
        $this->db->where('id !=',$id);
        $this->db->where('delete_bit', 0);
        $this->db->from('doctype');
        return $this->db->count_all_results();

    }

	

}


?>