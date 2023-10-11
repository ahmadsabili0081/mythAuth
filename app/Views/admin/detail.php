<?= $this->extend('Templates/template'); ?>

<?= $this->section('contentPage'); ?>
<div class="row">
  <div class="col text-left shadow p-3 bg-white">
    <h5 class="text-dark mt-2">Detail User</h5>
  </div>
</div>
<div class="row mt-5">
  <div class="col p-0">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img class="img-thumbnail p-2" src="<?= base_url('/images/profile/' . $userDetail['userImage']); ?>" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $userDetail['username']; ?></h5>
            <h6 class="card-text"><?= $userDetail['email']; ?></h6>
            <small class="badge badge-<?= $userDetail['name'] == 'Admin' ? 'success' : 'primary' ?>"><?= $userDetail['name']; ?></small>
            <br>
            <br>
            <small><a class="text-primary" href="<?= base_url('/Admin'); ?>">Back To User List</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>