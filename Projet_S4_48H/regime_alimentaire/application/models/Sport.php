<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sport extends CI_Model {

  // Liste des regimes pour un client en fonction de son objectif
  public function get_sports_pour_client($id_utilisateurs){     
    $this -> load -> model('Utilisateur');
    $my_information = $this -> Utilisateur -> get_utilisateur_information($id_utilisateurs);
    $result = array();
    $result = $this -> get_sport_by_objectif($my_information['id_objectif']);
    return $result;
  }

  // Prendre le regime by id
  public function get_sport_by_id($id_regime){
    $query = sprintf("SELECT * FROM sport where id_sport = %u", $id_regime);   
    $sql = $this->db->query($query);
    $result = $sql-> row_array();
    return $result;
  }

  // Prendre tous les regimes d'un objectif
  public function get_sport_by_objectif($id_objectif){
    $query = sprintf("SELECT * FROM sport where id_objectif = %u", $id_objectif);;   
    $sql = $this->db->query($query);
    $result = array();
    foreach ($sql-> result_array() as $row){
      $result[] = $row; 
    }
    $this -> db -> close();
    return $result;
  }




}
