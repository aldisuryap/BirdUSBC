<?php defined('BASEPATH') or exit('No direct script access allowed');

class ViewList extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Burung_model');
        $this->load->model('Detail_model');
    }

    public function index()
    {
        $data['burung_data'] = $this->Burung_model->getAll();
        $data['detail_burung'] = $this->Detail_model->getAll();

        $this->load->view('list', $data);
    }
}
