<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MyApp extends CI_Controller
{

    public function __construct()
    {
        Parent::__construct();
        $this->load->model("Apps_model");
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index($id){

        $this->load->library('parser');

        $application = $this->Apps_model->get_app($id);
        $comments = $this->Apps_model->get_app_comments($id);

        if ($this->input->server('REQUEST_METHOD') == 'GET'){

            $this->load->view('apps/application',
                ['application' => $application,
                    'comments' => $comments ]);
        }  else if ($this->input->server('REQUEST_METHOD') == 'POST'){


            /* Load form helper */
            $this->load->helper(array('form'));
            $user_id = $this->session->userdata('user_id');

            $this->form_validation->set_rules('text', 'text', 'required');

            if(!$user_id){

//                $this->form_validation->set_rules('text', 'text', 'required');
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('email', 'email', 'valid_email|required');



            }

            if ($this->form_validation->run() == FALSE) {

                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode(array(
                        'error' => validation_errors(),
                    )));
            }

                $data['text'] = $this->input->post('text');
                $data['application_id'] = $application->id;
                $data['parent_id'] = $this->input->post('comment_parent');
                $data['name'] =   $this->session->userdata('user_name') ?  $this->session->userdata('user_name') : $this->input->post('name');
                $data['email'] = $this->session->userdata('user_email') ? $this->session->userdata('user_email') : $this->input->post('email');
                $data['site'] = $this->input->post('site');

                $data['user_id'] =  $this->session->userdata('user_id');

                $data['id'] =  $this->Apps_model->add_comment($data);

                $data['hash'] = md5($this->input->post('email'));
                $data['created_at'] = date('Y-m-d H:i:s');

                $view_comment = $this->parser->parse('apps/content_one_comment', ['data' => $data], TRUE);

                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode(array(
                        'data' => $data,
                        'success' => TRUE,
                        'comment' => $view_comment,
                    )));

//            }

        }

    }

}