<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= esc($title) ?> - Kasir Restoran</title>
    <!-- Favicon icon -->
    <link rel="icon" type="text" sizes="16x16" href="<?= base_url('') ?>/assets/images/favicon.png">
    <!-- Pignose Calender -->
    <link href="<?= base_url('') ?>/assets/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="<?= base_url('') ?>/assets/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>/assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="<?= base_url('') ?>/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url('') ?>/assets/plugins/tables/css/datatable/buttons.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="<?= base_url('') ?>/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">


    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css"> -->
</head>

<body>

    <?php
    $uri = service('uri');
    ?>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="<?= site_url('dashboard'); ?>">
                    <b class="logo-abbr"><i class="fa-solid fa-cash-register text-white"></i></b>
                    <!-- <span class="logo-compact"><img src="?= base_url('') ?>/assets/images/logo-compact.png" alt=""></span> -->
                    <span class="brand-title">

                        <h3 class="fa-cashier text-white"><i class="fa-solid fa-cash-register"></i> Kasir</h3>

                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                </div>
                <div class="header-right">
                    <ul class="clearfix">

                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="mr-2 medium"><?= esc(session()->get('nama_user')) ?></span>
                                <!-- <span class="activity active"></span> -->
                                <img src="<?= base_url('') ?>/upload/image_profile/<?= esc(session()->get('image')) ?>" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="<?= esc(site_url('/profile')) ?>"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <!-- <li>
                                                <a href="#"><i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill badge-primary">3</div></a>
                                            </li> -->

                                        <hr class="my-2">
                                        <!-- <li>
                                                <a href="#"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                            </li> -->
                                        <li><a href="<?= esc(site_url('/logout')) ?>"><i class="icon-key"></i><span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="<?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>" href="<?= site_url('/dashboard') ?>" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>

                    </li>
                    <?php if (session()->get('level') == 'admin') : ?>

                        <li class="nav-label">Manage Account</li>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-user menu-icon"></i><span class="nav-text">User</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a class="<?= ($uri->getSegment(1) == 'akun' ? 'active' : null) ?>" href="<?= site_url('/akun') ?>">Akun</a></li>
                                <!-- <li><a class="<= ($uri->getSegment(1) == 'level' ? 'active' : null) ?>" href="<= site_url('/level') ?>">Level Akun</a></li> -->
                                <li><a class="<?= ($uri->getSegment(1) == 'log-aktivitas' ? 'active' : null) ?>" href="<?= site_url('log-aktivitas') ?>">Riwayat Aktivitas</a></li>
                            </ul>
                        </li>
                    <?php elseif (session()->get('level') == 'manajer') : ?>
                        <li class="nav-label">Kelola Kasir</li>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-list menu-icon"></i><span class="nav-text">Pesanan</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a class="<?= ($uri->getSegment(1) == 'menu' ? 'active' : null) ?>" href="<?= site_url('menu') ?>">Menu</a></li>
                                <li><a class="<?= ($uri->getSegment(1) == 'order' ? 'active' : null) ?>" href="<?= (site_url('order/manajer')) ?>">Riwayat Order</a></li>
                            </ul>
                        </li>

                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-wallet menu-icon"></i><span class="nav-text">Transaksi</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a class="<?= ($uri->getSegment(1) == 'transaksi' ? 'active' : null) ?>" href="<?= site_url('transaksi') ?>">Riwayat Transaksi</a></li>
                            </ul>
                        </li>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-note menu-icon"></i><span class="nav-text">Log Aktivitas</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a class="<?= ($uri->getSegment(1) == 'log-aktivitas' ? 'active' : null) ?>" href="<?= site_url('log-aktivitas') ?>">Riwayat Aktivitas</a></li>
                            </ul>
                        </li>
                    <?php elseif (session()->get('level') == 'kasir') : ?>
                        <li class="nav-label">Kelola Kasir</li>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-list menu-icon"></i><span class="nav-text">Pesanan</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a class="<?= ($uri->getSegment(1) == 'menu' ? 'active' : null) ?>" href="<?= site_url('menu') ?>">Menu</a></li>
                                <li><a class="<?= ($uri->getSegment(1) == 'pesanan' ? 'active' : null) ?>" href="<?= site_url('pesanan') ?>">Checkout Pesanan</a></li>
                                <li><a class="<?= ($uri->getSegment(1) == 'order' ? 'active' : null) ?>" href="<?= site_url('order/kasir') ?>">Riwayat Order</a></li>
                            </ul>
                        </li>

                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-wallet menu-icon"></i><span class="nav-text">Transaksi</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a class="<?= ($uri->getSegment(1) == 'transaksi' ? 'active' : null) ?>" href="<?= site_url('transaksi') ?>">Riwayat Transaksi</a></li>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <!-- <= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?> -->

                        <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>

                        <?php $no = $uri->getTotalSegments(); ?>
                        <?php if ($uri->getSegment(1) != 'dashboard') : ?>
                            <?php for ($i = 1; $i <= $no; $i++) : ?>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?= esc(ucwords($uri->getSegment($i))) ?></a></li>
                            <?php endfor ?>
                        <?php endif ?>
                    </ol>
                </div>
            </div>

            <?= $this->renderSection('content') ?>

            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="#">Yuriko Farhan</a> 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- ajax -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <script src="<?= base_url('') ?>/assets/plugins/common/common.min.js"></script>
    <script src="<?= base_url('') ?>/assets/js/custom.min.js"></script>
    <script src="<?= base_url('') ?>/assets/js/settings.js"></script>
    <script src="<?= base_url('') ?>/assets/js/gleek.js"></script>
    <script src="<?= base_url('') ?>/assets/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="<?= base_url('') ?>/assets/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="<?= base_url('') ?>/assets/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="<?= base_url('') ?>/assets/plugins/d3v3/index.js"></script>
    <script src="<?= base_url('') ?>/assets/plugins/topojson/topojson.min.js"></script>
    <script src="<?= base_url('') ?>/assets/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="<?= base_url('') ?>/assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url('') ?>/assets/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="<?= base_url('') ?>/assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('') ?>/assets/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="<?= base_url('') ?>/assets/plugins/chartist/js/chartist.min.js"></script>
    <script src="<?= base_url('') ?>/assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="<?= base_url('') ?>/assets/js/dashboard/dashboard-1.js"></script>


    <script src="<?= base_url('') ?>/assets/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('') ?>/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('') ?>/assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script src="<?= base_url('') ?>/assets/plugins/moment/moment.js"></script>
    <script src="<?= base_url('') ?>/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>



    <script>
        (function($) {
            "use strict"

            new quixSettings({
                version: "light", //2 options "light" and "dark"
                layout: "vertical", //2 options, "vertical" and "horizontal"
                navheaderBg: "color_1", //have 10 options, "color_1" to "color_10"
                headerBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarStyle: "vertical", //defines how sidebar should look like, options are: "full", "compact", "mini" and "overlay". If layout is "horizontal", sidebarStyle won't take "overlay" argument anymore, this will turn into "full" automatically!
                sidebarBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarPosition: "fixed", //have two options, "static" and "fixed"
                headerPosition: "fixed", //have two options, "static" and "fixed"
                containerLayout: "wide", //"boxed" and  "wide". If layout "vertical" and containerLayout "boxed", sidebarStyle will automatically turn into "overlay".
                direction: "ltr" //"ltr" = Left to Right; "rtl" = Right to Left
            });

        })(jQuery);
        <?= session('errorModal') ?> //muncul modal error
    </script>
    <script>
        <?php if (session()->has('success')) : ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session('success') ?>',
            })
        <?php elseif (session()->has('error')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '<?= session('error') ?>',
            })
        <?php endif ?>
    </script>
    <script type="text/javascript">
        function fileValidation() {
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                fileInput.value = '';
                var reader = new FileReader();
                document.getElementById('imagePreview').innerHTML = '';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '"class="img-thumbnail"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'copy',
                    className: 'btn-white',
                    footer: true,
                }, {
                    extend: 'csv',
                    className: 'btn-info',
                    footer: true,
                }, {
                    extend: 'excel',
                    className: 'btn-success',
                    footer: true,
                }, {
                    extend: 'pdf',
                    className: 'btn-danger',
                    footer: true,
                }, ],
            });
        });
    </script>

</body>

</html>