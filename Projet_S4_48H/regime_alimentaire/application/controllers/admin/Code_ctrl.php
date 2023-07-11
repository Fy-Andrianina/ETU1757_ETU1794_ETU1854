<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('Base_session_ctrl.php');
class Code_ctrl extends Base_session_ctrl {

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
        $this->load->model('admin/Code');
    }

	// Main
	public function index()
	{
        $data['content'] = 'back_office/code/liste_demande';
        $data['demandes'] = $this -> Code -> get_all_demande_code();
        $data['refuses'] = $this -> Code -> get_all_code_refuses();
        $data['acceptes'] = $this -> Code -> get_all_code_acceptes();

		$this->load->view('back_office/main', $data);
	}	
    
    // Accepter une demande d'achat
    public function accepting_achat(){
        $id_achat = $this->input->post('achat_id');
        $id_code = $this->input->post('code_id');
        $this -> Code -> valider_demande_achat($id_achat, $id_code);

        redirect(base_url().'admin/Code_ctrl/');
    }

    // Refuser une demande d'achat
    public function refusing_achat(){
        $id_achat = $this->input->post('achat_id');
        $this -> Code -> refuser_demande_achat($id_achat);

        redirect(base_url().'admin/Code_ctrl/');
    }
	
}
