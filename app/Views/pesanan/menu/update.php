<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-inline p-2"><?= esc($title) ?> <b class="text-primary"><?= esc(ucwords($getMenu['nama_menu'])) ?></b></h4>
                    <a href="<?= site_url('menu') ?>"><button class="btn mb-1 btn-rounded btn-outline-secondary"><i class="fa fa-arrow-left text-secondary"></i> Kembali</button></a>

                    <?php if (session()->get('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->get('success') ?>
                        </div>
                    <?php endif; ?>
                    <form class="mt-3 mb-3 pl-3 pr-3" action="<?= site_url('menu/' . esc($getMenu['id_menu']) . '/update') ?>" method="post" enctype="multipart/form-data" onsubmit="retrun checkForm($this);">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Nama Menu</label>
                                <input type="text" name="nama_menu" class="form-control <?= $validation->hasError('nama_menu') ? 'is-invalid' : 'is-valid' ?>" placeholder="Nama Petugas..." value="<?= esc(set_value('', $getMenu['nama_menu'])) ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_menu') ?>
                                </div>
                            </div>
                            <label>Harga</label>
                            <div class="input-group has-validation">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>

                                <input type="number" name="harga" class="form-control <?= $validation->hasError('harga') ? 'is-invalid' : 'is-valid' ?>" placeholder="0" value="<?= esc(set_value('', $getMenu['harga'])) ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('harga') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Status Menu</label>
                                <select class="form-control <?= $validation->hasError('status_menu') ? 'is-invalid' : 'is-valid' ?>" id="inputState" name="status_menu">
                                    <option disabled value="<?= null ?>">Status Menu</option>
                                    <!-- <php foreach ($getEnum as $E) ?> -->
                                    <option <?php if ('tersedia' == $getMenu['status_menu']) {
                                                echo "selected='selected'";
                                            } ?> value="tersedia">Tersedia</option>
                                    <option <?php if ('tidak_tersedia' == $getMenu['status_menu']) {
                                                echo "selected='selected'";
                                            } ?> value="tidak_tersedia">Tidak Tersedia</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('status_menu') ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tipe Menu</label>
                                <select class="form-control <?= $validation->hasError('tipe_menu') ? 'is-invalid' : 'is-valid' ?>" id="inputState" name="tipe_menu">
                                    <option disabled value="<?= null ?>">Tipe Menu...</option>
                                    <!-- <php foreach ($getEnum as $E) ?> -->
                                    <option <?php if ('makanan' == $getMenu['tipe_menu']) {
                                                echo "selected='selected'";
                                            } ?> value="makanan">Makanan</option>
                                    <option <?php if ('minuman' == $getMenu['tipe_menu']) {
                                                echo "selected='selected'";
                                            } ?> value="minuman">Minuman</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tipe_menu') ?>
                                </div>
                            </div>

                        </div>
                        <div class="form-row mb-2">
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
                                <div id="imagePreview"></div>
                            </div>
                        </div>
                        <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>