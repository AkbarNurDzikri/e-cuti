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
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Tempat, tgl lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Pendidikan</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['karyawan'] as $karyawan) : ?>
                    <tr class="text-center">
                        <td><?= $i++; ?></td>
                        <td><?= $karyawan['nrp']; ?></td>
                        <td><?= $karyawan['nama']; ?></td>
                        <td><?= $karyawan['tempat_lahir']; ?>, <?= date('d-M-y', strtotime($karyawan['tgl_lahir'])); ?></td>
                        <td><?php if ($karyawan['jenkel'] == 'L') {
                                echo 'Laki-laki';
                            } else echo 'Perempuan'; ?></td>
                        <td><?= $karyawan['nama_pendidikan']; ?></td>
                        <td><?= $karyawan['nama_jurusan']; ?></td>
                        <td><?= $karyawan['alamat']; ?></td>
                        <td class="text-center">
                            <button class="btn btn-success mb-2" data-toggle="modal" data-target="#show<?= $karyawan['id']; ?>"><i class="fa-solid fa-eye"></i></button>
                            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#edit<?= $karyawan['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
                            <button class="btn btn-danger mb-2" data-toggle="modal" data-target="#confirmDelete<?= $karyawan['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
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
                <h5 class="modal-title" id="createModalLabel">Tambah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/karyawan/store" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nrp" class="form-label">NRP</label>
                            <input type="text" class="form-control" name="nrp" id="nrp" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" name="nik" id="nik" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenkel" class="form-label">Jenis Kelamin</label>
                            <select name="jenkel" id="jenkel" class="custom-select" required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="pendidikan_id" class="form-label">Pendidikan</label>
                            <select name="pendidikan_id" id="pendidikan_id" class="custom-select" required>
                                <option value="" disabled selected>Pilih Pendidikan</option>
                                <?php foreach ($data['pendidikan'] as $pendidikan) : ?>
                                    <option value="<?= $pendidikan['id']; ?>"><?= $pendidikan['nama_pendidikan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jurusan_id" class="form-label">Jurusan</label>
                            <select name="jurusan_id" id="jurusan_id" class="custom-select" required>
                                <option value="" disabled selected>Pilih Jurusan</option>
                                <?php foreach ($data['jurusan'] as $jurusan) : ?>
                                    <option value="<?= $jurusan['id']; ?>"><?= $jurusan['nama_jurusan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select name="agama" id="agama" class="custom-select" required>
                                <option value="" disabled selected>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                            <select name="status_perkawinan" id="status_perkawinan" class="custom-select" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="1">Menikah</option>
                                <option value="0">Belum Menikah</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_kk" class="form-label">No KK</label>
                            <input type="text" class="form-control" name="no_kk" id="no_kk" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ibu_kandung" class="form-label">Nama Ibu Kandung</label>
                            <input type="text" class="form-control" name="ibu_kandung" id="ibu_kandung" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ayah_kandung" class="form-label">Nama Ayah Kandung</label>
                            <input type="text" class="form-control" name="ayah_kandung" id="ayah_kandung" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="bpjs_tk" class="form-label">BPJS Ketenagakerjaan</label>
                            <input type="text" class="form-control" name="bpjs_tk" id="bpjs_tk">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="bpjs_ks" class="form-label">BPJS Kesehatan</label>
                            <input type="text" class="form-control" name="bpjs_ks" id="bpjs_ks">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="npwp" class="form-label">NPWP</label>
                            <input type="text" class="form-control" name="npwp" id="npwp">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="hak_cuti_tahunan" class="form-label">Hak Cuti Tahunan</label>
                            <input type="text" class="form-control" name="hak_cuti_tahunan" id="hak_cuti_tahunan" required>
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

<?php foreach ($data['karyawan'] as $karyawan) : ?>
    <!-- Modal -->
    <div class="modal fade" id="edit<?= $karyawan['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/karyawan/update" method="POST">
                        <input type="hidden" name="id" value="<?= $karyawan['id']; ?>">
                        <input type="hidden" name="created_at" value="<?= $karyawan['created_at']; ?>">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nrp" class="form-label">NRP</label>
                                <input type="text" class="form-control" name="nrp" id="nrp" value="<?= $karyawan['nrp']; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" value="<?= $karyawan['nik']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $karyawan['nama']; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $karyawan['tempat_lahir']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $karyawan['tgl_lahir']; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="jenkel" class="form-label">Jenis Kelamin</label>
                                <select name="jenkel" id="jenkel" class="custom-select">
                                    <option value="<?= $karyawan['jenkel']; ?>" selected>
                                        <?php if ($karyawan['jenkel'] == 'L') {
                                            echo 'Exist : Laki-laki';
                                        } else echo 'Exist : Perempuan'; ?>
                                    </option>
                                    <option value="" disabled>Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="pendidikan_id" class="form-label">Pendidikan</label>
                                <select name="pendidikan_id" id="pendidikan_id" class="custom-select" required>
                                    <option value="<?= $karyawan['pendidikan_id']; ?>" selected>Exist : <?= $karyawan['nama_pendidikan']; ?></option>
                                    <option value="" disabled>Pilih Pendidikan</option>
                                    <?php foreach ($data['pendidikan'] as $pendidikan) : ?>
                                        <option value="<?= $pendidikan['id']; ?>"><?= $pendidikan['nama_pendidikan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="jurusan_id" class="form-label">Jurusan</label>
                                <select name="jurusan_id" id="jurusan_id" class="custom-select" required>
                                    <option value="<?= $karyawan['jurusan_id']; ?>">Exist : <?= $karyawan['nama_jurusan']; ?></option>
                                    <option value="" disabled>Pilih Jurusan</option>
                                    <?php foreach ($data['jurusan'] as $jurusan) : ?>
                                        <option value="<?= $jurusan['id']; ?>"><?= $jurusan['nama_jurusan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select name="agama" id="agama" class="custom-select">
                                    <option value="<?= $karyawan['agama']; ?>" selected>Exist : <?= $karyawan['agama']; ?></option>
                                    <option value="" disabled>Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat"><?= $karyawan['alamat']; ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                                <select name="status_perkawinan" id="status_perkawinan" class="custom-select">
                                    <option value="<?= $karyawan['status_perkawinan'] ?>">
                                        <?php if ($karyawan['status_perkawinan'] == 0) {
                                            echo 'Belum Menikah';
                                        } else echo 'Menikah'; ?>
                                    </option>
                                    <option value="" disabled>Pilih Status</option>
                                    <option value="1">Menikah</option>
                                    <option value="0">Belum Menikah</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="no_kk" class="form-label">No KK</label>
                                <input type="text" class="form-control" name="no_kk" id="no_kk" value="<?= $karyawan['no_kk']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="no_hp" class="form-label">No Hp</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $karyawan['no_hp']; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= $karyawan['email']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ibu_kandung" class="form-label">Nama Ibu Kandung</label>
                                <input type="text" class="form-control" name="ibu_kandung" id="ibu_kandung" value="<?= $karyawan['ibu_kandung']; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ayah_kandung" class="form-label">Nama Ayah Kandung</label>
                                <input type="text" class="form-control" name="ayah_kandung" id="ayah_kandung" value="<?= $karyawan['ayah_kandung']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="bpjs_tk" class="form-label">BPJS Ketenagakerjaan</label>
                                <input type="text" class="form-control" name="bpjs_tk" id="bpjs_tk" value="<?= $karyawan['bpjs_tk']; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="bpjs_ks" class="form-label">BPJS Kesehatan</label>
                                <input type="text" class="form-control" name="bpjs_ks" id="bpjs_ks" value="<?= $karyawan['bpjs_ks']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="npwp" class="form-label">NPWP</label>
                                <input type="text" class="form-control" name="npwp" id="npwp" value="<?= $karyawan['npwp']; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="hak_Cuti_tahunan" class="form-label">Hak Cuti Tahunan</label>
                                <input type="text" class="form-control" name="hak_cuti_tahunan" id="hak_cuti_tahunan" value="<?= $karyawan['hak_cuti_tahunan']; ?>">
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

<?php foreach ($data['karyawan'] as $karyawan) : ?>
    <!-- Modal -->
    <div class="modal fade" id="show<?= $karyawan['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nrp" class="form-label">NRP</label>
                            <input type="text" class="form-control" name="nrp" id="nrp" value="<?= $karyawan['nrp']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" name="nik" id="nik" value="<?= $karyawan['nik']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $karyawan['nama']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $karyawan['tempat_lahir']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $karyawan['tgl_lahir']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenkel" class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenkel" id="jenkel" value="<?php if ($karyawan['jenkel'] == 'L') {
                                                                                                            echo 'Laki-laki';
                                                                                                        } else echo 'Perempuan'; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="pendidikan_id" class="form-label">Pendidikan</label>
                            <input type="text" class="form-control" name="pendidikan_id" value="<?= $karyawan['nama_pendidikan']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jurusan_id" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan_id" value="<?= $karyawan['nama_jurusan']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <input type="text" class="form-control" name="agama" id="jenkel" value="<?= $karyawan['agama']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" readonly><?= $karyawan['alamat']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                            <input type="text" class="form-control" name="status_perkawinan" id="status_perkawinan" value="<?php if ($karyawan['status_perkawinan'] == 0) {
                                                                                                                                echo 'Belum Menikah';
                                                                                                                            } else echo 'Menikah'; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_kk" class="form-label">No KK</label>
                            <input type="text" class="form-control" name="no_kk" id="no_kk" value="<?= $karyawan['no_kk']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $karyawan['no_hp']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= $karyawan['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ibu_kandung" class="form-label">Nama Ibu Kandung</label>
                            <input type="text" class="form-control" name="ibu_kandung" id="ibu_kandung" value="<?= $karyawan['ibu_kandung']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ayah_kandung" class="form-label">Nama Ayah Kandung</label>
                            <input type="text" class="form-control" name="ayah_kandung" id="ayah_kandung" value="<?= $karyawan['ayah_kandung']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="bpjs_tk" class="form-label">BPJS Ketenagakerjaan</label>
                            <input type="text" class="form-control" name="bpjs_tk" id="bpjs_tk" value="<?= $karyawan['bpjs_tk']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="bpjs_ks" class="form-label">BPJS Kesehatan</label>
                            <input type="text" class="form-control" name="bpjs_ks" id="bpjs_ks" value="<?= $karyawan['bpjs_ks']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="npwp" class="form-label">NPWP</label>
                            <input type="text" class="form-control" name="npwp" id="npwp" value="<?= $karyawan['npwp']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="hak_cuti_tahunan" class="form-label">Hak Cuti Tahunan</label>
                            <input type="text" class="form-control" name="hak_cuti_tahunan" id="hak_cuti_tahunan" value="<?= $karyawan['hak_cuti_tahunan'] ?>" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($data['karyawan'] as $karyawan) : ?>
    <!-- Modal -->
    <div class="modal fade" id="confirmDelete<?= $karyawan['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <h3 class="font-primary mt-5">Yakin hapus data <b><?= $karyawan['nama']; ?></b>?</h3>
                            <p class="text-muted font-primary">Data ini akan dihapus secara permanen !</p>
                            <a class="btn btn-danger mt-4" href="<?= BASEURL; ?>/karyawan/delete/<?= $karyawan['id']; ?>" style="width: 100px;">Yes</a>
                            <button type="button" class="btn btn-success mt-4" data-dismiss="modal" style="width: 100px;">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>