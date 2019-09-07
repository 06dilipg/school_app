<?php
defined('BASEPATH') OR exit('No Direct Script Allowed');
class  Register_model extends  CI_Model{

    public  function  saveRegister($data){
        {
           $stmt = $this->db->insert('school_table',$data);
           $id = $this->db->insert_id();
        }
        return  $id;
    }
    public  function  fetchUser(){

        $querry = $this->db->get('Login1');
        return $querry->result();

    }
}