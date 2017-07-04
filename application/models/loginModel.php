<?php
class LoginModel extends CI_Model
{
    public function __construct()
    {
        Parent::__construct();
    }
    
    /**
     * check if username and password are match
     * @param array $data username ,password
     * @return boolean true if username and password match or false
     */
    public function checkLogin($data)
    {
        $userName=$data['name'];
        $password=$data['password'];
        
        $condition ="name ='$userName' AND password='$password'";
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->limit(1);
        
        $query=$this->db->get();
        
        if($query->num_rows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     * insert new user into users tabel
     * @param array $data username,password ,email
     * @return boolean true if user inserted or false if already exists 
     */
    public function addUser($data)
    {
        
         $userName=$data['name'];
         
         //check if user already exists
         $condition ="name ='$userName'";
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->limit(1);
        
        $query=$this->db->get();
        
        if($query->num_rows()>0)
        {
            //user already registered
            return false;
        }
        else
        {
            //insert new user into users table
            $this->db->insert('users',$data);
            
            if($this->db->affected_rows()>0)
            {
                return true;
            }
            else
            {
                //error occur
                return false;
            }
        }
         
    }
    
    
    
}
?>