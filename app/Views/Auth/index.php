<!-- Outer Row -->
<?= $this->extend('Templates/template_auth'); ?>


<?= $this->section('contentAuth'); ?>
<div class="container">
  <div class="row justify-content-center">

    <div class="col-xl-7 col-lg-7 col-md-7">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4"> <?= lang('Auth.loginTitle') ?></h1>
                </div>

                <?= view('Myth\Auth\Views\_message_block') ?>
                <form action="<?= url_to('login') ?>" method="post" class="user">
                  <?= csrf_field() ?>
                  <?php if ($config->validFields === ['email']) : ?>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                      <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                      </div>
                    </div>
                  <?php else : ?>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                      <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>">
                    <div class="invalid-feedback">
                      <?= session('errors.password') ?>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>

                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?= base_url('/Auth/Forgot_password'); ?>">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <small><a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
<?= $this->endSection(); ?>