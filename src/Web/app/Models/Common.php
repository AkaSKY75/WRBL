<?php class Common extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


     function message_done($message)
    {
        $this->session->set_flashdata('message','<div class="alert alert-success" id="msg_done">'.$message.'</div>');
    }
    function message_error($message)
    {
        $this->session->set_flashdata('message','<div class="alert alert-warning" id="err">'.$message.'</div>');
    }
    function message_info($message)
    {
        $this->session->set_flashdata('message','<div class="alert alert-info" id="msg_info">'.$message.'</div>');
    }
    function message_warn($message)
    {
        $this->session->set_flashdata('message','<div class="alert alert-warning" id="msg_warning">'.$message.'</div>');
    }
	function get_textarea($name)
    {
        $data = str_replace("../","",$this->input->post($name));
        $data =  str_replace("tinymce","{BASE_URL}/tinymce",$data);
        return $data;
    }
	/*function send_mail($email,$id_mail)
	{
		
        $this->email->from(ADMINEMAIL, "OAC PROS");
        $this->email->to($email); 
        $this->email->subject('You have been accepted');
        $this->email->message($msg);	
        //$this->email->send();
        $this->email->send();
	}*/
	function data_pentru_bd($data){
		$data=str_replace("/","-",$data);
		return date("Y-m-d", strtotime($data));
	}
	
	//pt uk
	function data_din_bd($data){
		return date("m/d/Y H:i:s", strtotime($data));
	}
	
	   
}