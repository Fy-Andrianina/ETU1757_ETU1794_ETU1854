<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Model {
    
    // Nombre d'utilisateurs
    public function count_user(){
        $query = $this->db->get('client');
        $this -> db -> close();
        return count($query->result());
    }

    // Nombre de tableau vendu
    public function count_selling(){
        $query = $this->db->get('painting_buying');
        $this -> db -> close();
        return count($query->result());
    }

    public function summary_sales(){
        $data = $this -> temp_summary_sales();
        $result = array();
        foreach($data as $t){
            if($t['prix'] == null){
                $t['count'] = 0;
                $t['prix'] = 0;
            }
            $result[] = $t;
        }
        $prices = array_column($result, 'prix');
        array_multisort($prices, SORT_DESC, $result);
        return $result;
    }

    public function temp_summary_sales(){
        $query = "select artistname, count(artistname), sum(price) as prix from v_summary_sales group by artistname order by prix desc";
        $sql = $this->db->query($query);
        $result = array();
        foreach ($sql-> result_array() as $row){
            $result[] = $row; 
        }
        $this -> db -> close();
        return $result;
    }

}
