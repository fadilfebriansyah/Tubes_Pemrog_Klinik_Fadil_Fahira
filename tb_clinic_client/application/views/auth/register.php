<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>
                                    <?php if ($this->session->flashdata('message')) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Error! <?= $this->session->flashdata('message'); ?>
                                            <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif; ?>

                                    <form action="<?= base_url('auth/registerclient') ?>" method="post" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                                            <div class="invalid-feedback">
                                                <?= form_error('username') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp" placeholder="No Handphone">
                                            <div class="invalid-feedback">
                                                <?= form_error('no_hp') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <div class="invalid-feedback">
                                                <?= form_error('password') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 offset-md-2">
                                            <input type="submit" class="btn btn-primary btn-block" value="Daftar">
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/login') ?>">Sudah punya akun? Login Lah</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>