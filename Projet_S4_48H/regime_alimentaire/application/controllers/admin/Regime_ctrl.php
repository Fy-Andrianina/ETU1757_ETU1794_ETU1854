<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('Base_session_ctrl.php');
class Regime_ctrl extends Base_session_ctrl {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Regime');
    }

	public function deleting_regime(){
		$id = $this->input->post('regime_id');
		$can_delete = $this -> Regime -> can_delete_regime($id);

		if($can_delete == true){
			$this -> Regime -> delete_regime($id_regime);
			redirect(base_url().'admin/Regime_ctrl/liste_regime');
		} else {
			$fail = "Impossible de supprimer, est encore utilise dans la db"; // The value of the fail variable
            // Encode the fail variable
            $encodedFail = urlencode($fail);
            redirect(base_url()."admin/Regime_ctrl/liste_regime/?fail={$encodedFail}");
		}
	}

	// Liste des artistes
	public function liste_regime()
	{
		$data['content'] = 'back_office/regime/liste_regime';
        $data['regimes'] = $this-> Regime ->get_all_regime();
		$data['intervalles'] = $this -> Regime -> get_all_intervalle();
		$data['objectifs'] = $this -> Regime -> get_all_objectif();
		$this->load->view('back_office/main', $data);	
	}		

	// Modification d'une artiste
	public function modifing_regime(){
		$id = $this->input->post('regime_id');
		$nom = $this->input->post('name_regime');
		$objectif = $this->input->post('objectif_id');
		$intervalle_id = $this->input->post('id_intervalle');
		$duration = $this->input->post('regime_duration');
		$price = $this->input->post('regime_price');

		$this -> Regime -> modifier_regime($id, $nom, $objectif, $intervalle_id, $duration, $price);
		redirect(base_url().'admin/Regime_ctrl/liste_regime');
	}

	// AJOUT regime page
	public function regime_ajout(){
		$data['intervalles'] = $this -> Regime -> get_all_intervalle();
		$data['objectifs'] = $this -> Regime -> get_all_objectif();
		$data['content'] = 'back_office/regime/ajout_regime';
		$this->load->view('back_office/main', $data);
	}

	// Ajout d'un nouveau regime
	public function adding_regime(){
		$nom = $this->input->post('name_regime');
		$objectif = $this->input->post('objectif_id');
		$intervalle_id = $this->input->post('intervalle_id');
		$duration = $this->input->post('regime_duration');
		$price = $this->input->post('regime_price');

		$this -> Regime -> creer_regime($nom, $objectif, $intervalle_id, $duration, $price);
		redirect(base_url().'admin/Regime_ctrl/liste_regime');
	}
}