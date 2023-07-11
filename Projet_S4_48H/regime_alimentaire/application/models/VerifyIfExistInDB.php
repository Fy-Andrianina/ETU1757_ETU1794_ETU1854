<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyIfExistInDB extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    /*Verification si une valeur d'une colonne existe dans une table */
    public function isColValExistInTable($nom_table,$colonne,$valeur_colone){
        $query = "SELECT %s FROM %s WHERE %s = '%s'";   
        $query = sprintf($query,$colonne,$nom_table,$colonne,$valeur_colone);
        $sql = $this->db->query($query);
        $result = array();
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        $this -> db -> close();
        if (count($result) > 0) {
            return true;   
        } else {
            return false;
        }
    }
}