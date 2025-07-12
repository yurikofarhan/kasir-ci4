<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?= base_url('') ?>/upload/image_profile/<?= esc($getUser['image']) ?>" class="rounded-circle img-fluid" style="border-radius: 100%;width:120px; height:120px;" alt="">
                        <h5 class="mt-3 mb-2"><?= esc(ucwords($getUser['nama_user'])) ?></h5>
                        <p class="m-0"><span class="label gradient-<?php if ($getUser['level'] == "admin") {
                                                                        echo "7";
                                                                    } elseif ($getUser['level'] == "manajer") {
                                                                        echo "2";
                                                                    } elseif ($getUser['level'] == "kasir") {
                                                                        echo "3";
                                                                    } ?> rounded"><?= ucwords(esc($getUser['level'])) ?></span></p>
                        <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-9">


            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Profile</h4>
                    <div class="basic-form">
                        <form class="mt-3 mb-3 pl-3 pr-3" action="<?= site_url('/profile') ?>" method="post" enctype="multipart/form-data" onsubmit="retrun checkForm($this);">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama User</label>
                                <input type="text" name="nama_user" class="form-control <?= $validation->hasError('nama_user') ? 'is-invalid' : 'is-valid' ?>" placeholder="Nama Petugas..." value="<?= esc(set_value('', $getUser['nama_user'])) ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_user') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group has-validation">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                                    </div>

                                    <input type="text" name="username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : 'is-valid' ?>" placeholder="@Username..." value="<?= esc(set_value('', $getUser['username'])) ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : null ?>" placeholder="Password...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="password_confirm" id="password_confirm" class="form-control <?= $validation->hasError('password_confirm') ? 'is-invalid' : null ?>" placeholder="Konfirmasi Password...">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password_confirm') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Upload Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="form-control <?= $validation->hasError('image') ? 'is-invalid' : null ?>" name="image" id="file" onchange="return fileValidation()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('image') ?>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div style="width: 200px;" id="imagePreview"></div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>