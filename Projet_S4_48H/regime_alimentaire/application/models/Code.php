<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends CI_Model {

    

    // Demander une demande d'achat aupres de l'administration
    public function demande_validation($id_utilisateur, $id_code){
        if($this -> est_code_valide($id_code) == true){
            $query = sprintf("INSERT INTO achat_code VALUES(null, %u, %u, 0)", $id_utilisateur, $id_code);      
            $sql = $this->db->query($query);
            $this -> db -> close();
            return 1;
        }
        return 0;
    }

    // Savoir si le code est encore accessible ou pas
    public function est_code_valide($id_code){
        $the_code = $this -> get_code_by_id($id_code);
        if($the_code['is_valid'] == 0) return false;
        return true;
    }

    // Prendere le code par id
    public function get_code_by_id($id_code){
        $query = sprintf("SELECT * FROM code where id_code = %u", $id_code);   
        $sql = $this->db->query($query);
        $result = $sql-> row_array();
        return $result;
    }

  // Prendre tous les codes
  public function get_all_code(){
    $query = sprintf("SELECT * FROM code");
    $sql = $this->db->query($query);
    $result = array();
    foreach ($sql-> result_array() as $row){
      $result[] = $row; 
    }
    $this -> db -> close();
    return $result;
  }
}
