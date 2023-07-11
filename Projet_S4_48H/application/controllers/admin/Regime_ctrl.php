<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('Base_session_ctrl.php');
class Regime_ctrl extends Base_session_ctrl {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Regime');
    }

	// Liste des artistes
	public function liste_regime()
	{
		$data['content'] = 'back_office/regime/liste_regime';
        $data['regimes'] = $this-> Regime ->get_all_regime();
		$data['intervalles'] = $this -> Regime -> get_all_intervalle();
		$data['objectifs'] = $this -> Regime -> get_all_objectif();
		$fail = $this->input->get('fail');
		if(isset($fail)){
			$data['fail'] = 'Regime encore utilise dans la base de donnee';
		}
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

		$this -> Artiste -> modifier_regime($id, $nom, $objectif, $intervalle_id, $duration, $price);
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
		$intervalle_id = $this->input->post('id_intervalle');
		$duration = $this->input->post('regime_duration');
		$price = $this->input->post('regime_price');

		$this -> Artiste -> creer_regime($nom, $objectif, $intervalle_id, $duration, $price);
		redirect(base_url().'admin/Regime_ctrl/liste_regime');
	}

	// Supprimer artiste
	public function deleting_regime(){
		$id_artiste = $nom = $this->input->post('regime_id');
		$result = $this -> Artiste -> delete_regime($id_regime);
		if($result == 1){	// Already have some paintings
			redirect(base_url().'admin/Regime_ctrl/liste_regime?fail=0');
		} else {
			redirect(base_url().'admin/Regime_ctrl/liste_regime');
		}
	}
}