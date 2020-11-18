<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('logged_in') !== true && $this->session->userdata('role') !== 1)) {
            redirect('home/');
        } else if (($this->session->userdata('logged_in') === true && $this->session->userdata('role') === 2)) {
            redirect('home/');
        }
    }

    public function index()
    {
        $this->load->view('admin');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login/');
    }
}
