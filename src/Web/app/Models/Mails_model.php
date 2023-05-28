<?php
Class Mails_model extends CI_Model{
	
	
	function send_mail_all_users($message, $subject){		
		$this->load->library('email');
		$users=$this->db->query("select email from users")->result();   	
				foreach($users as $u){
				$this->email->from(ADMINEMAIL);
				$this->email->to($u->email); 
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
				}
		
		return true;
	}
	
	function send_mail($email, $mesaj, $subject){		
		$this->load->library('email');				
				$this->email->from(ADMINEMAIL);
				$this->email->to($email); 
				$this->email->subject($subject);
				$this->email->message($mesaj);
				$this->email->send();
				
		
		return true;
	}
	
}