<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="card-title d-inline pr-3"><?= esc($title) ?></h2>

                    <a class="" href="<?= site_url('transaksi') ?>"><button class="btn mb-1 btn-rounded btn-outline-secondary btn"><i class="fa fa-arrow-left text-secondary"></i> Kembali</button></a>
                    <button id="printInvoice" class="btn bg-white btn-light mx-1px text-95 float-right" data-title="Print" onclick="printDiv('page-header')">
                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                        Print
                    </button>
                    <!-- <button class="btn bg-white btn-light mx-1px text-95" data-title="PDF" id="pdf" onclick="pdf('../'<?= $title ?>'.pdf')">
                        <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                        Export
                    </button> -->

                    <!-- <p class="text-muted">Short by:</p> -->

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div id="page-header">
                        <style>
                            .text-secondary-d1 {
                                color: #728299 !important;
                            }

                            .page-header {
                                margin: 0 0 1rem;
                                padding-bottom: 1rem;
                                padding-top: 0.5rem;
                                border-bottom: 1px dotted #e2e2e2;
                                display: -ms-flexbox;
                                display: flex;
                                -ms-flex-pack: justify;
                                justify-content: space-between;
                                -ms-flex-align: center;
                                align-items: center;
                            }

                            .page-title {
                                padding: 0;
                                margin: 0;
                                font-size: 1.75rem;
                                font-weight: 300;
                            }

                            .brc-default-l1 {
                                border-color: #dce9f0 !important;
                            }

                            .ml-n1,
                            .mx-n1 {
                                margin-left: -0.25rem !important;
                            }

                            .mr-n1,
                            .mx-n1 {
                                margin-right: -0.25rem !important;
                            }

                            .mb-4,
                            .my-4 {
                                margin-bottom: 1.5rem !important;
                            }

                            hr {
                                margin-top: 1rem;
                                margin-bottom: 1rem;
                                border: 0;
                                border-top: 1px solid rgba(0, 0, 0, 0.1);
                            }

                            .text-grey-m2 {
                                color: #888a8d !important;
                            }

                            .text-success-m2 {
                                color: #86bd68 !important;
                            }

                            .font-bolder,
                            .text-600 {
                                font-weight: 600 !important;
                            }

                            .text-110 {
                                font-size: 110% !important;
                            }

                            .text-blue {
                                color: #478fcc !important;
                            }

                            .pb-25,
                            .py-25 {
                                padding-bottom: 0.75rem !important;
                            }

                            .pt-25,
                            .py-25 {
                                padding-top: 0.75rem !important;
                            }

                            .bgc-default-tp1 {
                                background-color: rgba(121, 169, 197, 0.92) !important;
                            }

                            .bgc-default-l4,
                            .bgc-h-default-l4:hover {
                                background-color: #f3f8fa !important;
                            }

                            .page-header .page-tools {
                                -ms-flex-item-align: end;
                                align-self: flex-end;
                            }

                            .btn-light {
                                color: #757984;
                                background-color: #f5f6f9;
                                border-color: #dddfe4;
                            }

                            .w-2 {
                                width: 1rem;
                            }

                            .text-120 {
                                font-size: 120% !important;
                            }

                            .text-primary-m1 {
                                color: #4087d4 !important;
                            }

                            .text-danger-m1 {
                                color: #dd4949 !important;
                            }

                            .text-blue-m2 {
                                color: #68a3d5 !important;
                            }

                            .text-150 {
                                font-size: 150% !important;
                            }

                            .text-60 {
                                font-size: 60% !important;
                            }

                            .text-grey-m1 {
                                color: #7b7d81 !important;
                            }

                            .align-bottom {
                                vertical-align: bottom !important;
                            }
                        </style>
                        <div class="page-content container">
                            <div class="page-header text-blue-d2">
                                <h1 class="page-title text-secondary-d1">
                                    Invoice
                                    <small class="page-info">
                                        <i class="fa fa-angle-double-right text-80"></i>
                                        ID: #<?= $find->id_transaksi ?>
                                    </small>
                                </h1>

                                <!-- <div class="page-tools">
                                    <div class="action-buttons">
                                        <button id="printInvoice" class="btn bg-white btn-light mx-1px text-95" data-title="Print" id="print" onclick="printDiv('page-header')">
                                            <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                                            Print
                                        </button>
                                        <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                                            <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                                            Export
                                        </a>
                                    </div>
                                </div> -->
                            </div>

                            <div class="container px-0">
                                <div class="row mt-4">
                                    <div class="col-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center text-150">
                                                    <i class="fa-solid fa-cash-register fa-2x text-primary   mr-1"></i>
                                                    <span class="text-default-d3">Kasir Restaurant</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .row -->

                                        <hr class="row brc-default-l1 mx-n1 mb-4" />

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div>
                                                    <span class="text-sm text-grey-m2 align-middle">Nama Kasir: </span>
                                                    <span class="text-600 text-110 text-blue align-middle"><?= esc(ucwords($find->nama_user)) ?></span>
                                                </div>
                                                <div class="text-grey-m2">
                                                    <!-- <div class="my-1">
                                                        Street, City
                                                    </div>
                                                    <div class="my-1">
                                                        State, Country
                                                    </div>
                                                    <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">111-111-111</b></div> -->
                                                </div>
                                            </div>
                                            <!-- /.col -->

                                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                                <hr class="d-sm-none" />
                                                <div class="text-grey-m2">
                                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                        Invoice
                                                    </div>


                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <?php if ($find->status_order == 'sudah_bayar') {
                                                                                                                                                                                echo '<span class="badge badge-primary">Paid</span>';
                                                                                                                                                                            } elseif ($find->status_order == 'belum_bayar') {
                                                                                                                                                                                echo '<span  class="badge badge-warning">Unpaid</span>';
                                                                                                                                                                            } ?></div>
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Tanggal Transaksi: </span><?= date('d-m-Y', strtotime($find->tanggal_transaksi)) ?></div>

                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">No Meja: </span><b class="text-secondary"><?= $find->no_meja ?></b></div>

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>

                                        <div class="mt-4">
                                            <div class="row text-600 text-white bgc-default-tp1 py-25">
                                                <div class="d-none d-sm-block col-1">NO</div>
                                                <div class="col-3 col-sm-2">Nama Menu</div>
                                                <div class="text-center col-9 col-sm-3">Keterangan</div>
                                                <div class="text-center d-none d-sm-block col-4 col-sm-2">Qty</div>
                                                <div class="d-none d-sm-block col-sm-2">Harga Satuan</div>
                                                <div class="col-2">Total Harga</div>
                                            </div>
                                            <?php $no = 1 ?>
                                            <div class="text-95 text-secondary-d3">
                                                <?php foreach ($ModelCustom->getPesananT($find->id_order) as $value) : ?>
                                                    <?php
                                                    $jmlMenu = $ModelCustom->JPesananT($value->id_menu, $value->id_order);
                                                    $hSatuan = $ModelCustom->HargaSatuan($value->id_menu);
                                                    $total =  $jmlMenu * $hSatuan  ?>
                                                    <div class="row mb-2 mb-sm-0 py-25 <?= ($no % 2) == 0 ? 'bgc-default-l4' : '' ?>">
                                                        <div class="d-none d-sm-block col-1"><?= $no++ ?></div>
                                                        <div class="col-3 col-sm-2"><?= esc($value->nama_menu) ?></div>
                                                        <div class="text-center col-9 col-sm-3"><?= esc($value->keterangan != null ? $value->keterangan : '-') ?></div>
                                                        <div class="text-center d-none d-sm-block col-2"><?= esc($jmlMenu) ?></div>
                                                        <div class="d-none d-sm-block col-2 text-95"><?= 'Rp' . esc(number_format($hSatuan, 0, ',', '.')) ?></div>
                                                        <div class="col-2 text-secondary-d2"><?= 'Rp' . esc(number_format($total, 0, ',', '.')) ?></div>
                                                    </div>
                                                <?php endforeach; ?>

                                                <!-- <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                                                    <div class="d-none d-sm-block col-1">2</div>
                                                    <div class="col-9 col-sm-5">Web hosting</div>
                                                    <div class="d-none d-sm-block col-2">1</div>
                                                    <div class="d-none d-sm-block col-2 text-95">$15</div>
                                                    <div class="col-2 text-secondary-d2">$15</div>
                                                </div>

                                                <div class="row mb-2 mb-sm-0 py-25">
                                                    <div class="d-none d-sm-block col-1">3</div>
                                                    <div class="col-9 col-sm-5">Software development</div>
                                                    <div class="d-none d-sm-block col-2">--</div>
                                                    <div class="d-none d-sm-block col-2 text-95">$1,000</div>
                                                    <div class="col-2 text-secondary-d2">$1,000</div>
                                                </div>

                                                <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                                                    <div class="d-none d-sm-block col-1">4</div>
                                                    <div class="col-9 col-sm-5">Consulting</div>
                                                    <div class="d-none d-sm-block col-2">1 Year</div>
                                                    <div class="d-none d-sm-block col-2 text-95">$500</div>
                                                    <div class="col-2 text-secondary-d2">$500</div>
                                                </div> -->
                                            </div>

                                            <div class="row border-b-2 brc-default-l2"></div>

                                            <!-- or use a table instead -->
                                            <!--
                                            <div class="table-responsive">
                                                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                                                    <thead class="bg-none bgc-default-tp1">
                                                        <tr class="text-white">
                                                            <th class="opacity-2">#</th>
                                                            <th>Description</th>
                                                            <th>Qty</th>
                                                            <th>Unit Price</th>
                                                            <th width="140">Amount</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody class="text-95 text-secondary-d3">
                                                        <tr></tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Domain registration</td>
                                                            <td>2</td>
                                                            <td class="text-95">$10</td>
                                                            <td class="text-secondary-d2">$20</td>
                                                        </tr> 
                                                    </tbody>
                                                </table>
                                            </div>
                                            -->

                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                                    Pembayaran Secara : Tunai
                                                </div>

                                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                        <div class="col-7 text-right">
                                                            <b>Total Harga:</b>
                                                        </div>
                                                        <div class="col-5">
                                                            <span class="text-150 text-secondary-d1"><?= 'Rp' . esc(number_format($find->total_harga, 0, ',', '.')) ?></span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row my-2">
                                                        <div class="col-7 text-right">
                                                            <b>Uang :</b>
                                                        </div>
                                                        <div class="col-5">
                                                            <span class="text-110 text-secondary-d1"><?= 'Rp' . esc(number_format($find->uang, 0, ',', '.')) ?></span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row my-2">
                                                        <div class="col-7 text-right">
                                                            <b>Kembali :</b>
                                                        </div>
                                                        <div class="col-5">
                                                            <span class="text-120 text-success-d3 opacity-2"><?= 'Rp' . esc(number_format($find->kembali, 0, ',', '.')) ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr />

                                            <div>
                                                <span class="text-secondary-d1 text-105">Thank you for the purchase...</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printDiv(divName) {
        // main - wrapper
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();

        document.body.innerHTML = originalContents;
        $('#menu').metisMenu();
    }
</script>
<!-- <script type="text/javascript">
    function printDiv(elementId) {
        var a = document.getElementById('printing-css').value;
        var b = document.getElementById(elementId).innerHTML;
        window.frames["print_frame"].document.title = document.title;
        window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
    }
</script> -->
<?= $this->endSection(); ?>