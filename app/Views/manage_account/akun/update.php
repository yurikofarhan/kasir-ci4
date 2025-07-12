<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-inline p-2"><?= esc($title) ?> <b class="text-primary"><?= esc(ucwords($getUser['nama_user'])) ?></b></h4>
                    <a href="<?= site_url('akun') ?>"><button class="btn mb-1 btn-rounded btn-outline-secondary"><i class="fa fa-arrow-left text-secondary"></i> Kembali</button></a>

                    <!-- ?php if (session()->get('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            ?= session()->get('success') ?>
                        </div>
                    <php endif; ?> -->
                    <form class="mt-3 mb-3 pl-3 pr-3" action="<?= site_url('akun/' . esc($getUser['id_user']) . '/update') ?>" method="post" enctype="multipart/form-data">
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
                                    <span class="input-group-text">@</span>
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
                                <label>Akun Sebagai</label>
                                <select class="form-control <?= $validation->hasError('level') ? 'is-invalid' : 'is-valid' ?>" id="inputState" name="level">
                                    <option disabled value="<?= null ?>">Akun Sebagai...</option>
                                    <!-- <php foreach ($getEnum as $E) ?> -->
                                    <option <?php if ('admin' == $getUser['level']) {
                                                echo "selected='selected'";
                                            } ?> value="admin">Admin</option>
                                    <option <?php if ('manajer' == $getUser['level']) {
                                                echo "selected='selected'";
                                            } ?> value="manajer">Manajer</option>
                                    <option <?php if ('kasir' == $getUser['level']) {
                                                echo "selected='selected'";
                                            } ?> value="kasir">Kasir</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('level') ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control <?= $validation->hasError('image') ? 'is-invalid' : null ?>" name="image" id="file" onchange="return fileValidation()">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('image') ?>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div style="width: 200px;" id="imagePreview"></div>
                        </div>
                        <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>