<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apps extends CI_Controller
{
    public function __construct() {
        Parent::__construct();
        $this->load->model("Apps_model");
        $this->load->helper('url');
        $this->load->library('form_validation');

        $this->load->model('menu_m');

    }


    public function index()
    {
        $data = $this->menu_m->get_menus();
        if ($this->input->server('REQUEST_METHOD') == 'GET'){

//            print_r($data);
//            exit();

            $this->load->view('apps/index.php', ['menu' => $data]);
        }
        else if ($this->input->server('REQUEST_METHOD') == 'POST'){


            /* Load form helper */
            $this->load->helper(array('form'));

            /* Load form validation library */
            $this->load->library('form_validation');


            /* Set validation rule for name field in the form */
            $this->form_validation->set_rules('name', 'name', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[50]');
            $this->form_validation->set_rules('text', 'text', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('apps/index',  ['menu' => $data, validation_errors()] );
            }
            else {

                $this->config->load('custom_config');

                $email_config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => '465',
                    'smtp_user' =>  $this->config->item('smtp_user'),
                    'smtp_pass' => $this->config->item('smtp_pass'),
                    'mailtype' => 'html',
                    'starttls' => true,
                    'newline' => "\r\n"
                );

                $this->load->library('email', $email_config);

                $this->email->from($this->input->post('email'), $this->input->post('name'));
                $this->email->to( $this->config->item('mail_to'));
                $this->email->subject($this->input->post('name'));
                $this->email->message($this->input->post('text'));
                $this->email->send();

                $this->load->view('apps/index', ['menu' => $data]);
            }

        }

    }

    public function apps_page()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $type = $this->input->get('type');

        $apps = $this->Apps_model->get_apps($type);
        $data = array();

        foreach($apps->result() as $r) {

            $array = [
                '<a href="'.base_url('MyApp/index/').$r->id.'">'.$r->name.'</a>',
                 substr($r->desc, 0, 60)."..",
                '<img src="'.base_url().'assets/images/apps/'.$r->img.'" style="width:100%;max-width:300px" title="'.$r->img.'" class="myImg"></img>',
                '<a href="'.$r->url.'">'.$r->url.'</a>',
                $r->type
            ];

            if($type= "apps"){
                $array[] =  $r->download_count;
            }

            $data[] = $array;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $apps->num_rows(),
            "recordsFiltered" => $apps->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }


}
