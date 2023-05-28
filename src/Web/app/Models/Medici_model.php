<?php
Class Medici_model extends CI_Model{
   	/*function get_pacient($cnp){
		$user=$this -> db -> query('select u.*,  d.nume as nume_doctor, d.prenume as prenume_doctor, d.CNP as cnp_doc
		from studenti u
		
		
		left join profesori d on d.CNP=u.CNP_doctor
		where u.CNP="'.$cnp.'"
		');
		
		if($user -> num_rows() ) {
			return $user->row();
		}
		else {
			return false;
		}
	}*/
	
	function get_pacient($cnp){
		$user=$this -> db -> query('select d.*
		from pacienti d
		where d.CNP="'.$cnp.'"');

		if($user -> num_rows() ) {
			return $user->row();
		}
		else {
			return false;
		}
	}
	
	function get_consult($id_consult){
		$user=$this -> db -> query('select c.*, d.*, p.* from consultatii c
		left join diagnostic d on c.diagnostic=d.cod_diagnostic
		left join pacienti p on c.id_pacient=p.cnp
		where c.id_consult='.$id_consult);

		if($user -> num_rows() ) {
			return $user->row();
		}
		else {
			return false;
		}
	}
	
	function get_medic($id_medic){
		$user=$this -> db -> query('select d.*
		from medici d
		where d.id_medic="'.$id_medic.'"');

		if($user -> num_rows() ) {
			return $user->row();
		}
		else {
			return false;
		}
	}
	
	function get_medic_by_cnp($cnp){
		$user=$this -> db -> query('select d.*
		from medici d
		where d.cnp="'.$cnp.'"');

		if($user -> num_rows() ) {
			return $user->row();
		}
		else {
			return false;
		}
	}
	
	function get_diagnostice_by_pacient($cnp){
		$user=$this -> db -> query('select d.*, c.*
		from istoric_diagnostic_pacient d		
		left join diagnostic c on c.cod_diagnostic=d.cod_diagnostic
		
		where d.cnp="'.$cnp.'"
		order by d.data_diagnostic desc');

		if($user -> num_rows() ) {
			return $user->result();
		}
		else {
			return false;
		}
	}
    
	function delete_pacient($cnp){
        $sql="delete from `studenti` WHERE `studenti`.`cnp` =".$cnp;
        $users=$this->db->query($sql);
    }
	
	function delete_doctor($cnp){
        $sql="delete from `profesori` WHERE `profesori`.`cnp` =".$cnp;
        $users=$this->db->query($sql);
    }
	
    function suspend_user($id_user){
        $sql="UPDATE `users` SET `id_user_status` = '3' WHERE `users`.`id_user` =".$id_user;
        $users=$this->db->query($sql);
    }
    
	function get_all_medici(){			
			$sql="select * from medici";	
			$projects=$this->db->query($sql)->result();
			//print_r($projects);
			return $projects;
		} 
		
		function get_all_diagnostice(){			
			$sql="select * from diagnostic";	
			$projects=$this->db->query($sql)->result();
			//print_r($projects);
			return $projects;
		} 
		
		function get_all_consultatii_pacient($cnp){			
			$sql="select c.*, d.* from consultatii c
			left join diagnostic d on c.diagnostic=d.cod_diagnostic
			where c.id_pacient=".$cnp."
			order by c.data_consult desc";	
			
			$projects=$this->db->query($sql)->result();
			//print_r($projects);
			return $projects;
		} 
		
		function get_all_users_plata_integrala(){			
			$sql="select * from studenti where taxa_platita>0";	
			$projects=$this->db->query($sql)->result();
			
			return $projects;
		}
		function get_all_users_plata_restanta(){			
			$sql="select * from studenti where taxa_restanta>0";	
			$projects=$this->db->query($sql)->result();
			
			return $projects;
		}
	function get_all_users_integralisti(){			
			$sql="select * from studenti where nr_restante=0";	
			$projects=$this->db->query($sql)->result();
			
			return $projects;
		} 
	function get_all_users_restantieri(){			
			$sql="select * from studenti where nr_restante>0";	
			$projects=$this->db->query($sql)->result();
			
			return $projects;
		} 
		
	function get_all_users1(){			
			$sql="select * from profesori";	
			$projects=$this->db->query($sql)->result();
			
			return $projects;
		} 
		
	function login($username,$password){
		//print_r($username); 
		//print_r(MD5($password)); 
		$this -> db -> select('* ');
		$this -> db -> from('user');
		$this -> db -> where('email', $username);
		$this -> db -> where('parola', MD5($password));
		$this -> db -> limit(1);
		$query = $this -> db -> get()->result();
		if(sizeof($query) == 1){
			$this->details=$query[0];
			$this->session->set_userdata( array(				
				'id_user'=>$this->details->id_user,
				'email'=> $this->details->email,
				'tip_user'=>$this->details->tip_user,				
				'isLoggedIn'=>true
			)
			);
			
		
			return true;
		}
		
		else return false;
	}
 
 function get_all_sellers(){			
			$sql="select id_user, username, first_name, last_name, email, id_user_status from users where id_user_status=1 or id_user_status=4";	
			$projects=$this->db->query($sql)->result();
			return $projects;
		} 
		
}