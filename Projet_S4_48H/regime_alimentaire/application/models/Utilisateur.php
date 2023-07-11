<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

     /*Nombre de clients */
     public function nombre_utilisateurs(){
        $query = "SELECT COUNT(id_utilisateur) AS nb_user FROM utilisateur WHERE is_admin!=1";
        $sql = $this->db->query($query);
        $result = $sql-> row_array();
        $this -> db -> close();
        return $result['nb_user'];
    }

    // Changer l'offre d'un utilisateur
    public function changer_offre_utilisateur($id_utilisateur, $id_status){
        $check = $this -> peut_acheter_offre($id_utilisateur, $id_status);

        if($check == true){
            $sql = "INSERT INTO utilisateur_status VALUES(null, %u, %u, (SELECT NOW()))";
            $sql = sprintf($sql, $id_utilisateur, $id_status);
            $this->db->query($sql);

            $this -> load -> model('Offre');
            $offre_details = $this -> Offre -> get_taux_offre($id_status);
            $query1 = "INSERT INTO transactions VALUES(null, %u, (SELECT NOW()) , 0 , %d)";
            $query1 = sprintf($query1,$id_utilisateur, $offre_details['prix']);
            $this->db->query($query1);

            return 1;
        } else {
            return 0;
        }
    }

    // PRENDRE LE TAUX DE REMISE POUR CHAQUE CLIENT
    public function get_remise_utilisateur($id_utilisateur){
        $query = sprintf("select t.*, b.*
        from (select utilisateur.id_utilisateur, utilisateur.nom , status_client.*
            from utilisateur_status
            join utilisateur on utilisateur.id_utilisateur = utilisateur_status.id_utilisateur
            join status_client on status_client.id_status_client = utilisateur_status.id_status_client
            order by date_user_status desc) as t 
            join (select status_client.*, remise.taux, date_taux
            from status_remise
            join status_client on status_client.id_status_client = status_remise.id_status_client
            join remise on remise.id_remise = status_remise.id_remise
            order by status_remise.date_status_remise) as b on b.id_status_client = t.id_status_client
            where t.id_utilisateur = %s", $id_utilisateur);   
        $sql = $this->db->query($query);
        $result = array();
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        $this -> db -> close();

        if(count($result) > 0) return $result[0]['taux'];
        return 0;
    }

        // Si l'utilisateur peut achetre une regime
    public function peut_acheter_offre($id_utilisateur,$id_offre){
        $montant_client = $this->get_montant_client($id_utilisateur);
        $this -> load -> model('Offre');
        $offre_details = $this -> Offre -> get_taux_offre($id_offre);
        if ($montant_client >= $offre_details['prix']) {
            return true;
        } else {
            return false;
        }
    }

    // Si l'utilisateur peut achetre une regime
    public function peut_acheter($id_utilisateur,$id_regime){
        $montant_client = $this->get_montant_client($id_utilisateur);
        $query = "SELECT prix_regime FROM regime WHERE id_regime='%s'";   
        $query = sprintf($query,$id_regime);
        $sql = $this->db->query($query);
        $result = $sql-> row_array();
        $this -> db -> close();
        $prixRegime = $result['prix_regime'];

        if ($montant_client >= $prixRegime) {
            return true;
        } else {
            return false;
        }
    }

    // Prendre le montant debity d'un client
    public function get_montant_client($id_utilisateur){
        return $this -> get_enter_montant_client($id_utilisateur) - $this -> get_depense_client($id_utilisateur);
    }

    // Prendre tous les depenses du client 
    public function get_depense_client($id_utilisateur){
        $transactions = $this -> get_transactions_client($id_utilisateur);
        $result = 0;
        foreach($transactions as $transaction){
            if($transaction['entrer_sortie'] == 0){
                $result += $transaction['montant'];
            }
        }
        return $result;
    }

    public function chiffre_affaire(){
        $all_users = $this -> get_all_users();

        $result = 0;

        foreach($all_users as $user){
            $result += $this -> get_depense_client($user['id_utilisateur']);
        }
        return $result;
    }

     // Prendre tous les entre d'argent du client 
     public function get_enter_montant_client($id_utilisateur){
        $transactions = $this -> get_transactions_client($id_utilisateur);
        $result = 0;
        foreach($transactions as $transaction){
            if($transaction['entrer_sortie'] == 1){
                $result += $transaction['montant'];
            }
        }
        return $result;
    }

    // Prendre transactrions d'un utilisateur
    public function get_transactions_client($id_utilisateur){
        $query = sprintf("SELECT * FROM transactions WHERE id_utilisateur = %u", $id_utilisateur);   
        $sql = $this->db->query($query);
        $result = array();
        foreach ($sql-> result_array() as $row){
        $result[] = $row; 
        }
        $this -> db -> close();
        return $result;
    }

    // Ajouter une information pour un client
    public function modifier_utilisateur_information($id_utilisateur,$date_information,$id_objectif,$taille,$poids){
        try {
            $query = "INSERT INTO information_client VALUES(NULL,'%s','%s','%s','%s','%s')";
            $query = sprintf($query,$id_utilisateur,$date_information,$id_objectif,$taille,$poids);
            $this->db->query($query);
        } catch (Exception $e) {
            throw $e;
        }
    }

    // Prendre dernier information de l'utilisateur
    public function get_utilisateur_information($id_user){  
        $query = "SELECT u.id_utilisateur,u.nom,u.prenom,u.email,u.is_admin,u.date_naissance,u.genre,i_c.id_information,i_c.date_information,i_c.id_objectif,i_c.taille,i_c.poids, objectif.nom_objectif 
            FROM information_client as i_c 
            JOIN utilisateur as u ON u.id_utilisateur = i_c.id_utilisateur 
            JOIN objectif on objectif.id_objectif = i_c.id_objectif
            WHERE i_c.id_utilisateur = '%s' 
            ORDER BY i_c.date_information DESC";   
        // $query = "SELECT * FROM v_information_utilisateur WHERE id_utilisateur = '%s' ORDER BY date_information DESC";   
        $query = sprintf($query,$id_user);
        $sql = $this->db->query($query);
        $result = array();
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        $this -> db -> close();
        if(count($result) > 0){
            return $result[0];
        }else {
            return null;
        }
    }

    // Prendre l'utilisareur par son id
    public function get_utilisateur_by_id($id_user){     
        $query = "SELECT * FROM utilisateur WHERE id_utilisateur = '%s'";   
        $query = sprintf($query,$id_user);
        $sql = $this->db->query($query);
        $result = $sql-> row_array();
        $this -> db -> close();
        return $result;
    }

    public function get_all_users(){
        $query = sprintf("SELECT * FROM utilisateur");   
        $sql = $this->db->query($query);
        $result = array();
        foreach ($sql-> result_array() as $row){
        $result[] = $row; 
        }
        $this -> db -> close();
        return $result;
    }

    // Insertion utilisateuir
    public function inscription($nom,$prenom,$email,$is_admin,$date_naissance,$genre,$mdp){
        try {
            $sql = "INSERT INTO utilisateur VALUES(NULL,'%s','%s','%s','%s','%s','%s','%s')";
            $sql = sprintf($sql,$nom,$prenom,$email,$is_admin,$date_naissance,$genre,$mdp);
            $this->db->query($sql);
           
            $query2 = "SELECT LAST_INSERT_ID() as last_id";
            $sql2 = $this->db->query($query2);
            $result = $sql2-> row_array();

            $id = $result['last_id'];

            $sql1 = "INSERT INTO utilisateur_status VALUES(null,'%s', 20, (SELECT NOW()))";
            $sql1 = sprintf($sql1, $id);
            $this->db->query($sql1);

        } catch (Exception $e) {
            throw $e;
        }
    }
}