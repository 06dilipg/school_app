<?php
defined('BASEPATH') OR exit('No Direct Script Allowed');
class  Login_model extends  CI_Model{

 public  function  saveLogin($data){
     {
         $this->db->insert('Login1',$data);
         $id = $this->db->insert_id();
     }
     return  $id;
 }
    public  function  fetchUser(){

           $querry = $this->db->get('Login1');
            return $querry->result();

    }
}