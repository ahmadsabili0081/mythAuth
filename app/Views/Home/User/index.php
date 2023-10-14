<?= $this->extend('Templates/template'); ?>

<?= $this->section('contentPage');; ?>
<?= $this->extend('Templates/template'); ?>

<?= $this->section('contentPage'); ?>
<div class="row">
  <div class="col text-left shadow p-3 bg-white">
    <h5 class="text-dark mt-2">Detail User</h5>
  </div>
</div>
<div class="row mt-5">
  <div class="col p-0">
    <?php if (!empty(session()->getFlashdata('pesan'))) :  ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil</strong> <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img class="img-thumbnail m-1" style="height: 100%;" src="<?= base_url('images/profile/' . $userDetail['userImage']); ?>" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $userDetail['fullname']; ?></h5>
            <h6 class="card-text"><?= $userDetail['email'] ?></h6>
            <small class="badge badge-<?= ($userDetail['name']  == 'Admin' ? 'success' : 'primary'); ?>"><?= $userDetail['name']; ?></small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
<?= $this->endSection(); ?>