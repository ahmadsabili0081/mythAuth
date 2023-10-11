<?= $this->extend('Templates/template'); ?>

<?= $this->section('contentPage'); ?>
<div class="row">
  <div class="col text-left shadow p-3 bg-white">
    <h5 class="text-dark mt-2">Halaman Edit User</h5>
  </div>
</div>

<?php d($errors); ?>
<div class="row mt-4 shadow">
  <div class="col p-0">
    <div class="card-body bg-white">
      <form action="<?= base_url('/Admin/save/' . $userDetail['username']); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="userid" value="<?= $userDetail['userid']; ?>">
        <input type="hidden" name="usernameHidden" value="<?= $userDetail['username']; ?>">
        <input type="hidden" name="userImageHidden" value="<?= $userDetail['userImage']; ?>">
        <?= csrf_field() ?>
        <div class="form-group">
          <label for="">Email</label>
          <input class="form-control <?= validation_show_error('email') ? 'is-invalid' : '' ?>" type="text" name="email" value="<?= $userDetail['email']; ?>" placeholder="Email">
          <small class="text-danger"><?= validation_show_error('email'); ?></small>
        </div>
        <div class="form-group">
          <label for="">Username</label>
          <input class="form-control <?= validation_show_error('username') ? 'is-invalid' : '' ?>" type="text" name="username" value="<?= $userDetail['username']; ?>" placeholder="Username">
          <small class="text-danger"><?= validation_show_error('username'); ?></small>
        </div>
        <div class="form-group">
          <label for="">Fullname</label>
          <input class="form-control <?= validation_show_error('fullname') ? 'is-invalid' : '' ?>" type="text" name="fullname" value="<?= $userDetail['fullname']; ?>" placeholder="fullname">
          <small class="text-danger"><?= validation_show_error('fullname'); ?></small>
        </div>
        <div class="form-group">
          <label for="">Gambar</label>
          <div class="col-sm-6 mt-1 mb-3 p-0">
            <img class="img-thumbnail" style="width: 150px; height:150px;" src="<?= base_url('/images/profile/' . $userDetail['userImage']); ?>" alt="">
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input <?= validation_show_error('userImage') ? 'is-invalid' : '' ?>" id="inputGroupFile01" name="userImage" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01"><?= $userDetail['userImage']; ?></label>
            <small class="text-danger"><?= validation_show_error('userImage'); ?></small>
          </div>
        </div>
        <a class="btn btn-sm btn-warning" href="<?= base_url('/Admin'); ?>">Kembali</a>
        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>