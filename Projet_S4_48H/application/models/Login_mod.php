<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
class Login_mod extends CI_Model 
{
    //check the login
    public function check_login($email,$pass)
    {
        $request="SELECT * from users where email ='%s' and password='%s'";
        $request=sprintf($request,$email,$pass);
        $tab = $this->db->query($request);
        if($tab != null){
            return $tab->row_array();
        }
        return null;
    }
    //get all sexe
    public function getAllSexe(){
        $sql="SELECT * FROM sexe";
        $result=$this->db->query($sql);
        $response=array();
        foreach($result->result_array() as $row){
            $response[]=$row;
        }
        return $response;
    }
    public function insert($name,$email,$password,$sexe){
        $sql="INSERT INTO users(name,email,password,sexe) values('%s','%s','%s',%u)";
        $sql=sprint($sql,$name,$email,$password,$sexe);
        $this->db->query($sql);
    }
}
?>