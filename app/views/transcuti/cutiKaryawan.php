<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link" href="<?= BASEURL; ?>/transcuti" role="tab" aria-controls="CutiSaya" aria-selected="true">Cuti Saya</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link active" href="<?= BASEURL; ?>/transcuti/cutiKaryawan" role="tab" aria-controls="CutiKaryawan" aria-selected="false">Cuti Karyawan</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="CutiKaryawan" role="tabpanel" aria-labelledby="CutiKaryawan-tab">
    <div class="card font-primary table-responsive">
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Tgl Publish</th>
                        <th>Nama</th>
                        <th>Jenis Cuti</th>
                        <th>Mulai Cuti</th>
                        <th>Selesai Cuti</th>
                        <th>Durasi</th>
                        <th>Keterangan</th>
                        <th>Berkas Cuti Khusus</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data['transcuti'] as $transcuti) : ?>
                        <tr class="text-center">
                            <td><?= $i++; ?></td>
                            <td><?= date('D, d-M-Y H:i', strtotime($transcuti['created_at'])); ?></td>
                            <td><?= $transcuti['karyawan']; ?></td>
                            <td><?= $transcuti['cuti']; ?></td>
                            <td>
                                <?php if ($transcuti['mulai_cuti'] !== null) : ?>
                                    <?= date('D, d-M-Y', strtotime($transcuti['mulai_cuti'])); ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($transcuti['selesai_cuti'] !== null) : ?>
                                    <?= date('D, d-M-Y', strtotime($transcuti['selesai_cuti'])); ?>
                                <?php endif; ?>
                            </td>
                            <?php if ($transcuti['cuti_out'] !== null) : ?>
                                <td><?= $transcuti['cuti_out']; ?> Hari</td>
                            <?php endif; ?>
                            <td><?= $transcuti['keterangan']; ?></td>
                            <td>
                                <?php if ($transcuti['bukti_cuti'] !== null) : ?>
                                    <img src="<?= BASEURL; ?>/assets/img/upload/<?= $transcuti['bukti_cuti'] ?>" alt="Berkas tidak ditemukan, hhhmm sepertinya file yang diupload tidak sesuai dengan format yang diizinkan !" class="w-50"> <br>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="badge bg-dark border-0 mt-2" data-toggle="modal" data-target="#buktiCuti<?= $transcuti['id'] ?>">
                                        <i class="fa-2x fa-solid fa-magnifying-glass"></i>
                                    </button>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($transcuti['status'] == 8) : ?>
                                    <p class="text-primary">Permohonan disetujui <b><?= $transcuti['creator']; ?></b> <br> <?= date('d-M-Y H:i', strtotime($transcuti['created_at'])); ?></p>
                                <?php endif; ?>

                                <?php if ($transcuti['status'] == 1) : ?>
                                    <p class="text-primary">Adjustment by <b><?= $transcuti['creator']; ?></b> <br> <?= date('d-M-Y H:i', strtotime($transcuti['created_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 2) : ?>
                                    <i class="fa-solid fa-hourglass"></i> Menunggu konfirmasi Leader
                                <?php elseif ($transcuti['status'] == 3) : ?>
                                    <i class="fa-solid fa-hourglass"></i> Menunggu konfirmasi Supervisor
                                <?php elseif ($transcuti['status'] == 30) : ?>
                                    <p class="text-danger"><i class="fa-solid fa-xmark"></i> Ditolak oleh <b><?= $transcuti['atasan1']; ?></b> <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 4) : ?>
                                    <i class="fa-solid fa-hourglass"></i> Menunggu konfirmasi Manager
                                <?php elseif ($transcuti['status'] == 40) : ?>
                                    <p class="text-danger"><i class="fa-solid fa-xmark"></i> Ditolak oleh <b><?= $transcuti['atasan2']; ?></b> <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 5) : ?>
                                    <i class="fa-solid fa-hourglass"></i> Menunggu konfirmasi Factory Manager
                                <?php elseif ($transcuti['status'] == 50) : ?>
                                    <p class="text-danger"><i class="fa-solid fa-xmark"></i> Ditolak oleh <b><?= $transcuti['atasan3']; ?></b> <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 6) : ?>
                                    <i class="fa-solid fa-hourglass"></i> Menunggu konfirmasi HRD
                                <?php elseif ($transcuti['status'] == 60) : ?>
                                    <p class="text-danger"><i class="fa-solid fa-xmark"></i> Ditolak oleh <b><?= $transcuti['atasan4']; ?></b> <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 7) : ?>
                                    <p class="text-primary"><i class="fa-solid fa-check"></i> Permohonan disetujui <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 70) : ?>
                                    <p class="text-danger"><i class="fa-solid fa-xmark"></i> Ditolak oleh <b><?= $transcuti['atasan5']; ?></b> <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($_SESSION['user']['nama_jabatan'] == 'Leader' && $transcuti['status'] == 2) : ?>
                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#approval<?= $transcuti['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] !== 'HRD' && $transcuti['status'] == 3) : ?>
                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#approval<?= $transcuti['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Manager' && $transcuti['status'] == 4) : ?>
                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#approval<?= $transcuti['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Factory Manager' && $transcuti['status'] == 5) : ?>
                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#approval<?= $transcuti['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'HRD' && $transcuti['status'] == 6) : ?>
                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#approval<?= $transcuti['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
                                <?php endif; ?>

                                <?php if ($_SESSION['user']['nama_jabatan'] !== 'Leader' && $_SESSION['user']['nama_jabatan'] !== 'Supervisor' && $_SESSION['user']['nama_jabatan'] !== 'Manager' && $_SESSION['user']['nama_jabatan'] !== 'Factory Manager' && $_SESSION['user']['nama_dept'] !== 'HRD' && $transcuti['status'] == 2 || $transcuti['status'] == 3 || $transcuti['status'] == 4) : ?>
                                    <button class="btn btn-danger mb-2" data-toggle="modal" data-target="#confirmDelete<?= $transcuti['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'HRD' && $transcuti['status'] < 7) : ?>
                                    <button class="btn btn-danger mb-2" data-toggle="modal" data-target="#confirmDelete<?= $transcuti['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Leader' && $transcuti['status'] == 3 && $transcuti['karyawan_id'] == $_SESSION['user']['id_user']) : ?>
                                    <button class="btn btn-danger mb-2" data-toggle="modal" data-target="#confirmDelete<?= $transcuti['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] !== 'HRD' && $transcuti['status'] == 4 && $transcuti['karyawan_id'] == $_SESSION['user']['id_user']) : ?>
                                    <button class="btn btn-danger mb-2" data-toggle="modal" data-target="#confirmDelete<?= $transcuti['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Manager' && $transcuti['status'] == 5 && $transcuti['karyawan_id'] == $_SESSION['user']['id_user']) : ?>
                                    <button class="btn btn-danger mb-2" data-toggle="modal" data-target="#confirmDelete<?= $transcuti['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Factory Manager' && $transcuti['status'] == 6 && $transcuti['karyawan_id'] == $_SESSION['user']['id_user']) : ?>
                                    <button class="btn btn-danger mb-2" data-toggle="modal" data-target="#confirmDelete<?= $transcuti['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
  <div class="tab-pane fade" id="CutiKaryawan" role="tabpanel" aria-labelledby="CutiKaryawan-tab">
    ...
  </div>
</div>

<!-- <div class="row mb-1">
    <div class="col-md text-start">
        <?php if ($_SESSION['user']['nama_jabatan'] == 'Leader' or $_SESSION['user']['nama_jabatan'] == 'Supervisor' or $_SESSION['user']['nama_jabatan'] == 'Manager' or $_SESSION['user']['nama_jabatan'] == 'Factory Manager' or $_SESSION['user']['nama_jabatan'] == 'Administrator System') : ?>
            <div class="col-md text-start">
                <button class="btn btn-success mb-3" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                    <i class="fa-solid fa-filter"></i> Filter Data
                </button>
                <div class="collapse" id="collapseExample2">
                    <a href="<?= BASEURL; ?>/transcuti" class="badge bg-success mb-1 text-decoration-none">Cuti Saya</a> <br>
                    <a href="<?= BASEURL; ?>/transcuti/cutiKaryawan" class="badge bg-success mb-3 text-decoration-none">Cuti Karyawan</a>
                </div>
            </div>
            <p class="text-muted text-small"><?= $data['filter']; ?></p>
        <?php endif; ?>
    </div>

    <div class="col-md text-end">
        <?php if ($_SESSION['user']['gender'] == 'L') : ?>
            <img src="<?= BASEURL; ?>/assets/vector/user-man.png" alt="" style="width: 60px;">
            <span class="badge bg-dark">Sisa Hak Cuti : <?= $data['hak_cuti']['hak_cuti_tahunan'] + $data['cuti_in']['SUM(cuti_in)'] - $data['cuti_out']['SUM(cuti_out)'] ?> Hari</span> <br>
            <button class="badge bg-dark border-0" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
                <?= $_SESSION['user']['nama_user']; ?> | <?= $_SESSION['user']['nama_jabatan'] ?> <?= $_SESSION['user']['nama_dept'] ?> <i class="ms-3 fa-solid fa-angle-down"></i>
            </button>
            <div class="collapse" id="collapseExample3">
                <button type="button" class="badge bg-dark border-0 my-2" data-toggle="modal" data-target="#gantiPassw<?= $_SESSION['user']['id_user'] ?>">
                    Ganti Password
                </button> <br>
                <a href="<?= BASEURL; ?>/auth/logout" class="badge bg-dark mb-1 text-decoration-none">Keluar <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
        <?php else : ?>
            <img src="<?= BASEURL; ?>/assets/vector/user-woman.png" alt="" style="width: 60px;">
            <span class="badge bg-dark">Sisa Hak Cuti : <?= $data['hak_cuti']['hak_cuti_tahunan'] + $data['cuti_in']['SUM(cuti_in)'] - $data['cuti_out']['SUM(cuti_out)'] ?> Hari</span> <br>
            <button class="badge bg-dark border-0" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
                <?= $_SESSION['user']['nama_user']; ?> | <?= $_SESSION['user']['nama_jabatan'] ?> <?= $_SESSION['user']['nama_dept'] ?> <i class="ms-3 fa-solid fa-angle-down"></i>
            </button>
            <div class="collapse" id="collapseExample3">
                <button type="button" class="badge bg-dark border-0 my-2" data-toggle="modal" data-target="#gantiPassw<?= $_SESSION['user']['id_user'] ?>">
                    Ganti Password
                </button> <br>
                <a href="<?= BASEURL; ?>/auth/logout" class="badge bg-dark mb-1 text-decoration-none">Keluar <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
        <?php endif; ?>
    </div>
</div> -->

<?php foreach ($data['cuti'] as $c) : ?>
    <!-- Modal -->
    <div class="modal fade" id="create<?= $c['id'] ?>" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Form <?= $c['nama_cuti']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if ($c['nama_cuti'] == 'Cuti Tahunan') : ?>
                        <?php if ($_SESSION['user']['nama_dept'] == 'HRD') : ?>
                            <form action="<?= BASEURL; ?>/transcuti/store" method="POST">
                                <input type="hidden" name="cuti_id" value="<?= $c['id'] ?>">

                                <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                                <select name="karyawan_id" class="select2" style="width: 100%;" required>
                                    <option value="<?= $_SESSION['user']['id_user'] ?>"><?= $_SESSION['user']['nama_user'] ?></option>
                                    <option value="" disabled>Pilih Karyawan</option>
                                    <?php foreach ($data['karyawan'] as $k) : ?>
                                        <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <?php if ($_SESSION['user']['nama_jabatan'] == 'Leader') : ?>
                                    <input type="hidden" name="status" value="3">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] !== 'HRD') : ?>
                                    <input type="hidden" name="status" value="4">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Manager') : ?>
                                    <input type="hidden" name="status" value="5">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Factory Manager') : ?>
                                    <input type="hidden" name="status" value="6">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'HRD') : ?>
                                    <input type="hidden" name="status" value="4">
                                <?php else : ?>
                                    <input type="hidden" name="status" value="2">
                                <?php endif; ?>

                                <div class="row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="saldo_awal" class="form-label">Sisa Hak Cuti</label>
                                        <?php
                                            $cuti_in = $data['cuti_in']['SUM(cuti_in)'];
                                            $cuti_out = $data['cuti_out']['SUM(cuti_out)'];
                                            $hak_cuti = $data['hak_cuti']['hak_cuti_tahunan'];
                                        ?>
                                        <input type="text" class="form-control" id="saldo_awal" value="<?= $hak_cuti + $cuti_in - $cuti_out ?>" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="cuti_out" class="form-label">Cuti Diambil</label>
                                        <input type="text" class="form-control" name="cuti_out" id="cuti_out" autocomplete="off" placeholder="Isi manual dg nilai 0.5 jika terdapat hari Sabtu" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="mulai_cuti" class="form-label">Mulai Cuti</label>
                                        <input type="date" class="form-control" name="mulai_cuti" id="mulai_cuti" onkeyup="hariCuti();" required>
                                    </div>

                                    <div class=" col-md-6 mb-3">
                                        <label for="selesai_cuti" class="form-label">Selesai Cuti</label>
                                        <input type="date" class="form-control" name="selesai_cuti" id="selesai_cuti" onkeyup="hariCuti();" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="telp" class="form-label">Kontak Darurat</label>
                                        <input type="number" class="form-control" name="telp" id="telp" placeholder="Nomor handphone aktif" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="keterangan" class="form-label">Keterangan Cuti</label>
                                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Tulis dengan singkat dan jelas alsan Anda membuat permohonan cuti" required></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        <?php else : ?>
                            <form action="<?= BASEURL; ?>/transcuti/store" method="POST">
                                <input type="hidden" name="cuti_id" value="<?= $c['id'] ?>">

                                <input type="hidden" name="karyawan_id" value="<?= $_SESSION['user']['id_user'] ?>">
                                <?php if ($_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_dept'] == 'Maintenance') : ?>
                                    <input type="hidden" name="status" value="3">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Staff' && $_SESSION['user']['nama_dept'] == 'Production') : ?>
                                    <input type="hidden" name="status" value="3">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Staff' && $_SESSION['user']['nama_dept'] == 'QC') : ?>
                                    <input type="hidden" name="status" value="3">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Staff' && $_SESSION['user']['nama_dept'] == 'Purchasing') : ?>
                                    <input type="hidden" name="status" value="4">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Staff' && $_SESSION['user']['nama_dept'] == 'PPIC') : ?>
                                    <input type="hidden" name="status" value="4">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] !== 'HRD') : ?>
                                    <input type="hidden" name="status" value="4">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Manager') : ?>
                                    <input type="hidden" name="status" value="5">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Factory Manager') : ?>
                                    <input type="hidden" name="status" value="6">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'HRD') : ?>
                                    <input type="hidden" name="status" value="4">
                                <?php else : ?>
                                    <input type="hidden" name="status" value="2">
                                <?php endif; ?>

                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                                        <input type="text" id="karyawan_id" class="form-control" value="<?= $_SESSION['user']['nama_user'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="saldo_awal" class="form-label">Sisa Hak Cuti</label>
                                        <?php
                                        $cuti_in = $data['cuti_in']['SUM(cuti_in)'];
                                        $cuti_out = $data['cuti_out']['SUM(cuti_out)'];
                                        $hak_cuti = $data['hak_cuti']['hak_cuti_tahunan'];
                                        ?>
                                        <input type="text" class="form-control" id="saldo_awal" value="<?= $hak_cuti + $cuti_in - $cuti_out ?>" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="cuti_out" class="form-label">Cuti Diambil</label>
                                        <input type="text" class="form-control" name="cuti_out" id="cuti_out" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="mulai_cuti" class="form-label">Mulai Cuti</label>
                                        <input type="date" class="form-control" name="mulai_cuti" id="mulai_cuti" onkeyup="hariCuti();" required>
                                    </div>

                                    <div class=" col-md-6 mb-3">
                                        <label for="selesai_cuti" class="form-label">Selesai Cuti</label>
                                        <input type="date" class="form-control" name="selesai_cuti" id="selesai_cuti" onkeyup="hariCuti();" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="telp" class="form-label">Kontak Darurat</label>
                                        <input type="number" class="form-control" name="telp" id="telp" placeholder="Nomor handphone aktif" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md mb-3">
                                        <label for="keterangan" class="form-label">Keterangan Cuti</label>
                                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Tulis dengan singkat dan jelas alsan Anda membuat permohonan cuti" required></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        <?php endif; ?>

                        <!-- Konversi tanggal ke integer -->
                        <script>
                            var mulaiCuti;
                            document.getElementById('mulai_cuti').onchange = (e) => {
                                mulaiCuti = new Date(e.target.value).getTime();
                                const detik = mulaiCuti / 1000;
                                const menit = detik / 60;
                                const jam = menit / 60;
                                const hari = jam / 24;
                                mulaiCuti = hari;
                            }

                            var selesaiCuti;
                            document.getElementById('selesai_cuti').onchange = (x) => {
                                selesaiCuti = new Date(x.target.value).getTime();
                                const detik = selesaiCuti / 1000;
                                const menit = detik / 60;
                                const jam = menit / 60;
                                const hari = jam / 24;
                                selesaiCuti = hari;
                            }

                            function hariCuti() {
                                var hariCuti = selesaiCuti - mulaiCuti;
                                var saldo_awal = document.getElementById('saldo_awal').value;
                                var cutiDiambil = document.getElementById('cuti_out').value = hariCuti + 1;
                                var sisa = saldo_awal - cutiDiambil;
                                if (mulaiCuti > selesaiCuti) {
                                    document.getElementById('cuti_out').value = 'Invalid Date !';
                                } else if (cutiDiambil > saldo_awal) {
                                    document.getElementById('cuti_out').value = 'Saldo kurang !';
                                } else {
                                    document.getElementById('cuti_out').value = cutiDiambil;
                                }
                            }
                        </script>
                    <?php endif; ?>

                    <?php if ($c['nama_cuti'] == 'Cuti Khusus') : ?>
                        <form action="<?= BASEURL; ?>/transcuti/store" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="cuti_id" value="<?= $c['id'] ?>">
                            <input type="hidden" name="karyawan_id" value="<?= $_SESSION['user']['id_user'] ?>">
                            <?php if ($_SESSION['user']['nama_jabatan'] == 'Leader') : ?>
                                <input type="hidden" name="status" value="3">
                            <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] !== 'HRD') : ?>
                                <input type="hidden" name="status" value="4">
                            <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Manager') : ?>
                                <input type="hidden" name="status" value="5">
                            <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Factory Manager') : ?>
                                <input type="hidden" name="status" value="6">
                            <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'HRD') : ?>
                                <input type="hidden" name="status" value="4">
                            <?php else : ?>
                                <input type="hidden" name="status" value="2">
                            <?php endif; ?>

                            <div class="row">
                                <div class="col-md mb-3">
                                    <!-- <label for="bukti_cuti" class="form-label">Berkas Cuti</label>
                                    <input type="file" class="form-control" name="bukti_cuti" id="bukti_cuti"> -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="bukti_cuti" name="bukti_cuti" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="bukti_cuti">Format Only : Jpg / Png</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="mulai_cuti" class="form-label">Mulai Cuti</label>
                                    <input type="date" class="form-control" name="mulai_cuti" id="mulai_cuti_khusus" onkeyup="hariCutiKhusus();" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="selesai_cuti" class="form-label">Selesai Cuti</label>
                                    <input type="date" class="form-control" name="selesai_cuti" id="selesai_cuti_khusus" onkeyup="hariCutiKhusus();" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="cuti_out" class="form-label">Cuti Diambil</label>
                                    <input type="text" class="form-control" name="cuti_out" id="cuti_out_khusus" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="telp" class="form-label">Kontak Darurat</label>
                                    <input type="number" class="form-control" name="telp" id="telp" placeholder="Nomor telpon yang bisa dihubungi">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" placeholder="Tulis dengan singkat dan jelas alasan Anda mengajukan cuti" required></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>

                        <!-- Konversi tanggal ke integer -->
                        <script>
                            var mulaiCutiKhusus;
                            document.getElementById('mulai_cuti_khusus').onchange = (e) => {
                                mulaiCutiKhusus = new Date(e.target.value).getTime();
                                const detikCutiKhusus = mulaiCutiKhusus / 1000;
                                const menitCutiKhusus = detikCutiKhusus / 60;
                                const jamCutiKhusus = menitCutiKhusus / 60;
                                const hariCutiKhusus = jamCutiKhusus / 24;
                                mulaiCutiKhusus = hariCutiKhusus;
                            }

                            var selesaiCutiKhusus;
                            document.getElementById('selesai_cuti_khusus').onchange = (x) => {
                                selesaiCutiKhusus = new Date(x.target.value).getTime();
                                const detikCutiKhusus = selesaiCutiKhusus / 1000;
                                const menitCutiKhusus = detikCutiKhusus / 60;
                                const jamCutiKhusus = menitCutiKhusus / 60;
                                const hariCutiKhusus = jamCutiKhusus / 24;
                                selesaiCutiKhusus = hariCutiKhusus;
                            }

                            function hariCutiKhusus() {
                                var hariCutiX = selesaiCutiKhusus - mulaiCutiKhusus;
                                var cutiDiambilX = document.getElementById('cuti_out_khusus').value = hariCutiX + 1;
                                if (mulaiCutiKhusus > selesaiCutiKhusus) {
                                    document.getElementById('cuti_out_khusus').value = 'Invalid Date !';
                                } else {
                                    document.getElementById('cuti_out_khusus').value = cutiDiambilX;
                                }
                            }
                        </script>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($data['transcuti'] as $transcuti) : ?>
    <!-- Modal -->
    <div class="modal fade" id="approval<?= $transcuti['id']; ?>" aria-labelledby="approvalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approvalModalLabel">Approval Cuti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/transcuti/approval" method="POST">
                        <input type="hidden" name="id" value="<?= $transcuti['id'] ?>">
                        <input type="hidden" name="cuti_id" value="<?= $transcuti['cuti_id'] ?>">
                        <input type="hidden" name="karyawan_id" value="<?= $transcuti['karyawan_id'] ?>">

                        <?php if ($transcuti['bukti_cuti'] !== null) : ?>
                            <input type="hidden" name="bukti_cuti" value="<?= $transcuti['bukti_cuti'] ?>">
                        <?php endif; ?>

                        <input type="hidden" name="mulai_cuti" value="<?= $transcuti['mulai_cuti'] ?>">
                        <input type="hidden" name="selesai_cuti" value="<?= $transcuti['selesai_cuti'] ?>">
                        
                        <input type="hidden" name="telp" value="<?= $transcuti['telp'] ?>">
                        <input type="hidden" name="keterangan" value="<?= $transcuti['keterangan'] ?>">
                        <?php if ($_SESSION['user']['nama_jabatan'] == 'Leader') : ?>
                            <input type="hidden" name="approval_1" value="<?= $_SESSION['user']['id_user'] ?>">
                        <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' and $_SESSION['user']['nama_dept'] !== 'HRD') : ?>
                            <input type="hidden" name="approval_1" value="<?= $transcuti['approval_1'] ?>">
                            <input type="hidden" name="approval_2" value="<?= $_SESSION['user']['id_user'] ?>">
                        <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Manager') : ?>
                            <input type="hidden" name="approval_1" value="<?= $transcuti['approval_1'] ?>">
                            <input type="hidden" name="approval_2" value="<?= $transcuti['approval_2'] ?>">
                            <input type="hidden" name="approval_3" value="<?= $_SESSION['user']['id_user'] ?>">
                        <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Factory Manager') : ?>
                            <input type="hidden" name="approval_1" value="<?= $transcuti['approval_1'] ?>">
                            <input type="hidden" name="approval_2" value="<?= $transcuti['approval_2'] ?>">
                            <input type="hidden" name="approval_3" value="<?= $transcuti['approval_3'] ?>">
                            <input type="hidden" name="approval_4" value="<?= $_SESSION['user']['id_user'] ?>">
                        <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' and $_SESSION['user']['nama_dept'] == 'HRD') : ?>
                            <input type="hidden" name="approval_1" value="<?= $transcuti['approval_1'] ?>">
                            <input type="hidden" name="approval_2" value="<?= $transcuti['approval_2'] ?>">
                            <input type="hidden" name="approval_3" value="<?= $transcuti['approval_3'] ?>">
                            <input type="hidden" name="approval_4" value="<?= $transcuti['approval_4'] ?>">
                            <input type="hidden" name="approval_5" value="<?= $_SESSION['user']['id_user'] ?>">
                        <?php endif; ?>
                        <input type="hidden" name="created_at" value="<?= $transcuti['created_at'] ?>">
                        <input type="hidden" name="updated_at" value="<?= date('Y-m-d h:i:s') ?>">
                        <input type="hidden" name="created_by" value="<?= $transcuti['created_by'] ?>">
                        <input type="hidden" name="updated_by" value="<?= $_SESSION['user']['id_user'] ?>">

                        <div class="card card-body mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>Pemohon</p>
                                </div>
                                <div class="col-md"> : <?= $transcuti['karyawan']; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>Tgl Cuti</p>
                                </div>
                                <div class="col-md"> : <?= date('D, d M Y', strtotime($transcuti['mulai_cuti'])) . ' s/d ' . date('D, d M Y', strtotime($transcuti['selesai_cuti'])) ?></div>
                            </div>

                            <?php if($_SESSION['user']['nama_dept'] == 'HRD' && $_SESSION['user']['nama_jabatan'] == 'Supervisor') : ?>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>Durasi</p>
                                    </div>
                                    <div class="col-md-4">
                                        <span><input type="text" class="form-control" name="cuti_out" id="cuti_out" value="<?=  $transcuti['cuti_out'] ?>" required></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="text-muted small-text"><i>Jika terdapat hari sabtu, durasi hari wajib diganti dengan input manual</i></span>
                                    </div>
                                </div>
                            <?php else : ?>
                                <input type="hidden" name="cuti_out" value="<?= $transcuti['cuti_out'] ?>">
                            <?php endif; ?>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>Keterangan</p>
                                </div>
                                <div class="col-md"> : <?= $transcuti['keterangan']; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>Kontak</p>
                                </div>
                                <div class="col-md"> : <?= $transcuti['telp']; ?></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <p>Approval</p>
                                </div>
                                <div class="col-md-4">
                                    <select name="status" class="select2" style="width: 100%;" required>
                                        <option value="" disabled selected>Pilih Keputusan</option>
                                        <?php if ($_SESSION['user']['nama_jabatan'] == 'Leader') : ?>
                                            <option value="3">Approve</option>
                                            <option value="30">Reject</option>
                                        <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] !== 'HRD') : ?>
                                            <option value="4">Approve</option>
                                            <option value="40">Reject</option>
                                        <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Manager') : ?>
                                            <option value="5">Approve</option>
                                            <option value="50">Reject</option>
                                        <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Factory Manager') : ?>
                                            <option value="6">Approve</option>
                                            <option value="60">Reject</option>
                                        <?php elseif ($_SESSION['user']['nama_dept'] == 'HRD' && $_SESSION['user']['nama_jabatan'] == 'Supervisor') : ?>
                                            <option value="7">Approve</option>
                                            <option value="70">Reject</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <?php if ($transcuti['bukti_cuti'] !== null) : ?>
                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <p>Berkas Cuti Khusus</p>
                                    </div>
                                    <div class="col-md"> <img src="<?= BASEURL; ?>/assets/img/upload/<?= $transcuti['bukti_cuti'] ?>" alt="bukti-cuti-khusus" class="w-100"></div>
                                </div>
                            <?php endif; ?>
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
<?php endforeach; ?>

<?php foreach ($data['transcuti'] as $transcuti) : ?>
    <!-- Modal -->
    <div class="modal fade" id="confirmDelete<?= $transcuti['id']; ?>" tabindex="-1" aria-labelledby="konfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="konfirmModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md text-center">
                            <i class="fa-5x fa-solid fa-circle-exclamation text-danger"></i>
                            <h3 class="font-primary mt-5">Yakin hapus cuti <b><?= $transcuti['karyawan']; ?></b>?</h3>
                            <p class="text-muted font-primary">Data ini akan dihapus secara permanen !</p>
                            <a class="btn btn-danger mt-4" href="<?= BASEURL; ?>/transcuti/delete/<?= $transcuti['id']; ?>" style="width: 100px;">Yes</a>
                            <button type="button" class="btn btn-success mt-4" data-dismiss="modal" style="width: 100px;">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($data['transcuti'] as $c) : ?>
    <!-- Modal -->
    <div class="modal fade" id="buktiCuti<?= $c['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Berkas Cuti <?= $c['karyawan'] ?></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card card-body">
                        <img src="<?= BASEURL; ?>/assets/img/upload/<?= $c['bukti_cuti'] ?>" alt="Berkas tidak ditemukan, hhhmm sepertinya file yang diupload tidak sesuai dengan format yang diizinkan !" class="w-100">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>