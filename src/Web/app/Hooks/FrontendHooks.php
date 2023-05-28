<?php


class FrontendHooks
{ 
  public function cleantemplate()
  {
	  
     $CI =& get_instance();
    $this->output = & $CI->output;
	
	
	$sectiuni=array("clswelcome"=>"clswelcome", "clsusers"=>"clsusers", "clsproducts"=>"clsproducts", "clsinfo"=>"clsinfo", "clsfaq"=>"clsfaq", "clsorders"=>"clsorders", "clsjobs"=>"clsjobs", "clsmisc"=>"clsmisc", "clsmessages"=>"clsmessages", "clsreports"=>"clsreports", "clspreq"=>"clspreq", "clsclasses"=>"clspreq", "clscategories"=>"clspreq", "clsitems"=>"clspreq", "clsproducts"=>"clspreq", "clsprofessional"=>"clsprofessional","clsspells"=>"clspreq", "clsgear_mastery"=>"clspreq", "clstickets"=>"clsmessages", "clsguides"=>"clsguides");

		$m="cls".$CI->router->fetch_class();
		
	foreach ($sectiuni as $k=>$v){
		if ($m==$k)
				$sectiuni[$v]="open";
		else			
			 if ($sectiuni[$v]!="open")	$sectiuni[$v]="";
	}
	$c=&get_instance();
  $c->load->library('session');
	//$session_userdata = $this->CI->session->userdata('logged_in');
	if ($c->session->userdata("tip_user")==0){
        $output =$this->output->get_output();
		$MENIU=$CI->parser->parse("template/meniu", $sectiuni, true);
		$output = str_replace('{MENIU}',$MENIU,$output);
		$HEADER=$CI->parser->parse("template/header.php",array(), true);
		$output = str_replace('{HEADER}',$HEADER,$output);
    }
	
	else if ($c->session->userdata("tip_user")==2){
		$output =$this->output->get_output();
		$MENIU1=$CI->parser->parse("template/meniu1", $sectiuni, true);
		$output = str_replace('{MENIU1}',$MENIU1,$output);	
		$HEADER1=$CI->parser->parse("template/header1.php",array(), true);
		$output = str_replace('{HEADER1}',$HEADER1,$output);
	}
	else {
		$output =$c->output->get_output();
		$MENIU2=$CI->parser->parse("template/meniu2", $sectiuni, true);
		$output = str_replace('{MENIU2}',$MENIU2,$output);		
		$HEADER2=$CI->parser->parse("template/header2.php",array(), true);
		$output = str_replace('{HEADER2}',$HEADER2,$output);
	}	
   
	
		
	$FOOTER=$CI->parser->parse("template/footer.php",array(), true);
	
	if(($CI->session->flashdata('message'))==""){
        $output = str_replace('{message}','',$output);
    }
    else {
        $output = str_replace('{message}',$CI->session->flashdata('message'),$output);
    }
	
    $output = str_replace('{FOOTER}',$FOOTER,$output);
	
	// cleaning...
    $output = str_replace('{SLIDER}','',$output);
    $output = str_replace('{JS_HEADER_SCRIPTS}','',$output);
    $output = str_replace('{TITLE}','OAC Pros',$output);
	$output = str_replace('{CONTENT}','',$output);
	$output = str_replace('{ERROR_MSG}','',$output);
	
	$output = str_replace('{YEAR}',date("Y"),$output);
	
 
 	$site_url = SITE_URL;
    $base_url = BASE_URL;

	$output = str_replace('{BASE_URL}/',$base_url,$output);
    $output = str_replace('{BASE_URL}',$base_url,$output);
    $output = str_replace('{SITE_URL}',$site_url,$output);
	
    //$output = preg_replace('#\{.*?\}#s',"",$output);
    $this->output->set_output($output);
  }
  
 
}

?>