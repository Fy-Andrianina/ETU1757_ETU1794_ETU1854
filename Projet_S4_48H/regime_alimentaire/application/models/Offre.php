<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offre extends CI_Model {

    // Get GOLD DETAILS
    public function get_gold_detail(){
        $result = $this -> get_taux_offre(26);
        return $result;
    }

    // Taux d'une offre
    public function get_taux_offre($id_offre){
        $query = sprintf("select status_client.*, remise.taux, date_taux
            from status_remise
            join status_client on status_client.id_status_client = status_remise.id_status_client
            join remise on remise.id_remise = status_remise.id_remise
            where status_remise.id_status_client = %u
            order by status_remise.date_status_remise ", $id_offre);   
        $sql = $this->db->query($query);
        $result = $sql-> row_array();
        $this -> db -> close();
        return $result;
    }
}


