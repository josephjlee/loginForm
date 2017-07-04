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
        $userName=$data['userName'];
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
}
?>