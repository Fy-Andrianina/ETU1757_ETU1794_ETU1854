<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime extends CI_Model {

  public function __construct() {
      parent::__construct();
      $this->load->model('VerifyIfExistInDB');
  }

    /*insertion de nouveau prestation par un client */
    public function choisir_prestation($id_utilisateur,$id_regime,$id_sport){
      try {
          $regime = $this ->  get_regime_by_id($id_regime);
          $this -> load -> model('Utilisateur');
          $get_remise = $this -> Utilisateur -> get_remise_utilisateur($id_utilisateur);

          if($regime){
            $query = "INSERT INTO prestation VALUES(NULL,'%s',(SELECT NOW()),'%s','%s')";
            $query = sprintf($query,$id_utilisateur,$id_regime,$id_sport);
            $this->db->query($query);

            $montant_remise = $regime['prix_regime'] * $remise / 100;
            $query1 = "INSERT INTO transactions VALUES(NULL,'%s',(SELECT NOW()),0,%u)";
            $query1 = sprintf($query1,$id_utilisateur,($regime['prix_regime'] - $montant_remise));
            $this->db->query($query1);
          }
      } catch (Exception $e) {
          throw $e;
      }        
    }

    /*Modification d'un regime*/
    public function modifier_regime($id_regime,$nom_regime,$id_objectif,$id_intervalle,$durree_regime,$prix_regime){
      try {
          $isColValExist =  $this->VerifyIfExistInDB->isColValExistInTable("objectif","id_objectif",$id_objectif);
          if ($isColValExist) {
              $query = "UPDATE regime SET nom_regime = '%s',id_objectif = '%s',id_intervalle = '%s',durree_regime = '%s',prix_regime = '%s' WHERE id_regime='%s'";
              $query = sprintf($query,$nom_regime,$id_objectif,$id_intervalle,$durree_regime,$prix_regime,$id_regime);
              $this->db->query($query);
          } else {
              throw new Exception("La valeur de l'id_objectif n'existe pas"); 
          }
      } catch (Exception $e) {
          throw $e;
      }        
  }

    /*Regime et sport choisis en courant pour 1 client */
    public function get_regime_sport_client($id_utilisateur){
      $query = "SELECT * 
        FROM prestation AS p 
        JOIN regime AS r ON p.id_regime = r.id_regime 
        JOIN sport AS s ON p.id_sport=s.id_sport 
        WHERE p.id_utilisateur = '%s' 
        ORDER BY date_prestation DESC LIMIT 1";   
      $query = sprintf($query,$id_utilisateur);
      $sql = $this->db->query($query);
      $result = $sql-> row_array();
      $this -> db -> close();
      return $result;
    }


    // Prendre les regimes avec leur plats
    public function get_regime_detail_by_id($id_regime){
        $query = "SELECT * FROM regime_plat AS r_p JOIN regime AS r ON r_p.id_regime = r.id_regime JOIN plat as pl ON r_p.id_plat = pl.id_plat WHERE r.id_regime='%s'";   
        $query = sprintf($query,$id_regime);
        $sql = $this->db->query($query);
        $result = array();
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        $this -> db -> close();
        return $result;
    }

  // Liste des regimes pour un client en fonction de son objectif
  public function get_regimes_pour_client($id_utilisateurs){     
    $this -> load -> model('Utilisateur');
    $my_information = $this -> Utilisateur -> get_utilisateur_information($id_utilisateurs);
    $result = array();
    $result = $this -> get_regime_by_objectif($my_information['id_objectif']);
    return $result;
  }


  // Prendre le regime by id
  public function get_regime_by_id($id_regime){
    $query = sprintf("SELECT * FROM (select regime.*, objectif.nom_objectif, intervalle.min_poids, intervalle.max_poids
    from regime
    inner join intervalle on intervalle.id_intervalle = regime.id_intervalle
    inner join objectif on objectif.id_objectif = regime.id_objectif) as t where t.id_regime = %u", $id_regime);   
    $sql = $this->db->query($query);
    $result = $sql-> row_array();
    return $result;
  }

  // Prendre tous les regimes d'un objectif
  public function get_regime_by_objectif($id_objectif){
    $query = sprintf("SELECT * FROM (select regime.*, objectif.nom_objectif, intervalle.min_poids, intervalle.max_poids
    from regime
    inner join intervalle on intervalle.id_intervalle = regime.id_intervalle
    inner join objectif on objectif.id_objectif = regime.id_objectif) as t where t.id_objectif = %u", $id_objectif);;   
    $sql = $this->db->query($query);
    $result = array();
    foreach ($sql-> result_array() as $row){
      $result[] = $row; 
    }
    $this -> db -> close();
    return $result;
  }

  // Prendre tous les objectifs
  public function get_all_objectifs(){
    $query = sprintf("SELECT * FROM objectif");;   
    $sql = $this->db->query($query);
    $result = array();
    foreach ($sql-> result_array() as $row){
      $result[] = $row; 
    }
    $this -> db -> close();
    return $result;
  }

   //Prendre les informations de l'utilisateur
   public function get_suitable_regime($poids,$type){
    $query="";
    if( $type == -1){
      $query="select * from regime join intervalle on regime.id_intervalle=intervalle.id_intervalle
       join objectif on regime.id_objectif=objectif.id_objectif where $poids>=min_poids and $poids <=max_poids and regime.id_objectif=40";
    }else{
      $query="select * from regime join intervalle on regime.id_intervalle=intervalle.id_intervalle
       join objectif on regime.id_objectif=objectif.id_objectif where $poids>=min_poids and $poids <=max_poids and regime.id_objectif=41";
    }
    // echo $query;
    $sql = $this->db->query($query);
    $result=$sql->row_array();
    $this -> db -> close();
    return $result;
  }



}
