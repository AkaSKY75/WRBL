<?php
Class Mail_pages extends CI_Model{
   	function get_mail($id_email){
		$this -> db -> select('*');
		$this -> db -> from('mails');
		$this -> db -> where('id_email', $id_email);
		$page = $this -> db -> get();
 
		if($page -> num_rows()) {
			return $page->row();
		}
		else {
			return false;
		}
	}    
	/*functiile care pun variabilele din baza de date*/
	 /*   function get_text($seo_url){
		$rw=$this->db->query("select info_content from info where seo_url='".$seo_url."'")->row();
		return $rw->info_content;
	}
	
		function get_value($name){
		$rw=$this->db->query("select value from values_settings where name='".$name."'")->row();
		return $rw->value;
	}
        function get_role($role){
		$rw=$this->db->query("select role_name from roles where id_role='".$role."'")->row();
		return $rw->role_name;
	}
    function get_image($link){
		$rw=$this->db->query("select role_photo from roles where id_role='".$role."'")->row();
		return $rw->role_photo;
	}
	
	function get_page_variables($page){
		return $this->db->query("Select seo_url, info_content from info where page='".$page."'")->result();
	}
	
	function get_settings($page){
		return $this->db->query("Select name, value from values_settings where page='".$page."'")->result();
	}
       */ 
}