<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Admin';
            $this->load->view('administrator/login/templates/auth_header', $data);
            $this->load->view('administrator/login/login');
            $this->load->view('administrator/login/templates/auth_footer');
        } else {
            // validation success
            $this->_login();
        }
        
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');



        $admin = $this->db->get_where('data_admin', ['email' => $email])->row_array();

        // jika adminnya ada
        if ($admin) {
            // jika adminnya aktif
            if ($admin['is_active'] == 1) {
                // cek passwordnya
                if (password_verify($password, $admin['password'])) {
                    $data = [
                        'nama' => $admin['nama'],
                        'email' => $admin['email']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!</div>');
                    redirect('admin/login/auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This email has not been activated!</div>');
                redirect('admin/login/auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered!</div>');
            redirect('admin/login/auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[data_admin.email]', ['is_unique' => 'This email has already registered!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]', ['min_length' => 'Password too short!']);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Admin Registration';
            $this->load->view('administrator/login/templates/auth_header', $data);
            $this->load->view('administrator/login/registration');
            $this->load->view('administrator/login/templates/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 1,
            ];

            $this->db->insert('data_admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your account has been created. Please Login</div>');
            redirect('admin/login/auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('is_authenticated');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('admin/login/auth');
    }
}
