<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()     
	{         
		parent::__construct();       
		if ($this->session->userdata("isLoggedIn")==false) redirect('login');
		//$this->load->model("raport");
     
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){	
		
		$TITLE="Acasa";
		//$stats=$this->db->get("stats")->result();
		$st=array();
		//foreach ($stats as $s)
		//$st[$s->stat_name]=$s->stat_value;
		
	
		$data = array(
				    	"TITLE"=>$TITLE,
						"CONTENT"=>$this->parser->parse("template/dashboard", $st, true)
					 );
		
		$this->parser->parse("template/full-width",$data);			
	}
}
