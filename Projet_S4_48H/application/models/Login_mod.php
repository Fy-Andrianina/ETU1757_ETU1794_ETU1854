<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
class Login_mod extends CI_Model 
{
    //check the login
    public function check_login($email,$pass)
    {
        $request="SELECT * from utilisateur where email ='%s' and mdp='%s' and is_admin=0";
        $request=sprintf($request,$email,$pass);
        $tab = $this->db->query($request);
        if($tab != null){
            return $tab->row_array();
        }
        return null;
    }

   public function check_login_admin($email,$pass){
        $request="SELECT * from utilisateur where email ='%s' and mdp='%s' and is_admin=1";
        $request=sprintf($request,$email,$pass);
        $tab = $this->db->query($request);
        if($tab != null){
            return $tab->row_array();
        }
        return null;
   }
    
}
?>