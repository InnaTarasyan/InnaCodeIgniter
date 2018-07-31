<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->model('menu_m');

    }

    public function index()
    {
        $this->load->view("register.php");
    }

    public function register_user(){

        $user = array(
            'name' => $this->input->post('user_name'),
            'email' => $this->input->post('user_email'),
            'password' => md5($this->input->post('user_password'))
        );
        print_r($user);

        $email_check = $this->user_model->email_check($user['user_email']);

        if($email_check){
            $this->user_model->register_user($user);
            $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
            redirect('user/login_view');

        }
        else{

            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect('user');

        }

    }

    public function login_view(){

        $this->load->view("login.php");

    }

    function login_user(){
        $user_login=array(

            'email' => $this->input->post('user_email'),
            'password' => md5($this->input->post('user_password'))

        );

        $data = $this->user_model->login_user($user_login['email'], $user_login['password']);
        if($data)
        {

            $this->session->set_userdata('user_id',$data['id']);
            $this->session->set_userdata('user_email',$data['email']);
            $this->session->set_userdata('user_name',$data['name']);



            redirect('apps');

        }
        else{
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            $this->load->view("login.php");

        }


    }

    function user_profile(){

        $this->load->view('user_profile.php');

    }
    public function user_logout(){

        $this->session->sess_destroy();
        redirect('user/login_view', 'refresh');
    }

}

