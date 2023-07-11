<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Session_ctrl extends CI_controller{

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('admin')){
            //redirect(base_url().'admin/Admin_ctrl');
         //  redirect(base_url().'Yohan/loaginPage');
        }else{
            if($this->session->userdata('admin') != 0){
           //    redirect(base_url().'Yohan/loaginPage');
            }
        }
    }
}

?>