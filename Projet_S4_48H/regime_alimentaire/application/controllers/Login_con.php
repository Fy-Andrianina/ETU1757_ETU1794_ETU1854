<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');
class Login_con extends CI_Controller{

    // Page d'acceuil
    public function index(){
        if($this->session->flashdata('error')!=null){
            $data=array();
            $data['error']=$this->session->flashdata('error');
            $this->load->view("login_view",$data);
        }else{
            $this->load->view("login_view");
        }
    }

    // Prendre la page de login de l'admin
    public function login_admin(){
        if($this->session->flashdata('error')!=null){
            $data=array();
            $data['error']=$this->session->flashdata('error');
            $this->load->view("login_admin_view",$data);
        }else{
            $this->load->view("login_admin_view");
        }
    }

    // Checking connecion de l'utilisateur
    public function check_login_user(){
        $email=$this->input->post("email");
        $password=$this->input->post("password");

        $this->load->model("login_mod");
        if(empty($email) || empty($password)){
            $error="Please complete all the input";
            echo $error."".$email;
            $data['error']=$this->session->flashdata('error');
           redirect(site_url("login_con"));
        }

        $checked=$this->login_mod->check_login($email,$password);
        if($checked!=null){
            $this->session->set_userdata('idUser',$checked['id_utilisateur']);
            redirect(site_url('landing_con')); //lead to front-office 
        }else{
            $error="Check your e-mail or your password";
            echo $error;
            $this->session->set_flashdata('error',$error);
           redirect(site_url("login_con"));
        }
    }
    
    //  Checking connecion de l'admin
    public function check_login_admin(){
        $email=$this->input->post("email");
        $password=$this->input->post("password");

        if(empty($email) || empty($password)){
            $error="Please complete all the input";
            echo $error;
            $data['error']=$this->session->flashdata('error');
           redirect(site_url("login_con/login_admin"));
        }

        $this->load->model("login_mod");
        $checked=$this->login_mod->check_login_admin($email,$password);
        if($checked!=null){
            $this->session->set_userdata('idUser',$checked['id_utilisateur']);
            redirect(site_url('admin/Admin_ctrl')); //lead to front-office
            
        } else{
            $error="Check your e-mail or your password";
            $this->session->set_flashdata('error',$error);
           redirect(site_url("login_con/login_admin"));
        }
    }
    

    
}


?>