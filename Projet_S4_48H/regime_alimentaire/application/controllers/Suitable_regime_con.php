<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
require_once(APPPATH . 'controllers/Session_controller.php');
class Suitable_regime_con extends Session_controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Utilisateur');
        $this->load->model('Regime');
    }
    public function index(){
        $id_user=$this->session->userdata('idUser');
        $userInfo = $this->Utilisateur->get_utilisateur_information($id_user);
        $IMC = 21.7;
        $poids = $this->get_poids_ideal($IMC,$userInfo['taille']);
        echo $poids;
        $poids_diff = $userInfo['poids'] - $poids;
        $regime = null;
        if($poids_diff < 0){
            $regime = $this->Regime->get_suitable_regime($poids_diff,1);//augmenter de $poids_diff
        }else if($poids_diff > 0){
            $regime = $this->Regime->get_suitable_regime($poids_diff,-1);//diminuer de $poids_diff
        }
       // echo var_dump($regime) ." poids diff".$poids_diff." user info ".$userInfo['taille']." poids ".$poids;
        
        $data=array();
        $data['content']="imc_view";
        $data['regime'] = $regime;
        $data['poids_diff'] = $poids_diff;
        $data['IMC'] = $IMC;
        $data['poids'] = $poids;

        $this->load->view('template_view',$data);
        
    }
    // prends le poids en fonction de la taille et de la plage d'IMC considerer comme etant saine
    public function get_poids_ideal($IMC,$taille){
        $taille=$taille / 100;
        $poids_cible = $IMC * ($taille * $taille);
        return $poids_cible;
    }

}
?>