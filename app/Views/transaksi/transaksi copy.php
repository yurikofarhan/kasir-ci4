<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-inline"><?= esc($title)  ?></h4>
                    <button class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#Create"><i class="fa fa-plus"></i> Create</button>

                    <p class="text-muted">Filtering:</p>
                    <!-- Nav tabs -->
                    <button type="button" data-toggle="modal" data-target="#tgl1" class="btn btn-sm mb-1 btn-primary">Tanggal Tertentu</button>
                    <button type="button" data-toggle="tab" href="#nama" class="btn btn-sm mb-1 btn-info">Nama Kasir</button>

                </div>
            </div>
            <!-- <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-inline"></h4>
                    <button class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#Create"><i class="fa fa-plus"></i> Create</button>

                    <p class="text-muted">Short by:</p>
                </div>
            </div> -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-inline p-2"><?= esc($title) ?></h4>
                    <hr>
                    <div class="table-responsive">
                        <table id="example" class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">Nama Kasir</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">No Meja</th>
                                    <th class="text-center">Jumlah Pesanan</th>
                                    <th class="text-center">Total Harga</th>
                                    <th class="text-center">Uang</th>
                                    <th class="text-center">Kembali</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php if (session()->get('level') == 'manajer') : ?>
                                    <?php foreach ($ModelCustom->getTransaksi() as $value) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= esc($value->nama_user) ?></td>
                                            <td class="text-center"><?= date('d-m-Y', strtotime(esc($value->tanggal_transaksi))) ?></td>
                                            <td class="text-center"><?= esc($value->no_meja) ?></td>
                                            <td class="text-center"><?= esc($ModelCustom->JMasakan($value->id_order)) ?></td>
                                            <td><?= 'Rp' . esc(number_format($value->total_harga, 0, ',', '.')) ?></td>
                                            <td><?= 'Rp' . esc(number_format($value->uang, 0, ',', '.')) ?></td>
                                            <td><?= 'Rp' . esc(number_format($value->kembali, 0, ',', '.')) ?></td>
                                            <td class="text-center"><a href="<?= site_url('transaksi/' . esc($value->id_transaksi) . '/invoice') ?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title="Invoice" class="fas fa-file-invoice text-danger"></i></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php elseif (session()->get('level') == 'kasir') : ?>
                                    <?php foreach ($ModelCustom->getTransaksiK() as $value) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= esc($value->nama_user) ?></td>
                                            <td class="text-center"><?= date('d-m-Y', strtotime(esc($value->tanggal_transaksi))) ?></td>
                                            <td class="text-center"><?= esc($value->no_meja) ?></td>
                                            <td class="text-center"><?= esc($ModelCustom->JMasakan($value->id_order)) ?></td>
                                            <td><?= 'Rp' . esc(number_format($value->total_harga, 0, ',', '.')) ?></td>
                                            <td><?= 'Rp' . esc(number_format($value->uang, 0, ',', '.')) ?></td>
                                            <td><?= 'Rp' . esc(number_format($value->kembali, 0, ',', '.')) ?></td>
                                            <td class="text-center"><a href="<?= site_url('transaksi/' . esc($value->id_transaksi) . '/invoice') ?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title="Invoice" class="fas fa-file-invoice text-danger"></i></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                            <tfoot>
                                <tr>

                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-right">Total Harga :</th><?php if (session()->get('level') == 'kasir') {
                                                                                    $harga = $JHargaTK;
                                                                                } else {
                                                                                    $harga = $JHargaT;
                                                                                } ?>
                                    <th class=""><?= 'Rp' . esc(number_format(floatval($harga), 0, ',', '.'))  ?></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tgl1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pl-3">Filtering Berdasarkan Tanggal</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="mt-3 mb-3 pl-3 pr-3" action="<?= site_url('transaksi/tanggal') ?>" method="post">
                    <?= csrf_field(); ?>

                    <div class="form-group">
                        <label>Tanggal Awal :</label>
                        <div class="input-group has-validation">

                            <input type="text" class="form-control" id="datepicker-autoclose" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>

                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_awal') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Awal :</label>
                        <div class="input-group has-validation">

                            <input type="text" class="form-control" id="datepicker-autoclose" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>

                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_awal') ?>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn btn-primary">Cari</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>