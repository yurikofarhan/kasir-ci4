<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-inline"><?= esc($title)  ?></h4>
                <?php if (session()->get('level') == 'manajer') : ?>
                    <button class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#Create"><i class="fa fa-plus"></i> Create</button>
                <?php endif ?>
                <p class="text-muted">Short by:</p>
                <!-- Nav tabs -->
                <div class="custom-tab-2 ">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Semua Menu <span class="label gradient-4" style="border-radius: 100%;"><?= esc($menu) ?></span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#makanan">Makanan <span class="label gradient-2" style="border-radius: 100%;"><?= esc($makanan) ?></span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#minuman">Minuman <span class="label gradient-8" style="border-radius: 100%;"><?= esc($minuman) ?></span></a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>




        <div class="tab-content">
            <div class="tab-pane fade show active" id="menu" role="tabpanel">
                <div class="col-12">
                    <div class="row">
                        <?php foreach ($getMenu  as $value) : ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="img-fluid" src="<?= base_url('') ?>/upload/image_menu/<?= esc($value['image']) ?>" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= esc($value['nama_menu']) ?></h5>
                                        <p class="card-text"><?= ((esc($value['status_menu']) == 'tersedia') ? 'Tersedia' : 'Tidak Tersedia') ?></p>
                                        <h5 class="font-weight-bold"><?= 'Rp' . esc(number_format($value['harga'], 0, ',', '.')) ?></h5>
                                    </div>
                                    <div class="card-footer">
                                        <!-- <p class="card-text d-inline"><small class="text-muted">Last updated 3 mins ago</small>
                                    </p><a href="#" class="card-link float-right"><small>Tambahkan</small></a> -->
                                        <?php if (session()->get('level') == 'kasir') : ?>
                                            <button type="button" data-toggle="modal" <?= $value['status_menu'] == 'tidak_tersedia' ? 'disabled' : '' ?> data-target="#Pesan<?= esc($value['id_menu']) ?>" class="btn btn-primary btn-sm">Pesan</button>
                                        <?php elseif (session()->get('level') == 'manajer') : ?>
                                            <a href="<?= site_url('menu/' . $value['id_menu'] . '/update') ?>"><button type="button" class="btn btn-outline-secondary btn-sm">Edit</button></a>
                                            <button type="button" data-toggle="modal" data-target="#Delete<?= esc($value['id_menu']) ?>" class="btn btn-outline-danger btn-sm">Hapus</button>
                                        <?php endif ?>



                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="makanan" role="tabpanel">
                <div class="col-12">
                    <div class="row">
                        <?php foreach ($getMakanan  as $value) : ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="img-fluid" src="<?= base_url('') ?>/upload/image_menu/<?= esc($value['image']) ?>" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= esc($value['nama_menu']) ?></h5>
                                        <p class="card-text"><?= ((esc($value['status_menu']) == 'tersedia') ? 'Tersedia' : 'Tidak Tersedia') ?></p>
                                        <h5 class="font-weight-bold"><?= 'Rp' . esc(number_format($value['harga'], 0, ',', '.')) ?></h5>
                                    </div>
                                    <div class="card-footer">
                                        <!-- <p class="card-text d-inline"><small class="text-muted">Last updated 3 mins ago</small>
                                    </p><a href="#" class="card-link float-right"><small>Tambahkan</small></a> -->
                                        <?php if (session()->get('level') == 'kasir') : ?>
                                            <button type="button" data-toggle="modal" data-target="#Pesan<?= esc($value['id_menu']) ?>" <?= $value['status_menu'] == 'tidak_tersedia' ? 'disabled' : '' ?> class="btn btn-primary btn-sm">Pesan</button>
                                        <?php elseif (session()->get('level') == 'manajer') : ?>
                                            <a href="<?= site_url('menu/' . $value['id_menu'] . '/update') ?>"><button type="button" class="btn btn-outline-secondary btn-sm">Edit</button></a>
                                            <button type="button" data-toggle="modal" data-target="#Delete<?= esc($value['id_menu']) ?>" class="btn btn-outline-danger btn-sm">Hapus</button>
                                        <?php endif ?>


                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="minuman" role="tabpanel">
                <div class="col-12">
                    <div class="row">
                        <?php foreach ($getMinuman  as $value) : ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="img-fluid" src="<?= base_url('') ?>/upload/image_menu/<?= esc($value['image']) ?>" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= esc($value['nama_menu']) ?></h5>
                                        <p class="card-text"><?= ((esc($value['status_menu']) == 'tersedia') ? 'Tersedia' : 'Tidak Tersedia') ?></p>
                                        <h5 class="font-weight-bold"><?= 'Rp' . esc(number_format($value['harga'], 0, ',', '.')) ?></h5>
                                    </div>
                                    <div class="card-footer">
                                        <?php if (session()->get('level') == 'kasir') : ?>
                                            <button type="button" data-toggle="modal" data-target="#Pesan<?= esc($value['id_menu']) ?>" <?= $value['status_menu'] == 'tidak_tersedia' ? 'disabled' : '' ?> class="btn btn-primary btn-sm">Pesan</button>
                                        <?php elseif (session()->get('level') == 'manajer') : ?>
                                            <a href="<?= site_url('menu/' . $value['id_menu'] . '/update') ?>"><button type="button" class="btn btn-outline-secondary btn-sm">Edit</button></a>
                                            <button type="button" data-toggle="modal" data-target="#Delete<?= esc($value['id_menu']) ?>" class="btn btn-outline-danger btn-sm">Hapus</button>
                                        <?php endif ?>


                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
<!-- ================================================>
                Modal Create menu
<================================================== -->
<?php if (session()->get('level') == 'manajer') : ?>
    <div class="modal fade" id="Create">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pl-3"> Buat Menu</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="mt-3 mb-3 pl-3 pr-3 login-input" action="<?= site_url('menu/create') ?>" method="post" enctype="multipart/form-data" onsubmit="retrun checkForm($this);">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama Menu" name="nama_menu" value="<?= set_value('nama_menu') ?>">
                            <?php if (isset($validation)) : ?>
                                <div class="text-danger" style="font-size: 12px;">
                                    <p><?= $validation->getError('nama_menu'); ?></p>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> <b>Rp. </b></div>
                                </div>
                                <input type="number" class="form-control pl-2" placeholder="Harga" name="harga" value="<?= set_value('harga') ?>">

                            </div>
                            <?php if (isset($validation)) : ?>
                                <div class="text-danger" style="font-size: 12px;">
                                    <p><?= $validation->getError('harga'); ?></p>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <select class="form-control custom-select" id="inlineFormCustomSelect" name="status_menu">
                                <option value="<?= null ?>">Status Menu...</option>
                                <option <?= 'tersedia' == set_value('status_menu') ? "selected='selected'" : null ?> value="tersedia">Tersedia</option>
                                <option <?= 'tidak_tersedia' == set_value('status_menu') ? "selected='selected'" : null ?> value="tidak_tersedia">Tidak Tersedia</option>
                            </select>
                            <?php if (isset($validation)) : ?>
                                <div class="text-danger" style="font-size: 12px;">
                                    <p><?= $validation->getError('status_menu'); ?></p>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <select class="form-control custom-select" id="inlineFormCustomSelect" name="tipe_menu">
                                <option value="<?= null ?>">Tipe Makanan...</option>
                                <!-- <php foreach ($getEnum as $E) ?> -->
                                <option <?= 'makanan' == set_value('tipe_menu') ? "selected='selected'" : null ?> value="makanan">Makanan</option>
                                <option <?= 'minuman' == set_value('tipe_menu') ? "selected='selected'" : null ?> value="minuman">Minuman</option>
                            </select>
                            <?php if (isset($validation)) : ?>
                                <div class="text-danger" style="font-size: 12px;">
                                    <p><?= $validation->getError('tipe_menu'); ?></p>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="form-group form-row">

                            <div class="col-md-6">
                                <input type="file" class="form-control-file" name="image" id="file" onchange="return fileValidation()">
                                <?php if (isset($validation)) : ?>
                                    <div class="text-danger" style="font-size: 12px;">
                                        <p><?= $validation->getError('image'); ?></p>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="col-md-6">
                                <div id="imagePreview"></div>
                            </div>



                        </div>
                        <!-- <button class="btn login-form__btn submit w-100">Sign in</button> -->

                        <!-- <p class="mt-5 login-form__footer">Dont have account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#LoginModal"  class="text-primary">Sign Up</a> now</p> -->
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn btn-primary">Tambah Menu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ================================================>
               end Modal Create menu
<================================================== -->
    <!-- ================================================>
                Modal Update menu
<================================================== -->
    <?php foreach ($getMenu as $value) : ?>
        <div class="modal fade" id="Edit<?= $value['id_menu'] ?>">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title pl-3">Update Menu <b class="text-primary"><?= $value['nama_menu'] ?></b></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-3 mb-3 pl-3 pr-3 login-input" action="<?= site_url('menu/edit/' . $value['id_menu']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama Menu" name="nama_menu" value="<?= set_value('nama_menu', $value['nama_menu']) ?>">
                                <?php if (isset($validation)) : ?>
                                    <div class="text-danger" style="font-size: 12px;">
                                        <p><?= $validation->getError('nama_menu'); ?></p>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"> <b>Rp. </b></div>
                                    </div>
                                    <input type="number" class="form-control pl-2" placeholder="Harga" name="harga" step="1000" min="1000" value="<?= set_value('harga', $value['harga']) ?>">
                                    <?php if (isset($validation)) : ?>
                                        <div class="text-danger" style="font-size: 12px;">
                                            <p><?= $validation->getError('harga'); ?></p>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Status Menu" name="status_menu" value="<?= set_value('status_menu', $value['status_menu']) ?>">
                                <?php if (isset($validation)) : ?>
                                    <div class="text-danger" style="font-size: 12px;">
                                        <p><?= $validation->getError('status_menu'); ?></p>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="form-group form-row">

                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" name="image" id="file" onchange="return fileValidation()">
                                    <?php if (isset($validation)) : ?>
                                        <div class="text-danger" style="font-size: 12px;">
                                            <p><?= $validation->getError('image'); ?></p>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <div class="col-md-6">
                                    <div id="imagePreview"></div>
                                </div>

                            </div>
                            <!-- <button class="btn login-form__btn submit w-100">Sign in</button> -->

                            <!-- <p class="mt-5 login-form__footer">Dont have account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#LoginModal"  class="text-primary">Sign Up</a> now</p> -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- ================================================>
               end Modal Update menu
<================================================== -->
    <!-- ================================================>
                Modal Delete menu
<================================================== -->
    <?php foreach ($getMenu as $Hapus) : ?>
        <div class="modal fade" id="Delete<?= $Hapus['id_menu'] ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title pl-1">Hapus menu <b class="text-primary"><?= $Hapus['nama_menu'] ?></b></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda yakin Ingin Menghapus menu <b class="text-primary"><?= $Hapus['nama_menu'] ?></b>
                    </div>

                    <div class="modal-footer">
                        <form action="<?= site_url('menu/' . $Hapus['id_menu']) . '/delete' ?>" method="post">
                            <button type="submit" onclick="this.form.submit(); this.disabled = true;" onclick="this.form.submit(); this.disabled = true;" class="btn mb-1 btn-danger">Hapus</button>
                        </form>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <!-- ================================================>
                end Modal Delete menu
<================================================== -->
<?php elseif (session()->get('level') == 'kasir') : ?>
    <?php foreach ($getMenu as $value) : ?>
        <div class="modal fade" id="Pesan<?= esc($value['id_menu']) ?>">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title pl-3"> Pesan <b class="text-primary"><?= esc($value['nama_menu']) ?></b></h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-3 mb-3 pl-3 pr-3" action="<?= site_url('menu/' . $value['id_menu'] . '/pesan') ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Jumlah:</label>
                                <input type="number" class="form-control <?= $validation->hasError('jumlah') ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah" min="1" max="99" onkeyup="if(parseInt(this.value)>99){ this.value =99; return false; }" value="1<?= set_value('jumlah') ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jumlah') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label ">Keterangan:</label>
                                <textarea class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan" value="<?= set_value('keterangan') ?>"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('keterangan') ?>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn btn-primary">Pesan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>


<?= $this->endSection(); ?>