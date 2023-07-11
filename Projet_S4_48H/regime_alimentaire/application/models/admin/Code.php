<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends CI_Model {

  // Liste des demandes de code 
  public function get_all_demande_code(){     
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

    // Liste des demandes de code refuser
    public function get_all_code_refuses(){     
        $query = "SELECT * FROM (select achat_code.*, code.code_details, code.montant_code, utilisateur.nom
    from achat_code
    inner join code on code.id_code = achat_code.id_code
    inner join utilisateur on utilisateur.id_utilisateur = achat_code.id_utilisateur) as t where t.is_valid = 2";   
        $sql = $this->db->query($query);
        $result = array();
        foreach ($sql-> result_array() as $row){
          $result[] = $row; 
        }
        $this -> db -> close();
        return $result;
    }

    // Liste des demandes de code refuser
    public function get_all_code_acceptes(){     
        $query = "SELECT * FROM (select achat_code.*, code.code_details, code.montant_code, utilisateur.nom
    from achat_code
    inner join code on code.id_code = achat_code.id_code
    inner join utilisateur on utilisateur.id_utilisateur = achat_code.id_utilisateur) as t where t.is_valid = 1";   
        $sql = $this->db->query($query);
        $result = array();
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        $this -> db -> close();
        return $result;
    }

    // Accepter une achat de code
    public function valider_demande_achat($id_achat, $id_code){
        $query1 = sprintf("UPDATE achat_code SET is_valid = 2 WHERE id_code = %u", $id_code);      
        $sql1 = $this->db->query($query1);
        

        $query = sprintf("UPDATE achat_code SET is_valid = 1 WHERE id_achat = %u", $id_achat);      
        $sql = $this->db->query($query);

        $query2 = sprintf("UPDATE code SET is_valid = 0 WHERE id_code = %u", $id_code);      
        $sql2 = $this->db->query($query2);

        $code = $this -> get_code_by_id($id_code);
        $achat = $this -> get_achat_by_id($id_achat);
        $query3 = sprintf("INSERT INTO transactions VALUES(null, %u, (SELECT NOW()), 1, %d)", $achat['id_utilisateur'], $code['montant_code']);  
        $sql3 = $this->db->query($query3);

        $this -> db -> close();
    }

    // Refuser une achat
    public function refuser_demande_achat($id_achat){
        $query = sprintf("UPDATE achat_code SET is_valid = 2 WHERE id_achat = %u", $id_achat);      
        $sql = $this->db->query($query);
        $this -> db -> close();
    }

      // Prendere le code par id
      public function get_code_by_id($id_code){
        $query = sprintf("SELECT * FROM code where id_code = %u", $id_code);   
        $sql = $this->db->query($query);
        $result = $sql-> row_array();
        return $result;
    }

    public function get_achat_by_id($id_achat){
      $query = sprintf("SELECT * FROM achat_code where id_achat = %u", $id_achat);   
        $sql = $this->db->query($query);
        $result = $sql-> row_array();
        return $result;
    }

}
