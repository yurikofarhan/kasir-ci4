<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-inline p-2"><?= esc($title) ?></h4>
                    <!-- <button class="btn mb-1 btn-rounded btn-primary" data-toggle="modal" data-target="#Create"><i class="fa fa-plus"></i> Buat Akun</button> -->
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered verticle-middle table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Waktu</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">User Agent</th>
                                    <th class="text-center">Nama User</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($log as $value) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><b><?= esc($value['tanggal_aktivitas']) ?></b></td>
                                        <td class="text-center text-primary"><?= esc($value['deskripsi']) ?></td>
                                        <td class="text-center"><?= esc($value['user_agent']) ?></td>
                                        <td class="text-center"><?= esc($value['nama_user']) ?></td>
                                        <td class="text-center">
                                            <span>
                                                <a href="#" data-toggle="modal" data-target="#Delete<?= esc($value['id_log_aktivitas']) ?>"><i data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" class="fa fa-trash text-danger"></i></a>
                                            </span>
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
<?php foreach ($log as $value) : ?>
    <div class="modal fade" id="Delete<?= esc($value['id_log_aktivitas']) ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pl-1">Hapus Log ID:<b class="text-primary"><?= esc($value['id_log_aktivitas']) ?></b></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin Ingin Menghapus <b class="text-primary">Log</b> dengan ID: <b class="text-primary"><?= esc($value['id_log_aktivitas']) ?></b>
                </div>

                <div class="modal-footer">
                    <form action="<?= site_url('log-aktivitas/'  . esc($value['id_log_aktivitas']) . '/delete') ?>" method="post">
                        <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn mb-1 btn-danger">Hapus</button>
                    </form>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection(); ?>