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
                                    <th class="text-center">ID Order</th>
                                    <?php if (session()->get('level') == 'manajer') : ?>
                                        <th class="text-center">Nama User</th>
                                    <?php endif ?>
                                    <th class="text-center">Nomor Meja</th>
                                    <th class="text-center">Tanggal order</th>
                                    <th class="text-center">Jumlah Pesanan</th>
                                    <th class="text-center">Status Order</th>
                                    <?php if (session()->get('level') == 'manajer') : ?>
                                        <th class="text-center"><i class="fa fa-tasks text-primary"></i></th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php
                                if (session()->get('level') == 'manajer') :
                                    foreach ($getOrder as $value) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->id_order ?></td>
                                            <td class="text-center"><?= $value->nama_user ?></td>
                                            <td class="text-center"><?= $value->no_meja ?></td>
                                            <td class="text-center"><?= date('d-m-Y', strtotime($value->tanggal_order)) ?></td>
                                            <td class="text-center"><?= $ModelCustom->JMenu($value->id_order) ?></td>
                                            <td class="text-center"><?php if ($value->status_order == 'sudah_bayar') {
                                                                        echo '<span class="label label-info">Sudah Bayar</span>';
                                                                    } elseif ($value->status_order == 'belum_bayar') {
                                                                        echo '<span  class="label label-primary">Belum Bayar</span>';
                                                                    } ?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#Delete<?= esc($value->id_order) ?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" class="fa fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                    <?php
                                elseif (session()->get('level') == 'kasir') :
                                    foreach ($ModelCustom->getOrderKasir() as $value) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->id_order ?></td>
                                            <td class="text-center"><?= $value->no_meja ?></td>
                                            <td class="text-center"><?= date('d-m-Y', strtotime($value->tanggal_order)) ?></td>
                                            <td class="text-center"><?= $ModelCustom->JMenu($value->id_order) ?></td>
                                            <td class="text-center"><?php if ($value->status_order == 'sudah_bayar') {
                                                                        echo '<span class="label label-info">Sudah Bayar</span>';
                                                                    } elseif ($value->status_order == 'belum_bayar') {
                                                                        echo '<span  class="label label-primary">Belum Bayar</span>';
                                                                    } ?></td>

                                        </tr>


                                <?php endforeach;
                                endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php foreach ($getOrder as $value) : ?>
    <div class="modal fade" id="Delete<?= esc($value->id_order) ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pl-1">Hapus Order ID:<b class="text-primary"><?= esc($value->id_order) ?></b></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin Ingin Menghapus <b class="text-primary">Order</b> dengan ID: <b class="text-primary"><?= esc($value->id_order) ?></b>
                </div>

                <div class="modal-footer">
                    <form action="<?= site_url('order/' . session()->get('level') . '/' . esc($value->id_order) . '/delete') ?>" method="post">
                        <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn mb-1 btn-danger">Hapus</button>
                    </form>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection(); ?>