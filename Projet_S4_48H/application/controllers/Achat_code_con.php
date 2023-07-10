<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
require_once(APPPATH . 'controllers/Session_controller.php');
class Achat_code_con extends Session_controller{
    public function index(){
        $data=array();
        $data['content']='achat_code_view';
        $this->load->view('template_view',$data);
    }
}
?>