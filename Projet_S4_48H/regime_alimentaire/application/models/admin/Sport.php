<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sport extends CI_Model {

  // Liste des regimes 
  public function get_all_sport(){     
    $query = "SELECT * FROM (select sport.*, objectif.nom_objectif, intervalle.min_poids, intervalle.max_poids
    from sport
    inner join intervalle on intervalle.id_intervalle = sport.id_intervalle
    inner join objectif on objectif.id_objectif = sport.id_objectif) as t";   
    $sql = $this->db->query($query);
    $result = array();
    foreach ($sql-> result_array() as $row){
      $result[] = $row; 
    }
    $this -> db -> close();
    return $result;
  }



}
