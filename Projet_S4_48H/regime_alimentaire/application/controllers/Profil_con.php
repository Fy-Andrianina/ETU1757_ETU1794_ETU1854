<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
require_once(APPPATH . 'controllers/Session_controller.php');
class Profil_con extends Session_controller{

    public function __construct() {
        parent::__construct();
		$this->load->model('Utilisateur');
        $this -> load -> model('Regime');
    }
    
    // Page sur l'information de l'utilisateur
    public function index(){
        $data = array();
        $id_utilisateur = $this -> session -> userdata('idUser');
        $user = $this -> Utilisateur -> get_utilisateur_by_id($id_utilisateur);
        $info = $this -> Utilisateur -> get_utilisateur_information($id_utilisateur);
        $my_current_prestation = $this -> Regime -> get_regime_sport_client($id_utilisateur);

        $data['objectifs'] = $this -> Regime -> get_all_objectifs();
        $data['user'] = $user;
        $data['informations'] = $info;
        $data['current_information'] = $my_current_prestation;
        $data['content']="profile_view";
        $this->load->view('template_view',$data);
    }

    // Prendre le suivi des utilisateurs concernant leur taille/poids/objectif
    public function suivi_utilisateur(){
        $date = $this->input->post('date_suivi');
        $taille = $this->input->post('taille');
        $poids = $this->input->post('poids');
        $objectif_id = $this->input->post('objectif_id');
        $id_utilisateur = $this -> session -> userdata('idUser');

        $this -> Utilisateur -> modifier_utilisateur_information($id_utilisateur, $date, $objectif_id, $taille, $poids);
        redirect(base_url().'Profil_con/');
    }


}
?>