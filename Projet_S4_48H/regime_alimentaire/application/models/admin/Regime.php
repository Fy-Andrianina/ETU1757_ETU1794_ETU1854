<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime extends CI_Model {


  public function __construct() {
      parent::__construct();
      $this->load->model('VerifyIfExistInDB');
  }

  // SUPPRIMER UN REGIME
  public function delete_regime($id_regime){
    $can_delete = $this -> can_delete_regime($id_regime);

    if($can_delete == true){
      $query = sprintf("DELETE FROM regime WHERE id_regime = %u", $id_regime);      
      $sql = $this->db->query($query);
      $this -> db -> close();
    }
  }

  // VOIR SI ON PEUT SUPPRIMER LE REGIME
  public function can_delete_regime($id_regime){
    $query = sprintf("SELECT * FROM prestation WHERE id_regime = %u", $id_regime);   
    $sql = $this->db->query($query);
    $result = array();
    foreach ($sql-> result_array() as $row){
      $result[] = $row; 
    }
    $this -> db -> close();

    if(count($result) > 0) return false;
    return true;
    return $result;
  }

  /*insertion d'un nouveau regime */
  public function creer_regime($nom_regime,$id_objectif,$id_intervalle,$durree_regime,$prix_regime){
      try {
          $isColValExist =  $this->VerifyIfExistInDB->isColValExistInTable("objectif","id_objectif",$id_objectif);
          if ($isColValExist) {
              $query = "INSERT INTO regime VALUES(null, '%s','%s','%s','%s','%s')";
              $query = sprintf($query,$nom_regime,$id_objectif,$id_intervalle,$durree_regime,$prix_regime);
              $this->db->query($query);
          } else {
              throw new Exception("La valeur de l'id_objectif n'existe pas"); 
          }
      } catch (Exception $e) {
          throw $e;
      }
  }

  // Liste des objectifs
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
    $query = "SELECT * FROM (select regime.*, objectif.nom_objectif, intervalle.min_poids, intervalle.max_poids
    from regime
    inner join intervalle on intervalle.id_intervalle = regime.id_intervalle
    inner join objectif on objectif.id_objectif = regime.id_objectif) as t";   
    $sql = $this->db->query($query);
    $result = array();
    foreach ($sql-> result_array() as $row){
      $result[] = $row; 
    }
    $this -> db -> close();
    return $result;
  }

  // Modifier artiste
  public function  modifier_regime($id, $nom, $dtn, $biographie, $email, $adress){

  }
}
