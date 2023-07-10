<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index(){
		$this->load->view('login');
		
	}	
	public function receive(){
		$this->load->model('login_mod');
		$email = $this->input->post('email');
		$motDePasse = $this->input->post('motDePasse');
		$array=$this->login_mod->getAllUser($email,$motDePasse);
		if($array == 1){
			redirect('info_con');
		}else if($array == 0){
			redirect(site_url('login'));
		}
	}	
	public function register(){
		echo "register";
	}		

}

