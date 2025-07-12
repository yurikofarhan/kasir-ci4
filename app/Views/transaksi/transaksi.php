<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-inline p-2"><?= esc($title) ?></h4>

                    <div class="table-responsive">
                        <table id="example" class="table table-bordered verticle-middle table-hover">
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
                                            <td class="text-center"><?= esc($ModelCustom->JMenu($value->id_order)) ?></td>
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
                                            <td class="text-center"><?= esc($ModelCustom->JMenu($value->id_order)) ?></td>
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
                                    <th class="text-right">Total Harga Keseluruhan :</th><?php if (session()->get('level') == 'kasir') {
                                                                                                $harga = $JHargaTK;
                                                                                            } elseif (session()->get('level') == 'manajer') {
                                                                                                $harga = $JHargaT;
                                                                                            } ?>
                                    <th class=""><?= 'Rp' . esc(number_format(floatval($harga), 0, ',', '.'))  ?></th>
                                    <th></th>
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
<?= $this->endSection(); ?>