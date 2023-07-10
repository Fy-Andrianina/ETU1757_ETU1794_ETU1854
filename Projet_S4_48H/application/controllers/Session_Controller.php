<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_controller extends CI_Controller {
    function __construct()
    {
        parent::__construct(); 
        if($this->session->has_userdata('idUser') == false)
            {
                redirect(site_url('login_Con'));
            }
    }
}
?>