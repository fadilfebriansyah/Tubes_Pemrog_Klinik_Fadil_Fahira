<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" src="assets/img/login.jpg"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php if ($this->session->flashdata('message')) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Error! <?= $this->session->flashdata('message'); ?>
                                            <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif; ?>

                                    <form action="<?= base_url('auth/login') ?>" class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Enter Username" required>
                                            <div class="invalid-feedback">
                                                <?= form_error('username') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required>
                                            <div class="invalid-feedback">
                                                <?= form_error('password') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 offset-md-2">
                                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Login"></input>
                                        </div>

                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/register') ?>">Gapunya akun? Daftar Lah !!</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>

    </div>