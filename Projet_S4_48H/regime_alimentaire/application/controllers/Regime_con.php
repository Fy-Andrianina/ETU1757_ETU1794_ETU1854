<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
require_once(APPPATH . 'controllers/Session_controller.php');
class Regime_con extends Session_controller{

    public function __construct() {
        parent::__construct();
		$this->load->model('Utilisateur');
        $this->load->model('Regime');
    }

    // Page des suggestions des regimes pour le client
    public function index(){
        $data=array();
        $data['content']="regime_view";

        $id_utilisateur = $this -> session -> userdata('idUser');
        $this -> load -> model('Regime');
        $this -> load -> model('Sport');
        $regimes = $this -> Regime -> get_regimes_pour_client($id_utilisateur);
        $sports = $this -> Sport -> get_sports_pour_client($id_utilisateur);
        $data['regimes'] = $regimes;
        $data['sports'] = $sports;
        $this->load->view('template_view',$data);
    }

    // CHoisir un regime pour un utilisateur
    public function choose_regime_sport(){
       
        $id_regime = $this->input->post('regime_id');
        $id_utilisateur = $this -> session -> userdata('idUser');
        $id_sport = $this->input->post('sport_id');
        $can_buy = $this -> Utilisateur -> peut_acheter($id_utilisateur, $id_regime);
        if($can_buy == true){
            $this -> Regime -> choisir_prestation($id_utilisateur, $id_regime, $id_sport);
            redirect(base_url()."Regime_con/");
        } else {
            $fail = "Achat impossible"; // The value of the fail variable
            // Encode the fail variable
            $encodedFail = urlencode($fail);
            redirect(base_url()."Regime_con/index/?fail={$encodedFail}");
        }
        
    }
}
?>