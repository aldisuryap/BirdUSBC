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
    $this->load->library('form_validation');
    $this->load->library('image_lib');
    $this->load->model('Burung_model');
    $this->load->model('Detail_model');
    $this->load->model('Gallery_model');
    $this->load->model('User_model');
  }

  public function index()
  {
    $data['detail_burung'] = $this->Detail_model->getJoin();
    $set_page = array(
      'row' => $this->Burung_model->jumlah_data(),
      'page' => 1
    );
    $this->load->library('pagination', $this->set_pagination_options($set_page));

    $from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    $data['burung_data'] = $this->Burung_model->getDataLimit($set_page['page'], $from);

    $role['role'] = 2;
    $data['user_data'] = $this->User_model->getByData($role)->result();
    $data['gallery_burung'] = $this->Gallery_model->getJoin();


    $this->load->view('admin', $data);
  }

  private function set_pagination_options($set)
  {
    $config = array(
      'full_tag_open' => '<ul class="pagination">',
      'full_tag_close' => '</ul>',
      'first_link' => false,
      'first_link' => false,
      'cur_tag_open' => '<li style="font-size: 25px" class="waves-effect active"><a>',
      'cur_tag_close' => '</a></li>',
      'next_tag_open' => '<li style="font-size: 25px" class="waves-effect">',
      'next_tag_close' => '</li>',
      'prev_tag_open' => '<li style="font-size: 25px" class="waves-effect">',
      'prev_tag_close' => '</li>',
      'num_tag_open' => '<li style="font-size: 25px" class="waves-effect">',
      'num_tag_close' => '</li>',
      'base_url' => base_url('admin/index'),
      'total_rows' => $set['row'],
      'per_page' => $set['page']
    );
    return $config;
  }

  private function set_upload_options($path)
  {
    $config = array(
      'upload_path' => $path,
      'allowed_types' => '*',
      'max_size' => 50901730,
      'overwrite' => TRUE,
      'remove_spaces' => TRUE
    );
    return $config;
  }

  private function resizeImage($filename, $path)
  {
    $source_path = $path . $filename;
    $target_path = './assets/upload/thumb/';
    $imageSize = $this->image_lib->get_image_properties($source_path, TRUE);
    $config_manip = array(
      'image_library' => 'gd2',
      'source_image' => $source_path,
      'new_image' => $target_path,
      'maintain_ratio' => FALSE,
      'create_thumb' => FAlSE,
      'width' => 600,
      'height' => 600,
      'x_axis' => 0,
      'y_axis' => ($imageSize['height'] - 600) / 2
    );

    $this->image_lib->initialize($config_manip);
    if (!$this->image_lib->resize()) {
      echo $this->image_lib->display_errors();
    }
    $this->image_lib->crop();
    $this->image_lib->clear();
  }

  private function resizeImageList($filename, $path)
  {
    $source_path = $path . $filename;
    $target_path = './assets/upload/list/';
    $imageSize = $this->image_lib->get_image_properties($source_path, TRUE);
    $config_manip = array(
      'image_library' => 'gd2',
      'source_image' => $source_path,
      'new_image' => $target_path,
      'maintain_ratio' => FALSE,
      'create_thumb' => FAlSE,
      'width' => 600,
      'height' => 340
    );

    $this->image_lib->initialize($config_manip);
    $this->image_lib->resize();
    $this->image_lib->clear();
  }

  public function uploadImage()
  {
    $path = './assets/upload/';
    $this->load->library('upload', $this->set_upload_options($path));
    if (!$this->upload->do_upload('img_burung')) {
      $this->upload->display_errors();
    } else {
      $this->resizeImageList($this->upload->file_name, $path);
      return $this->upload->file_name;
    }
  }

  public function uploadManyImage()
  {
    $path = './assets/upload/gallery/';
    $count = count($_FILES['gallery_burung']['name']);

    for ($i = 0; $i < $count; $i++) {
      if (!empty($_FILES['gallery_burung']['name'][$i])) {
        $_FILES['file']['name'] = $_FILES['gallery_burung']['name'][$i];
        $_FILES['file']['type'] = $_FILES['gallery_burung']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['gallery_burung']['tmp_name'][$i];
        $_FILES['file']['error'] = $_FILES['gallery_burung']['error'][$i];
        $_FILES['file']['size'] = $_FILES['gallery_burung']['size'][$i];

        $this->load->library('upload', $this->set_upload_options($path));

        if ($this->upload->do_upload('file')) {
          $uploadData = $this->upload->data();
          $filename = preg_replace('/\s+/', '', $uploadData['file_name']);
          $data = array(
            'fk_detail_burung' => $this->uri->segment(3),
            'foto_gallery' => $filename
          );
          $this->Gallery_model->addData($data);
          $this->resizeImage($uploadData['file_name'], $path);
          $this->session->set_flashdata('success', 'Berhasil disimpan');
        } else {
          $this->session->set_flashdata('success', 'Gagal upload');
        }
      }
    }
    redirect('admin/');
  }

  public function sendData()
  {
    if ($this->validation()) {
      $filename = preg_replace('/\s+/', '', $this->uploadImage());
      if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $this->input->post('link_vid'), $match)) {
        $video_id = $match[1];
      }
      $filenameVideo = "https://www.youtube.com/embed/" . $video_id;
      $data = array(
        'nama_burung' => $this->input->post('nama_burung'),
        'deskripsi_burung' => $this->input->post('deskripsi_burung'),
        'perawatan_kandang' => $this->input->post('housing'),
        'perawatan_makan' => $this->input->post('feeding'),
        'vid_burung' => $filenameVideo,
        'img_burung' => $filename
      );
      $this->Burung_model->addData($data);
      $this->session->set_flashdata('success', 'Berhasil disimpan');
      redirect('admin/');
    }
  }

  public function sendDataDetail()
  {
    if ($this->validation2()) {
      $data = array(
        'fk_burung' => $this->uri->segment(3),
        'harga_burung' => $this->input->post('harga_burung'),
        'usia_burung' => $this->input->post('usia_burung'),
        'stok_burung' => $this->input->post('stok_burung')
      );
      $this->Detail_model->addData($data);
      $this->session->set_flashdata('success', 'Berhasil disimpan');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  public function updateDataDetail()
  {
    if ($this->validation2()) {
      $id = $this->uri->segment(3);
      $data = array(
        'harga_burung' => $this->input->post('harga_burung'),
        'usia_burung' => $this->input->post('usia_burung'),
        'stok_burung' => $this->input->post('stok_burung')
      );
      $this->Detail_model->updateData($data, $id);
      $this->session->set_flashdata('success', 'Berhasil disimpan');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  public function validation()
  {
    $this->form_validation->set_rules(
      'nama_burung',
      'Nama Burung',
      'required',
      array('required' => 'Masukkan nama burung!')
    );
    $this->form_validation->set_rules(
      'deskripsi_burung',
      'Deskripsi',
      'required',
      array('required' => 'Masukkan deskripsi burung!')
    );
    $this->form_validation->set_rules(
      'housing',
      'Perawatan Kandang',
      'required',
      array('required' => 'Masukkan data perawatan kandang!')
    );
    $this->form_validation->set_rules(
      'feeding',
      'Perawatan Makan',
      'required',
      array('required' => 'Masukkan data perawatan makan!')
    );

    if ($this->form_validation->run() === false) {
      $this->load->view('admin');
    } else {
      return true;
    }
  }

  public function validation2()
  {
    $this->form_validation->set_rules(
      'harga_burung',
      'Harga Burung',
      'required',
      array('required' => 'Masukkan harga burung!')
    );
    $this->form_validation->set_rules(
      'stok_burung',
      'Stok Burung',
      'required',
      array('required' => 'Masukkan stok burung!')
    );
    $this->form_validation->set_rules(
      'usia_burung',
      'Usia Burung',
      'required',
      array('required' => 'Masukkan usia burung!')
    );

    if ($this->form_validation->run() === false) {
      $this->load->view('admin');
    } else {
      return true;
    }
  }

  public function delete()
  {
    $data = array(
      'id_burung' => $this->uri->segment(3)
    );
    $this->Burung_model->deleteData($data);
    $this->session->set_flashdata('success', 'Berhasil dihapus');
    redirect('admin/');
  }

  public function updateBurung()
  {
    $id = $this->uri->segment(3);
    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $this->input->post('link_vid2'), $match)) {
      $video_id = $match[1];
    }
    $filenameVideo = "https://www.youtube.com/embed/" . $video_id;
    $data = array(
      'deskripsi_burung' => $this->input->post('deskripsi'),
      'perawatan_kandang' => $this->input->post('kandang'),
      'perawatan_makan' => $this->input->post('makan'),
      'vid_burung' => $filenameVideo
    );
    $this->Burung_model->updateData($data, $id);
    $this->session->set_flashdata('success', 'Berhasil disimpan');
    redirect('admin/');
  }

  public function updateDetail()
  {
    $id = $this->uri->segment(3);
    $data = array(
      'harga_burung' => $this->input->post('harga'),
      'stok_burung' => $this->input->post('stok'),
      'usia_burung' => $this->input->post('usia')
    );
    $this->Detail_model->updateData($data, $id);
    $this->session->set_flashdata('success', 'Berhasil disimpan');
    redirect('admin/');
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login/');
  }
}
