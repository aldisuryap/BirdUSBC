<?php defined('BASEPATH') or exit('No direct script access allowed');

class Details extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Burung_model');
        $this->load->model('Detail_model');
        $this->load->model('Gallery_model');
    }

    public function index()
    {
        $id = $this->uri->segment(3);
        $data['usia'] = ($this->uri->segment(4)) ? $this->Detail_model->getByIdUsia($id, $this->uri->segment(4)) : $this->Detail_model->getRandByIdLimit($id);
        $data['burung_data'] = $this->Burung_model->getById($id);
        $data['detail_burung'] = $this->Detail_model->getById($id);
        $data['gallery_burung'] = $this->Gallery_model->getAll();

        $this->load->view('detail', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
