<?php
Class Courses_model extends CI_Model{
   	function get_course($id_lista_curs){
		$curs=$this -> db -> query('select * from cursuri where id="'.$id_lista_curs.'"');
 
		if($curs -> num_rows() ) {
			return $curs->row();
		}
		else {
			return false;
		}
	}
    
    function suspend_course($id_lista_curs){
        $sql="UPDATE `lista_cursuri` SET `course_status` = '0' WHERE `lista_cursuri`.`id_lista_curs` =".$id_lista_curs;
        $users=$this->db->query($sql);
    }
	
	function delete_course($id_lista_curs){
        $sql="delete from `lista_cursuri` WHERE `lista_cursuri`.`id_lista_curs` =".$id_lista_curs;
        $users=$this->db->query($sql);
    }
    
	
	function get_all_courses(){			
			$sql="select * from cursuri";	
			$projects=$this->db->query($sql)->result();
			
			return $projects;
		} 
		
	function get_courses_by_prof($cnp){			
			$sql="select * from cursuri_profesori left join cursuri on cursuri_profesori.id_curs=cursuri.id where id_profesor=".$cnp;	
			$projects=$this->db->query($sql)->result();
			
			return $projects;
		} 
		function get_courses_by_student($cnp){			
			$sql="SELECT 
					* from cursuri_studenti
					LEFT JOIN cursuri
					ON cursuri_studenti.id_curs=cursuri.id
					WHERE cursuri_studenti.id_student=".$cnp;
				  
			$projects=$this->db->query($sql)->result();
			//print_r( $projects);
			return $projects;
		} 
		
		function get_restante_by_student($cnp){			
			$sql="SELECT 
					* from cursuri_studenti
					LEFT JOIN cursuri
					ON cursuri_studenti.id_curs=cursuri.id
					WHERE cursuri_studenti.id_student=".$cnp." AND cursuri_studenti.nota_finala<5";
				  
			$projects=$this->db->query($sql)->result();
			//print_r( $projects);
			return $projects;
		} 
		function get_chitante_by_student($cnp){			
			$sql="SELECT 
					* from plati
					
					WHERE plati.id_student=".$cnp;
				  
			$projects=$this->db->query($sql)->result();
	
			return $projects;
		}
		
		function get_chitanta_by_id($id_plata){			
			$sql="SELECT 
					* from plati
					LEFT JOIN studenti
					ON plati.id_student=studenti.cnp					
					WHERE plati.id_plata=".$id_plata;
				  
			$projects=$this->db->query($sql)->result();
		
			return $projects;
		}
		
		function get_stat_de_plata_by_cnp($cnp){			
			$sql="SELECT 
					* from cursuri_profesori
					LEFT JOIN profesori
					ON cursuri_profesori.id_profesor=profesori.cnp	
					LEFT JOIN cursuri
					ON cursuri_profesori.id_curs=cursuri.id
					WHERE cursuri_profesori.id_profesor=".$cnp;
				  
			$projects=$this->db->query($sql)->result();
			//print_r( $projects);
			return $projects;
		}
		
}