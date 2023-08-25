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

                            <a class="text-center" href="index.html">
                                <h4>Rosella</h4>
                            </a>

                            <form class="mt-5 mb-5 login-input" action="<?= base_url('auth/registration'); ?>" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name" id="name" name="name">
                                    <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                    <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn login-form__btn submit w-100">Create Account</button>
                            </form>
                            <p class="mt-5 login-form__footer">Have account <a href="<?= base_url('auth') ?>" class="text-primary">Sign In </a> now</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>