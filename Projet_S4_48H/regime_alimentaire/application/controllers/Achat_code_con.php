<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
require_once(APPPATH . 'controllers/Session_controller.php');
class Achat_code_con extends Session_controller{

    public function __construct() {
        parent::__construct();
		$this->load->model('Code');
    }
    
    // Page des codes
    public function index(){
        $data=array();
        $fail = $this->input->get('fail');
        $data['codes'] = $this -> Code -> get_all_code();
        $id_user = $this -> session -> userdata('idUser');
        $this->load->model('Utilisateur');
        $data['montant']=number_format($this->Utilisateur->get_montant_client($id_user),0,',',' ');
        $data['content']='achat_code_view';
        $this->load->view('template_view',$data);
    }

    // Verification de la validite du code
    public function acheter_code($id_code){
        $check = $this -> Code -> est_code_valide($id_code);
        if($check == false){
            $fail = "Achat impossible"; // The value of the fail variable
            // Encode the fail variable
            $encodedFail = urlencode($fail);
            redirect(base_url()."Achat_code_con/index/?fail={$encodedFail}");
        } else{
            $id_user = $this -> session -> userdata('idUser');
            $this -> Code -> demande_validation($id_user, $id_code);
            redirect(base_url().'Achat_code_con/');
        }
    }
}
?>