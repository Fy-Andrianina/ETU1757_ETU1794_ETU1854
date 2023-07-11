<?php

class GlobalDataHook
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function load_global_data()
    {
        $CI =& get_instance();
        $CI->load->model('Code_general');
        $data['demandes'] = $CI-> Code_general ->get_all_demandes();
        $CI->load->vars($data);
    }

    
    public function load_global_data_two()
    {
        $CI =& get_instance();
        $CI->load->model('Offre');
        $data['gold'] = $CI-> Offre ->get_gold_detail();
        $CI->load->vars($data);
    }
}