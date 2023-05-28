<?php
Class Info_pages extends CI_Model{
   	function get_page($seo_url){
		$this -> db -> select('*');
		$this -> db -> from('info');
		$this -> db -> where('seo_url', $seo_url);
		$page = $this -> db -> get();
 
		if($page -> num_rows() ) {
			return $page->row();
		}
		else {
			return false;
		}
	}

	function get_all_pages(){
			return $this -> db -> get("info")->result();
		} 
}