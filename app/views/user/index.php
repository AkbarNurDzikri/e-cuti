<div class="card card-body">
    <div class="row">
        <div class="col-md-6 text-start">
            <h3 class="font-primary">Main Menu</h3>
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <!-- Button trigger modal -->
        <div class="col-md-6 text-end">
            <h3 class="font-primary"><?= $data['title']; ?></h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                <i class="fa-solid fa-plus"></i> User
            </button>
        </div>

    </div>
</div>

<div class="row align-items-center">
    <div class="col-md mt-3" data-aos="fade-down" data-aos-duration="1500">
        <?php Flasher::flash(); ?>
    </div>
</div>

<div class="card card-body font-primary table-responsive">
    <table class="table table-hover display" id="table_id">
        <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Nama Karyawan</th>
                <th>Username</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data['user'] as $user) : ?>
                <tr class="text-center">
                    <td><?= $i++; ?></td>
                    <td><?= $user['nama']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td class="text-center">
                        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#edit<?= $user['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
                        <button class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#confirmDelete<?= $user['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/user/store" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                            <select name="karyawan_id" id="karyawan_id" id="karyawan_id" class="form-select">
                                <option value="" disabled selected>Pilih Karyawan</option>
                                <?php foreach ($data['member'] as $k) : ?>
                                    <option value="<?= $k['id_member']; ?>"><?= $k['member']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="konfirmPassword" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="konfirmPassword" id="konfirmPassword">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($data['user'] as $user) : ?>
    <!-- Modal -->
    <div class="modal fade" id="edit<?= $user['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/user/update" method="POST">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <input type="hidden" name="created_at" value="<?= $user['created_at']; ?>">
                        <!-- Karena belum dibuat fitur update password, password lama dikirim -->
                        <input type="hidden" name="password" value="<?= $user['password']; ?>">
                        <div class="row">
                            <div class="col-md mb-3">
                                <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                                <select name="karyawan_id" id="karyawan_id" class="form-select">
                                    <option value="<?= $user['karyawan_id']; ?>">Existing : <?= $user['nama']; ?></option>
                                    <?php foreach ($data['karyawan'] as $k) : ?>
                                        <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?= $user['username']; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($data['user'] as $user) : ?>
    <!-- Modal -->
    <div class="modal fade" id="confirmDelete<?= $user['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md text-center">
                            <i class="fa-5x fa-solid fa-circle-exclamation text-danger"></i>
                            <h3 class="font-primary mt-5">Yakin hapus data <b><?= $user['nama']; ?></b>?</h3>
                            <p class="text-muted font-primary">Data ini akan dihapus secara permanen !</p>
                            <a class="btn btn-danger mt-4" href="<?= BASEURL; ?>/user/delete/<?= $user['id']; ?>" style="width: 100px;">Yes</a>
                            <button type="button" class="btn btn-success mt-4" data-bs-dismiss="modal" style="width: 100px;">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>