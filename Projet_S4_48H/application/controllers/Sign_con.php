<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
require_once(APPPATH . 'controllers/Session_controller.php');
class Sign_con extends Session_controller{
    public function index(){
        $data=array();
        $data['content']='sign_view';
        $this->load->view('sign_view');
    }
}
?>