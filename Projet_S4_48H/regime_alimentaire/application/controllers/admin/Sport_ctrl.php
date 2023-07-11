<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('Base_session_ctrl.php');
class Sport_ctrl extends Base_session_ctrl {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Sport');
        $this->load->model('admin/Regime');
    }

	// Liste des sports
	public function liste_sport()
	{
		$data['content'] = 'back_office/sport/liste_sport';
        $data['sports'] = $this-> Sport ->get_all_sport();
		$data['intervalles'] = $this -> Regime -> get_all_intervalle();
		$data['objectifs'] = $this -> Regime -> get_all_objectif();
		$fail = $this->input->get('fail');
		if(isset($fail)){
			$data['fail'] = 'Sport encore applique dans la base de donnee';
		}
		$this->load->view('back_office/main', $data);	
	}		

	// Modification d'une artiste
	public function modifing_sport(){
		$id = $this->input->post('sport_id');
		$nom = $this->input->post('name_sport');
		$objectif = $this->input->post('objectif_id');
		$intervalle_id = $this->input->post('id_intervalle');
		$duration = $this->input->post('regime_duration');

		$this -> Sport -> modifier_regime($id, $nom, $objectif, $intervalle_id, $duration, $price);
		redirect(base_url().'admin/Regime_ctrl/liste_regime');
	}

	// AJOUT regime page
	public function sport_ajout(){
		$data['intervalles'] = $this -> Regime -> get_all_intervalle();
		$data['objectifs'] = $this -> Regime -> get_all_objectif();
		$data['content'] = 'back_office/sport/ajout_sport';
		$this->load->view('back_office/main', $data);
	}

	// Ajout d'un nouveau regime
	public function adding_sport(){
		$nom = $this->input->post('name_sport');
		$objectif = $this->input->post('objectif_id');
		$intervalle_id = $this->input->post('id_intervalle');
		$duration = $this->input->post('regime_duration');

		$this -> Sport -> creer_regime($nom, $objectif, $intervalle_id, $duration, $price);
		redirect(base_url().'admin/Regime_ctrl/liste_sport');
	}

	// Supprimer artiste
	public function deleting_sport(){
		$id_artiste = $nom = $this->input->post('sport_id');
		$result = $this -> Artiste -> delete_regime($id_regime);
		if($result == 1){	// Already have some paintings
			redirect(base_url().'admin/Regime_ctrl/liste_regime?fail=0');
		} else {
			redirect(base_url().'admin/Regime_ctrl/liste_regime');
		}
	}
}