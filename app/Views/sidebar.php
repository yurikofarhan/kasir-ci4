<?php


$uri = service('uri');
?>
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="<?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>" href="<?= site_url('/dashboard') ?>" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>

            </li>
            <li class="nav-label">Kelola Kasir</li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-list menu-icon"></i><span class="nav-text">Pesanan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="<?= ($uri->getSegment(1) == 'masakan' ? 'active' : null) ?>" href="<?= site_url('masakan') ?>">Masakan</a></li>
                    <li><a class="<?= ($uri->getSegment(1) == 'pesanan' ? 'active' : null) ?>" href="<?= site_url('pesanan') ?>">Checkout Pesanan</a></li>
                    <li><a class="<?= ($uri->getSegment(1) == 'order' ? 'active' : null) ?>" href="<?= site_url('order') ?>">Riwayat Order</a></li>
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
            <li class="nav-label">Manage Account</li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-user menu-icon"></i><span class="nav-text">User</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="<?= ($uri->getSegment(1) == 'akun' ? 'active' : null) ?>" href="<?= site_url('/akun') ?>">Akun</a></li>
                    <!-- <li><a class="<= ($uri->getSegment(1) == 'level' ? 'active' : null) ?>" href="<= site_url('/level') ?>">Level Akun</a></li> -->
                    <li><a href="#">Riwayat Aktivitas</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>