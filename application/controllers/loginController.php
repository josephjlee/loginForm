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
    
    /**
     * validate user inputs and check login 
     */
     public function login()
     {
        // $this->output->enable_profiler(true);   
         //input validators
         $this->form_validation->set_rules('userName','UserName','trim|required');
         $this->form_validation->set_rules('userPassword','Password','trim|required');
         
         if($this->form_validation->run()==false)
         {
            $this->load->view('login_form');
         }
         else //input data is valid
         {
            $data=array(
            'name'=>$this->input->post('userName'),
             'password'=>$this->input->post('userPassword'));
             
             //check user login
             $ret=$this->loginModel->checkLogin($data);
             
             if($ret==true)
             {
              //username and password match
              
              $userName=$this->input->post('userName');
              
              $result=$this->loginModel->readUserInfo($userName);
              
              if($result != false)
              {
                $data=array(
                'name'=>$result[0]->name,
                'email'=>$result[0]->email
                );  
               
               $this->session->set_userdata('signedIn',$data);
               
               //load admin page
              $this->load->view('adminView');
               
               
              } 
               
             }
             else
             {
                $data=array
                ('loginError'=>'invalid username or password');
                
                //show login page 
                $this->load->view('login_form',$data);
             }
         }
     }
     
     /**
      * show sign up page
      */
      public function showSignup()
      {
        //load sign up view
        $this->load->view('signup_form');
      }
    
    /**
     * sign up new user
     */
     public function signup()
     {
        //validate user inputs
        $this->form_validation->set_rules('username','UserName','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        
        if($this->form_validation->run()==false)
        {
            $this->load->view('signup_form');
        }
        else
        {
           $data=array(
           'name'=>$this->input->post('username'),
           'email'=>$this->input->post('email'),
           'password'=>$this->input->post('password')
           ); 
           
            $ret=$this->loginModel->addUser($data);
            
            if($ret==true)
            {
                $data['msg']='Registration Successfully';
                //show login page 
                $this->load->view('login_form',$data);
            }
            else
            {
                $data['msg']='Already registered user';
                 $this->load->view('signup_form',$data);
            }
           
        }
     }
}
?>