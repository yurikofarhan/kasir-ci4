<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-inline p-2"><?= esc($title) ?></h4>
                    <button class="btn mb-1 btn-rounded btn-primary" data-toggle="modal" data-target="#Create"><i class="fa fa-plus"></i> Buat Akun</button>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-hover zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">Nama</th>
                                    <th>Username</th>
                                    <th>Akun Level</th>
                                    <th>Waktu Dibuat</th>
                                    <th>Waktu DiUpdate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($getAkun as $value) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><img data-toggle="tooltip" data-placement="top" title="" data-original-title="" src="<?= base_url('') ?>/upload/image_profile/<?= esc($value['image']) ?>" class="mr-3 img-thumbnail" style="border-radius: 100%;width:40px; height:40px;" alt=""><?= esc($value['nama_user']) ?></td>
                                        <td>@<?= esc($value['username']) ?></td>
                                        <td><span class="label gradient-<?php if ($value['level'] == "admin") {
                                                                            echo "7";
                                                                        } elseif ($value['level'] == "manajer") {
                                                                            echo "2";
                                                                        } elseif ($value['level'] == "kasir") {
                                                                            echo "3";
                                                                        } ?> rounded"><?= ucwords(esc($value['level'])) ?></span></td>
                                        <td><?= esc($value['created_at']) ?></td>
                                        <td><?= esc($value['updated_at']) ?></td>
                                        <td>
                                            <?php if ($value['id_user'] == session()->get('id_user')) : ?>
                                                <a href="<?= site_url('/profile') ?>"><button type="button" class="btn mb-1 btn-info">Lihat Profile</button></a>
                                            <?php else : ?>
                                                <span>
                                                    <a href="<?= site_url('akun/' . esc($value['id_user']) . '/update') ?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" class="fas fa-edit "></i> </a>
                                                    <a href="#" data-toggle="modal" data-target="#Delete<?= esc($value['id_user']) ?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" class="fa fa-trash text-danger"></i></a>
                                                </span>
                                            <?php endif ?>
                                        </td>
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

<!-- ================================================>
                Modal Create Akun
<================================================== -->
<div class="modal fade" id="Create">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pl-3"> Buat Akun</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="mt-3 mb-3 pl-3 pr-3 login-input" action="<?= site_url('akun/create') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="name" class="form-control" placeholder="Nama User" name="nama_user" value="<?= set_value('nama_user') ?>">
                        <?php if (isset($validation)) : ?>
                            <div class="text-danger" style="font-size: 12px;">
                                <p><?= $validation->getError('nama_user'); ?></p>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <input type="username" class="form-control" placeholder="Username" name="username" value="<?= set_value('username') ?>">
                        <?php if (isset($validation)) : ?>
                            <div class="text-danger" style="font-size: 12px;">
                                <p><?= $validation->getError('username'); ?></p>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="">
                            <?php if (isset($validation)) : ?>
                                <div class="text-danger" style="font-size: 12px;">
                                    <p><?= $validation->getError('password'); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Password konfirmasi" value="">
                            <?php if (isset($validation)) : ?>
                                <div class="text-danger" style="font-size: 12px;">
                                    <p><?= $validation->getError('password_confirm'); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
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
                            <select class="custom-select" id="inlineFormCustomSelect" name="level">
                                <option value="<?= null ?>">Akun Sebagai...</option>
                                <!-- <php foreach ($getEnum as $E) ?> -->
                                <option <?= 'admin' == set_value('level') ? "selected='selected'" : null ?> value="admin">Admin</option>
                                <option <?= 'manajer' == set_value('level') ? "selected='selected'" : null ?> value="manajer">Manajer</option>
                                <option <?= 'kasir' == set_value('level') ? "selected='selected'" : null ?> value="kasir">Kasir</option>
                            </select>
                            <?php if (isset($validation)) : ?>
                                <div class="text-danger" style="font-size: 12px;">
                                    <p><?= $validation->getError('level'); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <div style="width: 200px;" id="imagePreview"></div>
                        </div>

                    </div>
                    <!-- <button class="btn login-form__btn submit w-100">Sign in</button> -->

                    <!-- <p class="mt-5 login-form__footer">Dont have account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#LoginModal"  class="text-primary">Sign Up</a> now</p> -->
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn btn-primary">Create</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>
<!-- ================================================>
                end Modal Create Akun
<================================================== -->

<!-- ================================================>
                Modal Update Akun(no use)
<================================================== -->
<?php foreach ($getAkun as $value) : ?>
    <div class="modal fade" id="Update<?= esc($value['id_user']) ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pl-3"> Ubah Akun <b class="text-primary"><?= esc($value['nama_user']) ?></b></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="mt-3 mb-3 pl-3 pr-3 login-input" action="<?= site_url('akun/' . esc($value['id_user']) . '/update') ?>" method="post" enctype="multipart/form-data" onsubmit="retrun checkForm($this);">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <input type="name" class="form-control" placeholder="Nama User" name="nama_user" value="<?= esc($value['nama_user']) ?>">
                            <?php if (isset($validation)) : ?>
                                <div class="text-danger" style="font-size: 12px;">
                                    <p><?= $validation->getError('nama_user'); ?></p>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <input type="username" class="form-control" placeholder="Username" name="username" value="<?= esc($value['username']) ?>">
                            <?php if (isset($validation)) : ?>
                                <div class="text-danger" style="font-size: 12px;">
                                    <p><?= $validation->getError('username'); ?></p>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="">
                                <?php if (isset($validation)) : ?>
                                    <div class="text-danger" style="font-size: 12px;">
                                        <p><?= $validation->getError('password'); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Password konfirmasi" value="">
                                <?php if (isset($validation)) : ?>
                                    <div class="text-danger" style="font-size: 12px;">
                                        <p><?= $validation->getError('password_confirm'); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <input type="file" class="form-control-file" name="image" id="file">
                                <?php if (isset($validation)) : ?>
                                    <div class=" text-danger" style="font-size: 12px;">
                                        <p><?= $validation->getError('image'); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <select class="custom-select" id="inlineFormCustomSelect" name="level">
                                    <option disabled value="<?= null ?>">Akun Sebagai...</option>
                                    <!-- <php foreach ($getEnum as $E) ?> -->
                                    <option <?php if ('admin' == $value['level']) {
                                                echo "selected='selected'";
                                            } ?> value="admin">Admin</option>
                                    <option <?php if ('manajer' == $value['level']) {
                                                echo "selected='selected'";
                                            } ?> value="manajer">Manajer</option>
                                    <option <?php if ('kasir' == $value['level']) {
                                                echo "selected='selected'";
                                            } ?> value="kasir">Kasir</option>
                                </select>
                                <?php if (isset($validation)) : ?>
                                    <div class="text-danger" style="font-size: 12px;">
                                        <p><?= $validation->getError('level'); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <div style="width: 200px;" id="imagePreview"></div>
                            </div>

                        </div>
                        <!-- <button class="btn login-form__btn submit w-100">Sign in</button> -->

                        <!-- <p class="mt-5 login-form__footer">Dont have account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#LoginModal"  class="text-primary">Sign Up</a> now</p> -->
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Update Akun</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- ================================================>
                end Modal Update Akun
<================================================== -->
<!-- ================================================>
                Modal Delete Akun
<================================================== -->
<?php foreach ($getAkun as $user) : ?>
    <div class="modal fade" id="Delete<?= esc($user['id_user']) ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pl-1">Hapus akun <b class="text-primary"><?= esc($user['nama_user']) ?></b></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin Ingin Menghapus akun <b class="text-primary"><?= esc($user['nama_user']) ?></b>
                </div>

                <div class="modal-footer">
                    <form action="<?= site_url('akun/' . esc($user['id_user']) . '/delete') ?>" method="post">
                        <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn mb-1 btn-danger">Hapus</button>
                    </form>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- ================================================>
                end Modal Delete Akun
<================================================== -->


<?= $this->endSection(); ?>