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
                <i class="fa-solid fa-plus"></i> Member Group
            </button>
        </div>
    </div>
</div>

<div class="row align-items-center">
    <div class="col-md mt-3">
        <?php Flasher::flash(); ?>
    </div>
</div>

<div class="card card-body font-primary table-responsive">
    <div class="row mb-3">
        <div class="col-md text-end">
            <?php if ($_SESSION['user']['gender'] == 'L') : ?>
                <img src="<?= BASEURL; ?>/assets/vector/user-man.png" alt="" style="width: 60px;">
                <button class="badge bg-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
                    <?= $_SESSION['user']['nama_user']; ?> <i class="ms-3 fa-solid fa-angle-down"></i>
                </button>
                <div class="collapse" id="collapseExample3">
                    <a href="" class="mb-1 text-dark text-decoration-none">Ganti Password <i class="fa-solid fa-unlock-keyhole"></i> </a> <br>
                    <a href="<?= BASEURL; ?>/auth/logout" class="mb-1 text-dark text-decoration-none">Keluar <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </div>
            <?php else : ?>
                <img src="<?= BASEURL; ?>/assets/vector/user-woman.png" alt="" style="width: 60px;">
                <button class="badge bg-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
                    <?= $_SESSION['user']['nama_user']; ?> <i class="ms-3 fa-solid fa-angle-down"></i>
                </button>
                <div class="collapse" id="collapseExample3">
                    <a href="" class="mb-1 text-dark text-decoration-none">Ganti Password <i class="fa-solid fa-key"></i> </a> <br>
                    <a href="<?= BASEURL; ?>/auth/logout" class="mb-1 text-dark text-decoration-none">Keluar <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <table class="table table-hover table-bordered display" id="table_id">
        <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Nama Member</th>
                <th>Dept.</th>
                <th>Jabatan</th>
                <th>Jobdesc</th>
                <th>Atasan 1</th>
                <th>Atasan 2</th>
                <th>Atasan 3</th>
                <th>Atasan 4</th>
                <th>Atasan 5</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data['group'] as $group) : ?>
                <tr class="text-center">
                    <td><?= $i++; ?></td>
                    <td><?= $group['member']; ?></td>
                    <td><?= $group['nama_dept']; ?></td>
                    <td><?= $group['nama_jabatan']; ?></td>
                    <td><?= $group['jobdesc']; ?></td>
                    <td><?= $group['atasan1']; ?></td>
                    <td><?= $group['atasan2']; ?></td>
                    <td><?= $group['atasan3']; ?></td>
                    <td><?= $group['atasan4']; ?></td>
                    <td><?= $group['atasan5']; ?></td>
                    <td class="text-center">
                        <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#show<?= $group['id']; ?>"><i class="fa-solid fa-eye"></i></button>
                        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#edit<?= $group['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
                        <button class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#confirmDelete<?= $group['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Member Group</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/group/store" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="karyawan_id" class="form-label">Member</label>
                            <select name="karyawan_id" id="karyawan_id" class="form-select" required>
                                <option value="" selected disabled>Pilih Member</option>
                                <?php foreach ($data['karyawan'] as $karyawan) : ?>
                                    <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="dept_id" class="form-label">Departemen</label>
                            <select name="dept_id" id="dept_id" class="form-select" required>
                                <option value="" selected disabled>Pilih Dept.</option>
                                <?php foreach ($data['dept'] as $dept) : ?>
                                    <option value="<?= $dept['id']; ?>"><?= $dept['nama_dept']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jabatan_id" class="form-label">Jabatan</label>
                            <select name="jabatan_id" id="jabatan_id" class="form-select" required>
                                <option value="" selected disabled>Pilih Jabatan</option>
                                <?php foreach ($data['jabatan'] as $jabatan) : ?>
                                    <option value="<?= $jabatan['id']; ?>"><?= $jabatan['nama_jabatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="atasan_1" class="form-label">Atasan 1</label>
                            <select name="atasan_1" id="atasan_1" class="form-select">
                                <option value="" selected disabled>Pilih Atasan</option>
                                <?php foreach ($data['karyawan'] as $karyawan) : ?>
                                    <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="atasan_2" class="form-label">Atasan 2</label>
                            <select name="atasan_2" id="atasan_2" class="form-select">
                                <option value="" selected disabled>Pilih Atasan</option>
                                <?php foreach ($data['karyawan'] as $karyawan) : ?>
                                    <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="atasan_3" class="form-label">Atasan 3</label>
                            <select name="atasan_3" id="atasan_3" class="form-select">
                                <option value="" selected disabled>Pilih Atasan</option>
                                <?php foreach ($data['karyawan'] as $karyawan) : ?>
                                    <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="atasan_4" class="form-label">Atasan 4</label>
                            <select name="atasan_4" id="atasan_4" class="form-select">
                                <option value="" selected disabled>Pilih Atasan</option>
                                <?php foreach ($data['karyawan'] as $karyawan) : ?>
                                    <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="atasan_5" class="form-label">Atasan 5</label>
                            <select name="atasan_5" id="atasan_5" class="form-select">
                                <option value="" selected disabled>Pilih Atasan</option>
                                <?php foreach ($data['karyawan'] as $karyawan) : ?>
                                    <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
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

<?php foreach ($data['group'] as $group) : ?>
    <!-- Modal -->
    <div class="modal fade" id="edit<?= $group['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit group</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/group/update" method="POST">
                        <input type="hidden" name="id" value="<?= $group['id']; ?>">
                        <input type="hidden" name="created_at" value="<?= $group['created_at']; ?>">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="karyawan_id" class="form-label">Member</label>
                                <select name="karyawan_id" id="karyawan_id" class="form-select" required>
                                    <option value="<?= $group['karyawan_id']; ?>" selected>Exist : <?= $group['member']; ?></option>
                                    <option value="" disabled>Pilih Member</option>
                                    <?php foreach ($data['karyawan'] as $karyawan) : ?>
                                        <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dept_id" class="form-label">Departemen</label>
                                <select name="dept_id" id="dept_id" class="form-select" required>
                                    <option value="<?= $group['dept_id']; ?>" selected>Exist : <?= $group['nama_dept']; ?></option>
                                    <option value="" disabled>Pilih Dept.</option>
                                    <?php foreach ($data['dept'] as $dept) : ?>
                                        <option value="<?= $dept['id']; ?>"><?= $dept['nama_dept']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="jabatan_id" class="form-label">Jabatan</label>
                                <select name="jabatan_id" id="jabatan_id" class="form-select" required>
                                    <option value="<?= $group['jabatan_id']; ?>" selected>Exist : <?= $group['nama_jabatan']; ?></option>
                                    <option value="" disabled>Pilih Jabatan</option>
                                    <?php foreach ($data['jabatan'] as $jabatan) : ?>
                                        <option value="<?= $jabatan['id']; ?>"><?= $jabatan['nama_jabatan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="atasan_1" class="form-label">Atasan 1</label>
                                <select name="atasan_1" id="atasan_1" class="form-select">
                                    <?php if ($group['atasan_1'] == null) : ?>
                                        <option value="NULL">-- No Data --</option>
                                    <?php else : ?>
                                        <option value="<?= $group['atasan_1']; ?>" selected>Exist : <?= $group['atasan1']; ?></option>
                                    <?php endif; ?>
                                    <option value="" disabled>Pilih Atasan</option>
                                    <?php foreach ($data['karyawan'] as $karyawan) : ?>
                                        <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="atasan_2" class="form-label">Atasan 2</label>
                                <select name="atasan_2" id="atasan_2" class="form-select">
                                    <?php if ($group['atasan_2'] == null) : ?>
                                        <option value="NULL">-- No Data --</option>
                                    <?php else : ?>
                                        <option value="<?= $group['atasan_2']; ?>" selected>Exist : <?= $group['atasan2']; ?></option>
                                    <?php endif; ?>
                                    <option value="" disabled>Pilih Atasan</option>
                                    <?php foreach ($data['karyawan'] as $karyawan) : ?>
                                        <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="atasan_3" class="form-label">Atasan 3</label>
                                <select name="atasan_3" id="atasan_3" class="form-select">
                                    <?php if ($group['atasan_3'] == null) : ?>
                                        <option value="NULL">-- No Data --</option>
                                    <?php else : ?>
                                        <option value="<?= $group['atasan_3']; ?>" selected>Exist : <?= $group['atasan3']; ?></option>
                                    <?php endif; ?>
                                    <option value="" disabled>Pilih Atasan</option>
                                    <?php foreach ($data['karyawan'] as $karyawan) : ?>
                                        <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="atasan_4" class="form-label">Atasan 4</label>
                                <select name="atasan_4" id="atasan_4" class="form-select">
                                    <?php if ($group['atasan_4'] == null) : ?>
                                        <option value="NULL">-- No Data --</option>
                                    <?php else : ?>
                                        <option value="<?= $group['atasan_4']; ?>" selected>Exist : <?= $group['atasan4']; ?></option>
                                    <?php endif; ?>
                                    <option value="" disabled>Pilih Atasan</option>
                                    <?php foreach ($data['karyawan'] as $karyawan) : ?>
                                        <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="atasan_5" class="form-label">Atasan 5</label>
                                <select name="atasan_5" id="atasan_5" class="form-select">
                                    <?php if ($group['atasan_5'] == null) : ?>
                                        <option value="">-- No Data --</option>
                                    <?php else : ?>
                                        <option value="<?= $group['atasan_5']; ?>" selected>Exist : <?= $group['atasan5']; ?></option>
                                    <?php endif; ?>
                                    <option value="" disabled>Pilih Atasan</option>
                                    <?php foreach ($data['karyawan'] as $karyawan) : ?>
                                        <option value="<?= $karyawan['id']; ?>"><?= $karyawan['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
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

<?php foreach ($data['group'] as $group) : ?>
    <!-- Modal -->
    <div class="modal fade" id="show<?= $group['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail group</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="karyawan_id" class="form-label">Nama Member</label>
                            <input type="text" class="form-control" name="karyawan_id" id="karyawan_id" value="<?= $group['member']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="dept_id" class="form-label">Departemen</label>
                            <input type="text" class="form-control" name="dept_id" id="dept_id" value="<?= $group['nama_dept']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jabatan_id" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan_id" id="jabatan_id" value="<?= $group['nama_jabatan']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="atasan_1" class="form-label">Atasan 1</label>
                            <input type="text" class="form-control" name="atasan_1" id="atasan_1" value="<?= $group['atasan1']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="atasan_2" class="form-label">Atasan 2</label>
                            <input type="text" class="form-control" name="atasan_2" id="atasan_2" value="<?= $group['atasan2']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="atasan_3" class="form-label">Atasan 3</label>
                            <input type="text" class="form-control" name="atasan_3" id="atasan_3" value="<?= $group['atasan3']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="atasan_4" class="form-label">Atasan 4</label>
                            <input type="text" class="form-control" name="atasan_4" id="atasan_4" value="<?= $group['atasan4']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="atasan_5" class="form-label">Atasan 5</label>
                            <input type="text" class="form-control" name="atasan_5" id="atasan_5" value="<?= $group['atasan5']; ?>" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($data['group'] as $group) : ?>
    <!-- Modal -->
    <div class="modal fade" id="confirmDelete<?= $group['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <h3 class="font-primary mt-5">Yakin hapus data <b><?= $group['member']; ?></b>?</h3>
                            <p class="text-muted font-primary">Data ini akan dihapus secara permanen !</p>
                            <a class="btn btn-danger mt-4" href="<?= BASEURL; ?>/group/delete/<?= $group['id']; ?>" style="width: 100px;">Yes</a>
                            <button type="button" class="btn btn-success mt-4" data-bs-dismiss="modal" style="width: 100px;">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>