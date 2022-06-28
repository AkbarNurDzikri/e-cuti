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
                <i class="fa-solid fa-plus"></i> Pendidikan
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
    <table class="table table-hover display" id="table_id">
        <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Nama Pendidikan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data['pendidikan'] as $pendidikan) : ?>
                <tr class="text-center">
                    <td><?= $i++; ?></td>
                    <td><?= $pendidikan['nama_pendidikan']; ?></td>
                    <td class="text-center">
                        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#edit<?= $pendidikan['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
                        <button class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#confirmDelete<?= $pendidikan['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pendidikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/pendidikan/store" method="POST">
                    <div class="row">
                        <div class="col-md mb-3">
                            <label for="nama_pendidikan" class="form-label">Nama Pendidikan</label>
                            <input type="text" class="form-control" name="nama_pendidikan" id="nama_pendidikan" required>
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

<?php foreach ($data['pendidikan'] as $pendidikan) : ?>
    <!-- Modal -->
    <div class="modal fade" id="edit<?= $pendidikan['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pendidikan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/pendidikan/update" method="POST">
                        <input type="hidden" name="id" value="<?= $pendidikan['id']; ?>">
                        <input type="hidden" name="created_at" value="<?= $pendidikan['created_at']; ?>">
                        <div class="row">
                            <div class="col-md mb-3">
                                <label for="nama_pendidikan" class="form-label">Nama Pendidikan</label>
                                <input type="text" class="form-control" name="nama_pendidikan" id="nama_pendidikan" value="<?= $pendidikan['nama_pendidikan']; ?>">
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

<?php foreach ($data['pendidikan'] as $pendidikan) : ?>
    <!-- Modal -->
    <div class="modal fade" id="confirmDelete<?= $pendidikan['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <h3 class="font-primary mt-5">Yakin hapus data <b><?= $pendidikan['nama_pendidikan']; ?></b>?</h3>
                            <p class="text-muted font-primary">Data ini akan dihapus secara permanen !</p>
                            <a class="btn btn-danger mt-4" href="<?= BASEURL; ?>/pendidikan/delete/<?= $pendidikan['id']; ?>" style="width: 100px;">Yes</a>
                            <button type="button" class="btn btn-success mt-4" data-bs-dismiss="modal" style="width: 100px;">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>