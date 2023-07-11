<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur_con extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Utilisateur');
    }

    // CHANGING OFFRE
    public function change_to_gold(){
        $id_utilisateur = $this -> session -> userdata('idUser');
        $id_status = $this -> input -> post('status_id');

        $result = $this -> Utilisateur -> changer_offre_utilisateur($id_utilisateur, $id_status);

        if($result == 1){
            redirect(base_url().'Login_con/');
        } else {
            $fail = " Veuillez acheter credit pour votre portfeuille "; // The value of the fail variable
            // Encode the fail variable
            $encodedFail = urlencode($fail);
            redirect(base_url()."Achat_code_con/index/?fail={$encodedFail}");
        }
    }

    // INSCRIPTION D'UNE CLIENT
	public function inscription()
	{
        try {
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $email = $this->input->post('email');
            $date_naissance = $this->input->post('date_naissance');
            $is_admin = 0;
            $genre = $this->input->post('genre');
            $mdp = $this->input->post('mdp');

            $this->Utilisateur->inscription($nom,$prenom,$email,$is_admin,$date_naissance,$genre,$mdp);

            $email=$this->input->post("email");
            $password=$this->input->post("mdp");

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
                redirect(site_url('Profil_con')); //lead to front-office 
            }else{
                $error="Check your e-mail or your password";
                echo $error;
                $this->session->set_flashdata('error',$error);
            redirect(site_url("login_con"));
            }
            
            // redirect('Profil_con');   
        } catch (Exception $e) {
            throw $e;
        }
	}		
}
