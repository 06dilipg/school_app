<?php


class User_model extends  CI_Model{
    public function login($email,$password){

        $data = array(
            'email' => $email,
            'password' => $password
        );
        $this->db->where('email',$data['email']);
        $this->db->where('password',$data['password']);

        $query = $this->db->get('school_table');
        print_r($query);
        if ($query->num_rows() == 1){
            $result = $this->result_array();
            return $result;
        }else{
            return false;
        }
    }
    public function check_login($email,$password){
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $ans=$this->db->get('school_table');
//        echo "<pre>";
//        print_r($ans->row()->school_id);
//        exit();
        $data=$ans->result_array();
        return $data;

    }
    // function validate()
    // {
        //$arr['email'] = $this->input->post('username');
       // $arr['password'] = ($this->input->post('password'));
       // $res =$this->db->get_where('school_table',$arr)->row();
       // $res = $this->db->get_where('school_table');
       //   echo "<pre>";
       // print_r($res->row()->school_id);
       // exit();

    //   $data=$res->result_array();
      //  return $data;
    //}
     function validate($username,$password)
    {
         $this->db->where('email', $username);  
           $this->db->where('password', $password);  
           $query = $this->db->get('school_table')->row();  
           return $query;
           //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
           // if($query->num_rows() > 0)  
           // {  
           //      return true;  
           // }  
           // else  
           // {  
           //      return false;       
           // }
    }
    function addSubject($data){
      $this->db->insert_batch('subject_table', $data);

    }


}