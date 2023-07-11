<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('Base_session_ctrl.php');
class Admin_ctrl extends Base_session_ctrl {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
        parent::__construct();
        $this->load->model('admin/Dashboard');
		$this->load->model('admin/Code');
		$this -> load -> model('Utilisateur');
    }

	// Main
	public function index()
	{
		$this->load->model('admin/Regime_mod');
		$data['content'] = 'back_office/home';
		$data['demandes'] = $this -> Code -> get_all_demande_code();
		$data['classement']=$this->Regime_mod->getClassementRegime();
		$data['objectif']=$this->Regime_mod->get_repartition_objectif();
		$data['users'] = $this -> Utilisateur -> nombre_utilisateurs();
		$data['ca'] = $this -> Utilisateur -> chiffre_affaire();
		$annee=2023;
		if($this->input->post('annee')!=null){
			$annee=$this->input->post('annee');
		}
			
		
		$data['chiffre_affaire']=$this->chiffre_par_mois($annee);
		$this->load->view('back_office/main', $data);
	}
	public function chiffre_par_mois($annee){
        $this->load->model('admin/Regime_mod');
        $data['content']="chiffreaffaire_view";
        $data['chiffre_affaire'] = $this->Regime_mod->get_chiffreaffaire_parmois($annee);

        $somme_entrer=$this->get_somme_entrer($data['chiffre_affaire']);
        $data['somme_entrer'] = number_format($somme_entrer, 0, ',', ' ');

        $somme_sortie=$this->get_somme_sortie($data['chiffre_affaire']);
        $data['somme_sortie'] = number_format($somme_sortie, 0, ',', ' ');
        $data['montant'] = number_format($somme_entrer - $somme_sortie, 0, ',', ' ');
        return $data;
    }
    public function get_somme_entrer($data){
        $so=0;
        for ($i=0; $i <count($data) ; $i++) { 
           $so=$data[$i]['montant_entrer']+$so;
        }
        return $so;
    }
    public function get_somme_sortie($data){
        $so=0;
        for ($i=0; $i <count($data) ; $i++) { 
           $so=$data[$i]['montant_sortie']+$so;
        }
        return $so;
    }		


	public function deconnect(){
		$this->session->sess_destroy();
		redirect(base_url().'login_con/login_admin');
	}

	
}
