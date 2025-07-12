<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-3">
            <div class="card card-widget">
                <div class="card-body gradient-4">
                    <div class="media">
                        <span class="card-widget__icon"><i class="icon-user"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title"><?= esc($totalAkun) ?></h2>
                            <h5 class="card-widget__subtitle">Total Akun</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-widget">
                <div class="card-body gradient-3">
                    <div class="media">
                        <span class="card-widget__icon"><i class="icon-list"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title"><?= esc($totalMenu) ?></h2>
                            <h5 class="card-widget__subtitle">Total Menu</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-widget">
                <div class="card-body gradient-7">
                    <div class="media">
                        <span class="card-widget__icon"><i class="icon-wallet"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title"><?= esc($totalTransaksi) ?></h2>
                            <h5 class="card-widget__subtitle">Total Transaksi</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
</div>

<?= $this->endSection(); ?>