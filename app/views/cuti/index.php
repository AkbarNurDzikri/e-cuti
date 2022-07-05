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
                    <th>Nama Cuti</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['cuti'] as $cuti) : ?>
                    <tr class="text-center">
                        <td><?= $i++; ?></td>
                        <td><?= $cuti['nama_cuti']; ?></td>
                        <td class="text-center">
                            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#edit<?= $cuti['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
                            <button class="btn btn-danger mb-2" data-toggle="modal" data-target="#confirmDelete<?= $cuti['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Jenis Cuti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/cuti/store" method="POST">
                    <div class="row">
                        <div class="col-md mb-3">
                            <label for="nama_cuti" class="form-label">Nama Cuti</label>
                            <input type="text" class="form-control" name="nama_cuti" id="nama_cuti" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md mb-3">
                            <label for="keterangan" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" required>
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

<?php foreach ($data['cuti'] as $cuti) : ?>
    <!-- Modal -->
    <div class="modal fade" id="edit<?= $cuti['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Jenis Cuti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/cuti/update" method="POST">
                        <input type="hidden" name="id" value="<?= $cuti['id']; ?>">
                        <input type="hidden" name="created_at" value="<?= $cuti['created_at']; ?>">
                        <div class="row">
                            <div class="col-md mb-3">
                                <label for="nama_cuti" class="form-label">Nama Cuti</label>
                                <input type="text" class="form-control" name="nama_cuti" id="nama_cuti" value="<?= $cuti['nama_cuti']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md mb-3">
                                <label for="keterangan" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= $cuti['keterangan']; ?>">
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

<?php foreach ($data['cuti'] as $cuti) : ?>
    <!-- Modal -->
    <div class="modal fade" id="confirmDelete<?= $cuti['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md text-center">
                            <i class="fa-5x fa-solid fa-circle-exclamation text-danger"></i>
                            <h3 class="font-primary mt-5">Yakin hapus data <b><?= $cuti['nama_cuti']; ?></b>?</h3>
                            <p class="text-muted font-primary">Data ini akan dihapus secara permanen !</p>
                            <a class="btn btn-danger mt-4" href="<?= BASEURL; ?>/cuti/delete/<?= $cuti['id']; ?>" style="width: 100px;">Yes</a>
                            <button type="button" class="btn btn-success mt-4" data-dismiss="modal" style="width: 100px;">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>