<div class="row" style="margin-top: -10px;">
    <div class="col-md mb-3">
        <button class="btn btn-primary" data-toggle="modal" data-target="#create"><i class="fas fa-plus"></i> Baru</button>
    </div>
</div>

<div class="card font-primary table-responsive">
    <div class="card-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
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
                            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#edit<?= $user['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
                            <button class="btn btn-danger mb-2" data-toggle="modal" data-target="#confirmDelete<?= $user['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="create" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/user/store" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                            <select name="karyawan_id" class="custom-select select2" style="width: 100%;">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($data['user'] as $user) : ?>
    <!-- Modal -->
    <div class="modal fade" id="edit<?= $user['id']; ?>" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                                <select name="karyawan_id" class="custom-select select2" style="width: 100%;">
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md text-center">
                            <i class="fa-5x fa-solid fa-circle-exclamation text-danger"></i>
                            <h3 class="font-primary mt-5">Yakin hapus data <b><?= $user['nama']; ?></b>?</h3>
                            <p class="text-muted font-primary">Data ini akan dihapus secara permanen !</p>
                            <a class="btn btn-danger mt-4" href="<?= BASEURL; ?>/user/delete/<?= $user['id']; ?>" style="width: 100px;">Yes</a>
                            <button type="button" class="btn btn-success mt-4" data-dismiss="modal" style="width: 100px;">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>