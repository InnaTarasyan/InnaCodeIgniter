<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyApp extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->model("Apps_model");
        $this->load->helper('url');
    }

    public function index($id){

        $app = $this->Apps_model->get_app($id);
        $comments = $this->Apps_model->get_app_comments($id);

        $this->load->view('apps/application',
            ['application' => $app,
             'comments' => $comments ]);
    }
}