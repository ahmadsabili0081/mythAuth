<?= $this->extend('Templates/template'); ?>

<?= $this->section('contentPage'); ?>
<div class="row">
  <div class="col text-left shadow p-3 bg-white">
    <h5 class="text-dark mt-2">User List</h5>
  </div>
</div>

<div class="row mb-5">
  <div class="col-md-12 mt-5 p-0">
    <div class="card-body bg-white shadow">
      <a class="btn btn-md btn-primary mb-5 mt-4" href="">Tambah Data</a>
      <div class="row">
        <div class="col-md-12">
          <?php if (!empty(session()->getFlashdata('pesan'))) :  ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Berhasil</strong> <?= session()->getFlashdata('pesan'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" scope="col" style="width: 20px;">No</th>
                <th class="text-center" scope="col">Username</th>
                <th class="text-center" scope="col">Email</th>
                <th class="text-center" scope="col">Images</th>
                <th class="text-center" scope="col">Role</th>
                <th class="text-center" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($userAll as $user) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td class="text-center"><?= $user['username']; ?></td>
                  <td class="text-center"><?= $user['email']; ?></td>
                  <td class="text-center">
                    <img class="img-thumbnail" style="width: 100px; height:100px;" src="<?= base_url('/images/profile/' . $user['userImage']); ?>" alt="">
                  </td>
                  <td class="text-center"><?= $user['name'] ?></td>
                  <td class="text-center">
                    <a class="btn btn-sm btn-warning" href="<?= base_url('/Admin/Edit/'  . $user['username']); ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-sm btn-success" href="<?= base_url('/Admin/Detail/' . $user['username']); ?>"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>