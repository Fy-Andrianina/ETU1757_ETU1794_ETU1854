<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code_general extends CI_Model {

    public function get_all_demandes(){     
        $query = "SELECT * FROM (select achat_code.*, code.code_details, code.montant_code, utilisateur.nom
        from achat_code
        inner join code on code.id_code = achat_code.id_code
        inner join utilisateur on utilisateur.id_utilisateur = achat_code.id_utilisateur) as t where t.is_valid = 0";   
        $sql = $this->db->query($query);
        $result = array();
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        $this -> db -> close();
        return $result;
    }
}


