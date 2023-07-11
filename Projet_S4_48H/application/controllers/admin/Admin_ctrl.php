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
    }

	// Main
	public function index()
	{
        $data['content'] = 'back_office/home';
		$data['dash_active'] = 'active';
		$this->load->view('back_office/main', $data);
	}		

	public function deconnect(){
		$this->session->sess_destroy();
		redirect(base_url().'Yohan/loaginPage');
	}

	
}
