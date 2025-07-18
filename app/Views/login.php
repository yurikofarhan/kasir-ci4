<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title ?> - Kasir Restoran</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('') ?>/assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="<?= base_url('') ?>/assets/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
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





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="<?= site_url('/') ?>">
                                    <h4>Login Kasir</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="post" action="<?= site_url('/') ?>">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="username" class="form-control" placeholder="Username" name="username" value="<?= set_value('username') ?>">
                                        <?php if (isset($validation)) : ?>
                                            <div class="text-danger" style="font-size: 12px;">
                                                <p><?= $validation->getError('username'); ?></p>
                                            </div>
                                        <?php endif ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('') ?>">
                                        <?php if (isset($validation)) : ?>
                                            <div class="text-danger" style="font-size: 12px;">
                                                <p><?= $validation->getError('password'); ?></p>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <button type="submit" onclick="this.form.submit(); this.disabled = true;" class="btn login-form__btn submit w-100">Login</button>
                                </form>
                                <!-- <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?= base_url('') ?>/assets/plugins/common/common.min.js"></script>
    <script src="<?= base_url('') ?>/assets/js/custom.min.js"></script>
    <script src="<?= base_url('') ?>/assets/js/settings.js"></script>
    <script src="<?= base_url('') ?>/assets/js/gleek.js"></script>
    <script src="<?= base_url('') ?>/assets/js/styleSwitcher.js"></script>
</body>

</html>