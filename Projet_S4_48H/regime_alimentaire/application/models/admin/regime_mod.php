<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
class regime_mod extends CI_Model 
{
    // classement des regimes par ordre decroissantes
    public function getClassementRegime(){
        $sql="SELECT COUNT(prestation.id_regime) AS quantite,
        regime.nom_regime,
        regime.prix_regime AS Prix_unitaire,
        COUNT(prestation.id_regime) * regime.prix_regime AS Total_price
        FROM prestation
        JOIN regime ON prestation.id_regime = regime.id_regime
        GROUP BY prestation.id_regime
        ORDER BY quantite DESC";
        $result=$this->db->query($sql);
        $array=array();
        foreach($result->result_array() as $row){
            $array[]=$row;
        }
        $this->db->close();
        return $array;
    }
    // les chiffres d'affaires par mois
    public function get_chiffreaffaire_parmois($annee){
        $sql="SELECT COALESCE(t1.month, t2.month) AS month,
        COALESCE(t1.montant_entrer, 0) AS montant_entrer,
        COALESCE(t2.montant_sortie, 0) AS montant_sortie,
        COALESCE(t1.montant_entrer, 0) - COALESCE(t2.montant_sortie, 0) AS difference
            FROM
            (SELECT MONTH(date_transactions) AS month,
                    SUM(CASE WHEN entrer_sortie = 0 THEN montant ELSE 0 END) AS montant_entrer
                FROM transactions where year(date_transactions) = $annee
                GROUP BY MONTH(date_transactions)) AS t1
            LEFT JOIN
            (SELECT MONTH(date_transactions) AS month,
                    SUM(CASE WHEN entrer_sortie = 1 THEN montant ELSE 0 END) AS montant_sortie
                FROM transactions where year(date_transactions) = $annee
                GROUP BY MONTH(date_transactions)) AS t2 ON t1.month = t2.month
            
            UNION
            
            SELECT COALESCE(t1.month, t2.month) AS month,
                    COALESCE(t1.montant_entrer, 0) AS montant_entrer,
                    COALESCE(t2.montant_sortie, 0) AS montant_sortie,
                    COALESCE(t1.montant_entrer, 0) - COALESCE(t2.montant_sortie, 0) AS difference
            FROM
            (SELECT MONTH(date_transactions) AS month,
                    SUM(CASE WHEN entrer_sortie = 0 THEN montant ELSE 0 END) AS montant_entrer
                FROM transactions where year(date_transactions) = $annee
                GROUP BY MONTH(date_transactions)) AS t1
            RIGHT JOIN
            (SELECT MONTH(date_transactions) AS month,
                    SUM(CASE WHEN entrer_sortie = 1 THEN montant ELSE 0 END) AS montant_sortie
                FROM transactions where year(date_transactions) = $annee
                GROUP BY MONTH(date_transactions)) AS t2 ON t1.month = t2.month";

            $result=$this->db->query($sql);
            $array=array();
            foreach($result->result_array() as $row){
                $array[]=$row;
            }
            $this->db->close();
            return $array;

    }
    // prends les repartitions sur les objectifs les plus choisis par le client
    public function get_repartition_objectif(){
        $sql="select count(information_client.id_objectif) as nombre,objectif.nom_objectif from information_client 
        join objectif on information_client.id_objectif=objectif.id_objectif group by objectif.id_objectif";
        $result=$this->db->query($sql);
        $array=array();
        foreach($result->result_array() as $row){
            $array[]=$row;
        }
        $this->db->close();
        return $array;
    }
}