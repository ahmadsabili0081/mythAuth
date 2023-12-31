<?= $this->extend('Templates/template_auth'); ?>
<?= $this->section('contentAuth'); ?>
<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-8 col-lg-8 col-md-8">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                  <p class="mb-4">We get it, stuff happens. Just enter your email address below
                    and we'll send you a link to reset your password!</p>
                </div>
                <form class="user">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Reset Password
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?= base_url('/Auth/Registration'); ?>">Create an Account!</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?= base_url('/Auth'); ?>">Already have an account? Login!</a>
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