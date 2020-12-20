<html>

<head>
    <?php $this->load->view('components/headerAdmin'); ?>
</head>

<body>
    <?php $this->load->view('components/navbarAdmin'); ?>

    <div class="section white">

        <div class="row">
            <div class="col s12 m4 l3 ">
                <ul id="slide-out" class="sidenav sidenav-fixed">
                    <li><a onClick="toggleVisibility('Menu1')"><i class="fas fa-feather"></i>Data Burung</a></li>
                    <li><a onClick="toggleVisibility('Menu2')"><i class="fas fa-feather"></i>User</a></li>
                </ul>
            </div>

            <div id="Menu1">
                <?php foreach ($burung_data as $burung) : ?>
                    <div class="col10 s2 offset-s2 ml-100">
                        <div class="row">
                            <div class="col m12">
                                <?php if ($this->session->flashdata('success')) : ?>
                                    <div class="card-panel white blurie-text" role="alert">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="card horizontal">
                                    <div class="card-image bg-card" style="background-image: url(<?= base_url('assets/upload/' . $burung->img_burung) ?>)">
                                        <h5 class="white-text mt-0 bg-titlecard"><?= $burung->nama_burung ?></h5>
                                    </div>
                                    <div class="card-stacked">
                                        <div class="card-content ">
                                            <div class="row mb-0">
                                                <form class="col s12" action="<?= site_url('admin/updateBurung/' . $burung->id_burung) ?>" method="post" enctype="multipart/form-data">
                                                    <div class="row mb-0">
                                                        <div class="col m1 center">
                                                            <img src="<?= base_url('assets/image/icon/bird_about.svg'); ?>" width="auto" height="50">
                                                        </div>
                                                        <div class="col m11 detail">
                                                            <h5 class="blurie">Deskripsi</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-0">
                                                        <div class="input-field col s12">
                                                            <textarea id="deskripsi" name="deskripsi" class="materialize-textarea"><?= $burung->deskripsi_burung ?></textarea>
                                                            <label for="deskripsi">Deskripsi</label>
                                                            <div class="red-text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-0">
                                                        <div class="col m1 center">
                                                            <img src="<?= base_url('assets/image/icon/bird_howtocare.svg'); ?>" width="auto" height="50">
                                                        </div>
                                                        <div class="col m11 detail">
                                                            <h5 class="blurie">Perawatan</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-0">
                                                        <div class="input-field col s6">
                                                            <textarea id="kandang" name="kandang" class="materialize-textarea"><?= $burung->perawatan_kandang ?></textarea>
                                                            <label for="kandang">Kandang</label>
                                                            <div class="red-text"></div>
                                                        </div>

                                                        <div class="input-field col s6">
                                                            <textarea id="makan" name="makan" class="materialize-textarea"><?= $burung->perawatan_makan ?></textarea>
                                                            <label for="makan">Makan</label>
                                                            <div class="red-text"></div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-0">
                                                        <div class="col m1 center">
                                                            <img src="<?php echo base_url('assets/image/icon/youtube.svg'); ?>" width="auto" height="50">
                                                        </div>
                                                        <div class="col m5 detail">
                                                            <h5 class="blurie">Video</h5>
                                                        </div>
                                                        <div class="col m1 center">
                                                            <img src="<?php echo base_url('assets/image/icon/gallery.svg'); ?>" width="auto" height="50">
                                                        </div>
                                                        <div class="col m5 detail">
                                                            <h5 class="blurie">Gallery</h5>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-0">
                                                        <div class="input-field col s5 file-field">
                                                            <input id="vid_burung2" name="link_vid2" value="<?= $burung->vid_burung ?>" type="text" class="validate">
                                                            <label for="vid_burung2">Link Video Youtube</label>

                                                            <div class="video-container">
                                                                <iframe width="465" height="315" src="<?= $burung->vid_burung ?>" frameborder="0" allowfullscreen>
                                                                </iframe>
                                                            </div>
                                                        </div>

                                                        <div class="col s6 offset-s1">
                                                            <?php
                                                            $dir_thumbs = './assets/upload/thumb/';
                                                            $dir_images = './assets/upload/gallery/';
                                                            $images = directory_map($dir_thumbs);

                                                            $i = 1;
                                                            foreach ($gallery_burung as $gallery) : ?>
                                                                <?php if ($gallery['fk_burung'] == $burung->id_burung) { ?>
                                                                    <a class="galleryAdmin" href="<?= base_url($dir_images) . $gallery['foto_gallery']; ?>">
                                                                        <img class="mt-20 mr-10 image" src="<?= base_url($dir_thumbs) . $gallery['foto_gallery']; ?>" width="100" height="100">
                                                                    </a>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col s12 mt-20">
                                                            <button class="btn-large btn-add waves-effect waves-light" type="submit" name="action">Update</button>
                                                        </div>
                                                    </div>
                                                </form>

                                                <div class="row mb-0">
                                                    <div class="col m1 center">
                                                        <img src="<?php echo base_url('assets/image/icon/data.svg'); ?>" width="auto" height="50">
                                                    </div>
                                                    <div class="col m11 detail">
                                                        <h5 class="blurie">Data Burung</h5>
                                                    </div>
                                                </div>

                                                <form class="col s12" action="<?= site_url('admin/sendDataDetail/' . $burung->id_burung) ?>" method="post">
                                                    <div class="row mb-0">
                                                        <div class="input-field col s3">
                                                            <input id="usia_burung<?= $burung->id_burung ?>" name="usia_burung" type="number" class="validate">
                                                            <label for="usia_burung<?= $burung->id_burung ?>">Usia Burung</label>
                                                            <div class="red-text"><?= form_error('usia_burung'); ?></div>
                                                        </div>
                                                        <div class="input-field col s3">
                                                            <input id="stok_burung<?= $burung->id_burung ?>" name="stok_burung" type="number" class="validate">
                                                            <label for="stok_burung<?= $burung->id_burung ?>">Stok Burung</label>
                                                            <div class="red-text"><?= form_error('stok_burung'); ?></div>
                                                        </div>
                                                        <div class="input-field col s3">
                                                            <input id="harga_burung<?= $burung->id_burung ?>" name="harga_burung" type="number" class="validate">
                                                            <label for="harga_burung<?= $burung->id_burung ?>">Harga Burung</label>
                                                            <div class="red-text"><?= form_error('harga_burung'); ?></div>
                                                        </div>
                                                        <div class="col s3 mt-20">
                                                            <button class="btn-small btn-add2 waves-effect waves-light" type="submit" name="action">Add</button>
                                                        </div>
                                                    </div>
                                                </form>

                                                <div class="row mb-0">
                                                    <div class="col m12">
                                                        <table class="centered highlight">
                                                            <thead>
                                                                <td class="center">Id</td>
                                                                <td class="center">Usia</td>
                                                                <td class="center">Stok</td>
                                                                <td class="center">Harga</td>
                                                                <td class="center">Tambah Foto</td>
                                                                <td class="center">Action</td>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($detail_burung as $detail) : ?>
                                                                    <?php if ($detail['fk_burung'] == $burung->id_burung) { ?>
                                                                        <form class="col s12" action="<?php echo site_url('admin/uploadManyImage/' . $detail['id_detail_burung']) ?>" method="post" enctype="multipart/form-data">
                                                                            <tr>
                                                                                <td><?= $detail['id_detail_burung'] ?></td>
                                                                                <td><?= $detail['usia_burung'] ?> Bulan</td>
                                                                                <td><?= $detail['stok_burung'] ?></td>
                                                                                <td>Rp. <?= number_format($detail['harga_burung'], 2) ?></td>
                                                                                <td>
                                                                                    <div class="row mb-0">
                                                                                        <div class="input-field col s11 file-field">
                                                                                            <div class="btn btn-add">
                                                                                                <span>File</span>
                                                                                                <input type="file" name="gallery_burung[]" multiple>
                                                                                            </div>
                                                                                            <div class="file-path-wrapper">
                                                                                                <input class="file-path validate" placeholder="Choose a Picture" type="text">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <button class="btn-small btn-add waves-effect waves-light" type="submit" name="action">Go</button>
                                                                                    <a class="btn-small waves-orange btn-Update modal-trigger" href="#modal<?= $detail['id_detail_burung'] ?>"><i class="fas fa-edit"></i></a>
                                                                                    <button class="btn-small btn-delete waves-effect waves-light" type="submit" name="action">Delete</button>
                                                                                </td>
                                                                            </tr>
                                                                        </form>


                                                                        <!-- Modal Structure -->
                                                                        <div id="modal<?= $detail['id_detail_burung'] ?>" class="modal">
                                                                            <div class="modal-content">
                                                                                <h4>Form Edit Data Burung <i class="fas fa-edit"></i></h4>
                                                                                <form class="col s12" action="<?= site_url('admin/updateDataDetail/' . $detail['id_detail_burung']) ?>" method="post">
                                                                                    <div class="row mb-0">
                                                                                        <div class="input-field col s3">
                                                                                            <input id="usia_burung<?= $detail['id_detail_burung'] ?>" name="usia_burung" type="number" value="<?= $detail['usia_burung'] ?>" class="validate">
                                                                                            <label for="usia_burung<?= $detail['id_detail_burung'] ?>">Usia Burung</label>
                                                                                            <div class="red-text"><?= form_error('usia_burung'); ?></div>
                                                                                        </div>
                                                                                        <div class="input-field col s3">
                                                                                            <input id="stok_burung<?= $detail['id_detail_burung'] ?>" name="stok_burung" type="number" value="<?= $detail['stok_burung'] ?>" class="validate">
                                                                                            <label for="stok_burung<?= $detail['id_detail_burung'] ?>">Stok Burung</label>
                                                                                            <div class="red-text"><?= form_error('stok_burung'); ?></div>
                                                                                        </div>
                                                                                        <div class="input-field col s3">
                                                                                            <input id="harga_burung<?= $detail['id_detail_burung'] ?>" name="harga_burung" type="number" value="<?= $detail['harga_burung'] ?>" class="validate">
                                                                                            <label for="harga_burung<?= $detail['id_detail_burung'] ?>">Harga Burung</label>
                                                                                            <div class="red-text"><?= form_error('harga_burung'); ?></div>
                                                                                        </div>
                                                                                        <div class="modal-footer col s3">
                                                                                            <button class="btn-large btn-add waves-effect waves-light" type="submit" name="action">Update</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        <?php } ?>
                                                                    <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
                <div class="col10 s2 offset-s2">
                    <div class="row">
                        <div class="center ml-80">
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>


                <!-- START Form Burung -->
                <div class="col10 s2 offset-s2 ml-100">
                    <div class="row">
                        <div class="col m12">
                            <div class="card" id="form_data_burung">
                                <div class="card-content">
                                    <div class="row mb-0">
                                        <div class="col s1 center pl-0 pr-0">
                                            <img src="<?= base_url('assets/image/icon/bird2.svg'); ?>" width="auto" height="50">
                                        </div>
                                        <div class="col s10 detail pl-0">
                                            <h5 class="blurie">Form Data Burung</h5>
                                        </div>
                                    </div>
                                    <div class="mt-30">
                                        <form action="<?= site_url('admin/sendData') ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                                            <div class="row mb-0">
                                                <div class="input-field col s5">
                                                    <input id="nama_burung" name="nama_burung" type="text" class="validate">
                                                    <label for="nama_burung">Nama Burung</label>
                                                    <div class="red-text"><?= form_error('nama_burung'); ?></div>
                                                </div>
                                                <div class="input-field col s6 offset-s1">
                                                    <input id="vid_burung" name="link_vid" type="text" class="validate">
                                                    <label for="vid_burung">Link Video Youtube</label>
                                                </div>
                                            </div>
                                            <div class="row mb-0">
                                                <div class="input-field col s12">
                                                    <textarea id="deskripsi_burung" name="deskripsi_burung" class="materialize-textarea"></textarea>
                                                    <label for="deskripsi_burung">Deskripsi</label>
                                                    <div class="red-text"></div>
                                                </div>
                                            </div>
                                            <div class="row mb-0">
                                                <div class="input-field col s5">
                                                    <textarea id="housing" name="housing" class="materialize-textarea"></textarea>
                                                    <label for="housing">Kandang</label>
                                                    <div class="red-text"></div>
                                                </div>

                                                <div class="input-field col s6 offset-s1">
                                                    <textarea id="feeding" name="feeding" class="materialize-textarea"></textarea>
                                                    <label for="feeding">Makan</label>
                                                    <div class="red-text"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s5 file-field">
                                                    <div class="btn btn-add">
                                                        <span>File</span>
                                                        <input type="file" name="img_burung">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" placeholder="Choose a picture" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <button class="btn btn-add2 waves-effect waves-light ml-12" type="submit" name="action">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Form Burung -->
            </div>


            <!-- START Form Data User -->
            <div class="col10 s2 offset-s2 ml-100" id="Menu2">
                <div class="row">
                    <div class="col m12">
                        <div class="card hoverable">
                            <div class="card-content">
                                <div class="row mb-0">
                                    <div class="col s1 center pl-0 pr-0">
                                        <img src="<?php echo base_url('assets/image/icon/user.svg'); ?>" width="auto" height="50">
                                    </div>
                                    <div class="col s10 detail pl-0">
                                        <h5 class="blurie">List Data User</h5>
                                    </div>
                                </div>
                                <div class="mt-30">
                                    <table>
                                        <thead>
                                            <td class="center">Id</td>
                                            <td class="center">Nama</td>
                                            <td class="center">Email</td>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($user_data as $listUser) : ?>
                                                <tr>
                                                    <td class="center"><?= $listUser->id_user ?></td>
                                                    <td class="center"><?= $listUser->nama_user ?></td>
                                                    <td class="center"><?= $listUser->email ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Form Data User -->

        </div>
    </div>
    <?php $this->load->view('components/script'); ?>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('a.galleryAdmin').simpleLightbox();
        });
    </script>
</body>

</html>