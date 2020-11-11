<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') === true) {
            redirect('home/');
        }
        $this->load->library('form_validation');
        // $this->load->model('User_model');
    }

    public function index()
    {
        $data['tabs'] = $this->uri->segment(3);
        $this->load->view('login_page', $data);
    }

    public function login()
    {
        if ($this->validationLogin()) {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password'))
            );
            $cekData = $this->User_model->getByData($data);
            if ($cekData->num_rows() > 0) {
                $roleData = $cekData->row_array();
                $sessionData = array(
                    'username' => $roleData['nama_user'],
                    'role' => $roleData['role'],
                    'logged_in' => true
                );
                if ($roleData['role'] == 1) {
                    $this->session->set_userdata($sessionData);
                    redirect('admin/');
                } else if ($roleData['role'] == 2) {
                    $this->session->set_userdata($sessionData);
                    redirect('viewlist/');
                }
            } else {
                redirect('login/');
            }
        }
    }

    public function sendData()
    {
        if ($this->validationSignup()) {
            $data = array(
                'nama_user' => $this->input->post('username'),
                'password' => md5($this->input->post('password2')),
                'email' => $this->input->post('email2')
            );
            $this->User_model->addData($data);
            $this->session->set_flashdata('success', 'Sign-Up Berhasil');
            redirect('login/');
        }
    }

    public function validationLogin()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array('required' => 'Please enter Email!', 'valid_email' => 'Only valid email are allowed!')
        );
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]', array('required' => 'Please enter Password!', 'min_length[4]' => 'Please enter at least 4 digit!'));

        if ($this->form_validation->run() === false) {
            $data['tabs'] = 'login';
            $this->load->view('login_page', $data);
        } else {
            return true;
        }
    }

    public function validationSignup()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|min_length[4]|max_length[14]',
            array('required' => 'Please enter Username!', 'min_length[4]' => 'Please enter at least 4 digit!', 'max_length[14]' => 'Sorry, 14 digit only!')
        );
        $this->form_validation->set_rules(
            'email2',
            'Email',
            'required|valid_email',
            array('required' => 'Please enter Email!', 'valid_email' => 'Only valid email are allowed!')
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|min_length[4]', array('required' => 'Please enter Password!', 'min_length[4]' => 'Please enter at least 4 digit!'));

        if ($this->form_validation->run() === false) {
            $data['tabs'] = 'signup';
            $this->load->view('login_page', $data);
        } else {
            return true;
        }
    }
}
