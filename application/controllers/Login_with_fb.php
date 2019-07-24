<?php

class Login_with_fb extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
//        $this->config->load('facebook');
//        $this->load->library('facebook');
    }

    function index()
    {
        if ($this->session->has_userdata('ulogin')) {
            $data['alldata'] = $this->session->userdata('user_data');
            $data['title'] = "Welcome " . $data['alldata']['first_name'] . " | Login With Facebook Using Codeigntier | Demo | Shakzee";
            $this->load->view('test/test', $data);
            //var_dump($this->session->userdata('user_data'));
        } else {
            redirect('login_with_fb/login');
        }

    }

    public function login()
    {
        print_r($_SESSION);
        if ($this->session->has_userdata('ulogin')) {
            redirect('login_with_fb');
        }//checking if user already  logedin


        if ($this->facebook->is_authenticated()) {
            echo 1;
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,picture,email,gender');
            if (!isset($userProfile['error'])) {
                $fbdata = array();
                $fbdata['ulogin'] = TRUE;
                $fbdata['user_data'] = $userProfile;
                print_r($fbdata);
                $this->session->set_userdata($fbdata);
                if ($this->session->userdata('ulogin')) {
                    redirect('login_with_fb');
                } else {
                    echo 'Your custom error to login';
                }
            } else {
                $this->facebook->destroy_session();
                redirect('login_with_fb');
            }
        } else {
            echo 12;
            $fbuser = '';
            $data['fburl'] = $this->facebook->login_url();
            $data['title'] = "Log in with in Codeigntier | shakzee";
            print_r($data);
            $this->load->view('test/test', $data);


        }

    }

    public function signout()
    {
        $this->facebook->destroy_session();
        $this->session->sess_destroy();
        redirect('login_with_fb/login');
    }


}//class ends here