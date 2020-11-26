<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gallery_model');
    }
    public function index()
    {
        $data['gallery_burung'] = $this->Gallery_model->getRandByLimit();
        $this->load->view('home', $data);
    }
}
