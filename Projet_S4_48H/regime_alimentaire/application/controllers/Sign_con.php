<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
require_once(APPPATH . 'controllers/Session_controller.php');

class Sign_con extends CI_Controller{

    public function index(){
        $data=array();
        $data['content']='sign_view';
        $this->load->view('sign_view');
    }

	public function deconnect(){
		$this->session->sess_destroy();
		redirect(base_url().'Login_con/');
	}
}


?>