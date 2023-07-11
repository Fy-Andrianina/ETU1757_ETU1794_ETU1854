<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime extends CI_Model {

  // Liste des intervalles
  public function get_all_objectif(){     
    $query = "SELECT * FROM objectif";   
    $sql = $this->db->query($query);
    $result = array();
    foreach ($sql-> result_array() as $row){
      $result[] = $row; 
    }
    $this -> db -> close();
    return $result;
  }


  // Liste des intervalles
  public function get_all_intervalle(){     
    $query = "SELECT * FROM intervalle";   
    $sql = $this->db->query($query);
    $result = array();
    foreach ($sql-> result_array() as $row){
      $result[] = $row; 
    }
    $this -> db -> close();
    return $result;
  }


  // Liste des regimes 
  public function get_all_regime(){     
    $query = "SELECT * FROM v_regime_detail";   
    $sql = $this->db->query($query);
    $result = array();
    foreach ($sql-> result_array() as $row){
      $result[] = $row; 
    }
    $this -> db -> close();
    return $result;
  }

  // Modifier artiste
  public function  modify_artiste($id, $nom, $dtn, $biographie, $email, $adress){

  }

  // Ajouter nouveau artiste
  public function add_artiste($nom, $dtn, $biographie, $image, $email, $adress){

  }
  // delete an artiste 
  public function delete_regime($id_regime){
    $portfolio = $this -> artiste_painting($id_artiste);
    if(count($portfolio) > 0) return 1;
    $query = sprintf("DELETE FROM artist WHERE idartist = %u", $id_artiste);      
    $sql = $this->db->query($query);
    $this -> db -> close();
    return 0;
  }

}
