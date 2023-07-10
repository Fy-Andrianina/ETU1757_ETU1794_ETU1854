<?php
if (!defined('BASEPATH')) exit ('No direct script access allowed');
class Login_con extends CI_Controller{

    public function index(){
        if($this->session->flashdata('error')!=null){
            $data=array();
            $data['error']=$this->session->flashdata('error');
            $this->load->view("login_view",$data);
        }else{
            $this->load->view("login_view");
        }
    }

    //function which checks the loging send by the user
    public function check_login(){
        $email=$this->input->post("email");
        $password=$this->input->post("password");

        $this->load->model("login_mod");
        $checked=$this->login_mod->check_login($email,$password);
        if($checked!=null){
            if($checked['isadmin']==0){ // check if admin 
                redirect(site_url('back')); //lead to back-office
            }else{ //if not admin
                redirect(site_url('front')); //lead to front-office
            }
            
        }else if(empty($name) || empty($password)){
            $error="Please complete all the input";
            $data['error']=$this->session->flashdata('error');
            redirect(site_url("login_con"));
        }else{
            $error="Check your e-mail or your password";
            $this->session->set_flashdata('error',$error);
            redirect(site_url("login_con"));
        }
    }

    //function which leads to the sign in form
    public function sign_in(){
        $data=array();

        $this->load->model("login_mod");
        $data['sexe']=$this->login_mod->getAllSexe();

        if($this->session->flashdata('error')!=null && $this->session->flashdata('defaultData')!=null ){
            $data=array();
            $data['error']=$this->session->flashdata('error');
            $data['defaultData']=$this->session->flashdata('defaultData');
        }
        $this->load->view("sign_view",$data);
    }

    //function which inserts the informations of the users
    public function insertNewUser(){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');
        $sexe = $this->input->post('sexe');

        $data=array();
        $data['name']=$name;
        $data['email']=$email;
        $data['sexe']=$sexe;

        if(!empty($name) && !empty($email) && !empty($password1) && !empty($password2)){
            $this->load->model("login_mod");
            $password1=$this->Trait->traitWord($password1);
            $password2=$this->Trait->traitWord($password2);
            if($password1 != $password2){
                $error = "The second password should be similate to the fisrt";
                $data['error']=$this->session->flashdata('error');
                $this->session->set_flashdata('defaultData',$data);
                redirect(site_url('login_con/sign_in'));
            }

            $this->load->helper('Trait');
            $name=$this->Trait->traitWord($name);
            $email=$this->Trait->traitWord($email);

            $this->login_mod->insert($name,$email,$password,$sexe);
            redirect(site_url('login_con'));
        }else{
            $error="Please complete all the input";
            $data['error']=$this->session->flashdata('error');
            $this->session->set_flashdata('defaultData',$data);
            redirect(site_url('login_con/sign_in'));
        }
        
    }
}


?>