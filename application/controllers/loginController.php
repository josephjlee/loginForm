<?php

class LoginController extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
        
        //load form helper
        $this->load->helper('form');
        
        //load form validation library
        $this->load->library('form_validation');
        
        //load session library
        $this->load->library('session');
        
        //load login model
        $this->load->model('loginModel');
        
        //load url helper
        $this->load->helper('url');
        
        //load database
        $this->load->database();
    }
    
    //default method 
    public function index()
    {
        //show login page
        $this->load->view('login_form');
    }
    
}
?>