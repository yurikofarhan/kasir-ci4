<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-inline p-2"><?= esc($title) ?></h4>

                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-hover zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">Nama Menu</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($getPesanan as $value) : ?>
                                    <?php $total = $value->harga * $ModelCustom->JPesanan($value->id_menu);
                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><img data-toggle="tooltip" data-placement="top" title="" data-original-title="" src="<?= base_url('') ?>/upload/image_menu/<?= $value->image ?>" class="mr-3 img-thumbnail" style="width:160px; height:80px;" alt=""><?= $value->nama_menu ?></td>
                                        <td><?= esc($value->keterangan) ?></td>
                                        <td class="text-center"><?= $ModelCustom->JPesanan($value->id_menu) ?></td>
                                        <td class="text-center"><?= 'Rp' . esc(number_format($total, 0, ',', '.')) ?></td>
                                        <td class="text-center"><a href="#" data-toggle="modal" data-target="#Delete<?= esc($value->id_detail_order) ?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" class="fa fa-trash text-danger"></i></a></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-right">Total Harga :</th>
                                    <th class="text-center"><?php
                                                            foreach ($ModelCustom->JHargaP() as $harga) {
                                                                echo 'Rp' . esc(number_format(floatval($harga->harga), 0, ',', '.'));
                                                            } ?></th>
                                    <th class="text-center"><button class="btn mb-1 btn-rounded btn-primary" data-toggle="modal" <?= !isset($harga->harga) ? 'disabled' : '' ?> data-target="#checkout"><i class="fas fa-shopping-cart"></i> Checkout</button></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($getPesanan as $value) : ?>
    <div class="modal fade" id="Delete<?= esc($value->id_detail_order) ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pl-3"> Hapus Jumlah <b class="text-primary"><?= esc($value->nama_menu) ?></b></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="mt-3 mb-3 pl-3 pr-3" action="<?= site_url('pesanan/' .  $value->id_menu . '/delete') ?>" method="post" onsubmit="retrun checkForm($this);">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Jumlah:</label>
                            <input type="number" class="form-control <?= $validation->hasError('jumlah') ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah" min="1" max="<?= $ModelCustom->JPesanan($value->id_menu) ?>" onkeyup="if(parseInt(this.value)><?= $ModelCustom->JPesanan($value->id_menu) ?>){ this.value =<?= $ModelCustom->JPesanan($value->id_menu) ?>; return false; }" value="1<?= set_value('jumlah') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah') ?>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<div class="modal fade" id="checkout">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pl-3">Pembayaran Tunai</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="mt-3 mb-3 pl-3 pr-3" action="<?= site_url('pesanan/checkout') ?>" method="post">
                    <?= csrf_field(); ?>

                    <div class="form-group">
                        <label>Uang :</label>
                        <div class="input-group has-validation">

                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>

                            <input type="number" class="form-control <?= $validation->hasError('uang') ? 'is-invalid' : '' ?>" id="uang" name="uang" min="<?= $harga->harga ?>" step="1000" max="100000000" onkeyup="if(parseInt(this.value)>10000000){ this.value =10000000; return false; }" value="<?= $harga->harga ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('uang') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nomor Meja :</label>
                        <div class="input-group has-validation">

                            <div class="input-group-prepend">
                                <span class="input-group-text">No.</span>
                            </div>

                            <input type="number" class="form-control <?= $validation->hasError('no_meja') ? 'is-invalid' : '' ?>" id="no_meja" name="no_meja" min="1" max="99" onkeyup="if(parseInt(this.value)>20){ this.value =20; return false; }" value="<?= set_value('no_meja') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('no_meja') ?>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn btn-primary">Bayar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>