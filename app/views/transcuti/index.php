<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" href="<?= BASEURL; ?>/transcuti" role="tab" aria-controls="CutiSaya" aria-selected="true">Cuti Saya</a>
    </li>
    <?php if ($_SESSION['user']['nama_jabatan'] == 'Leader' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' || $_SESSION['user']['nama_jabatan'] == 'Manager' || $_SESSION['user']['nama_jabatan'] == 'Factory Manager' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'HRD') : ?>
        <li class="nav-item" role="presentation">
            <a class="nav-link" href="<?= BASEURL; ?>/transcuti/cutiKaryawan" role="tab" aria-controls="CutiKaryawan" aria-selected="false">Cuti Karyawan</a>
        </li>
    <?php endif; ?>

    <?php if($_SESSION['user']['nama_dept'] == 'HRD') : ?>
        <li class="nav-item" role="presentation">
            <a class="nav-link" href="<?= BASEURL; ?>/transcuti/sisaCutiKaryawan" role="tab" aria-controls="SisaCutiKaryawan" aria-selected="false">Sisa Cuti Karyawan</a>
        </li>
    <?php endif; ?>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="CutiSaya" role="tabpanel" aria-labelledby="CutiSaya-tab">
    <div class="card font-primary table-responsive">
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-md mb-2">
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                        <i class="fas fa-feather-alt"></i> Buat Cuti
                    </button>
                    <div class="collapse" id="collapseExample2">
                        <?php foreach($data['cuti'] as $c) : ?>
                            <button type="button" class="badge badge-primary mb-1 border-0" data-toggle="modal" data-target="#create<?= $c['id']; ?>"><i class="fas fa-plus"></i> <?= $c['nama_cuti']; ?></button> </br>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
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
                                    <i class="fa-solid fa-hourglass"></i> Menunggu konfirmasi <?= $transcuti['atasan1']?>
                                <?php elseif ($transcuti['status'] == 3) : ?>
                                    <i class="fa-solid fa-hourglass"></i> Menunggu konfirmasi <?= $transcuti['atasan2']?>
                                <?php elseif ($transcuti['status'] == 30) : ?>
                                    <p class="text-danger"><i class="fa-solid fa-xmark"></i> Ditolak oleh <b><?= $transcuti['atasan1']; ?></b> <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 4) : ?>
                                    <i class="fa-solid fa-hourglass"></i> Menunggu konfirmasi <?= $transcuti['atasan3']?>
                                <?php elseif ($transcuti['status'] == 40) : ?>
                                    <p class="text-danger"><i class="fa-solid fa-xmark"></i> Ditolak oleh <b><?= $transcuti['atasan2']; ?></b> <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 5) : ?>
                                    <i class="fa-solid fa-hourglass"></i> Menunggu konfirmasi <?= $transcuti['atasan4']?>
                                <?php elseif ($transcuti['status'] == 50) : ?>
                                    <p class="text-danger"><i class="fa-solid fa-xmark"></i> Ditolak oleh <b><?= $transcuti['atasan3']; ?></b> <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 6) : ?>
                                    <i class="fa-solid fa-hourglass"></i> Menunggu konfirmasi <?= $transcuti['atasan5']?>
                                <?php elseif ($transcuti['status'] == 60) : ?>
                                    <p class="text-danger"><i class="fa-solid fa-xmark"></i> Ditolak oleh <b><?= $transcuti['atasan4']; ?></b> <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 7) : ?>
                                    <p class="text-primary"><i class="fa-solid fa-check"></i> Permohonan disetujui <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 70) : ?>
                                    <p class="text-danger"><i class="fa-solid fa-xmark"></i> Ditolak oleh <b><?= $transcuti['atasan5']; ?></b> <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
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
  <div class="tab-pane fade" id="SisaCutiKaryawan" role="tabpanel" aria-labelledby="SisaCutiKaryawan-tab">
    ...
  </div>
</div>

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

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                                        <select name="karyawan_id" class="select2" style="width: 100%;" required>
                                            <option value="<?= $_SESSION['user']['id_user'] ?>"><?= $_SESSION['user']['nama_user'] ?></option>
                                            <option value="" disabled>Pilih Karyawan</option>
                                            <?php foreach ($data['karyawan'] as $k) : ?>
                                                <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="approval_3" class="form-label">Factory Manager</label>
                                        <select name="approval_3" class="select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih Factory Manager</option>
                                            <?php foreach ($data['factory_manager'] as $l) : ?>
                                                <option value="<?= $l['factory_manager_id'] ?>"><?= $l['nama_factory_manager']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <?php if ($_SESSION['user']['nama_jabatan'] == 'Helper' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Helper' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Maintenance') : ?>
                                    <input type="hidden" name="status" value="2">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'Maintenance' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Staff' && $_SESSION['user']['nama_dept'] == 'IT') : ?>
                                    <input type="hidden" name="status" value="3">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'PPIC' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Purchasing' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'HRD' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'Maintenance') : ?>
                                    <input type="hidden" name="status" value="4">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Manager' && $_SESSION['user']['nama_dept'] == 'Management') : ?>
                                    <input type="hidden" name="status" value="5">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Factory Manager' && $_SESSION['user']['nama_dept'] == 'Management') : ?>
                                    <input type="hidden" name="status" value="6">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'HRD') : ?>
                                    <input type="hidden" name="status" value="7">
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
                                <?php if ($_SESSION['user']['nama_jabatan'] == 'Helper' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Helper' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Maintenance') : ?>
                                    <input type="hidden" name="status" value="2">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'Maintenance' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Production') : ?>
                                    <input type="hidden" name="status" value="3">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'PPIC' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Purchasing' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'HRD' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'Maintenance') : ?>
                                    <input type="hidden" name="status" value="4">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Factory Manager' && $_SESSION['user']['nama_dept'] == 'Management') : ?>
                                    <input type="hidden" name="status" value="5">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Manager' && $_SESSION['user']['nama_dept'] == 'Management') : ?>
                                    <input type="hidden" name="status" value="6">
                                <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'HRD') : ?>
                                    <input type="hidden" name="status" value="7">
                                <?php endif; ?>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                                        <input type="text" id="karyawan_id" class="form-control" value="<?= $_SESSION['user']['nama_user'] ?>" readonly>
                                    </div>
                                    <?php if($_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Maintenance' || $_SESSION['user']['nama_jabatan'] == 'Helper' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Helper' && $_SESSION['user']['nama_dept'] == 'Warehouse') : ?>
                                        <div class="col-md-6 mb-3">
                                            <label for="approval_1" class="form-label">Leader</label>
                                            <select name="approval_1" class="select2" style="width: 100%;" required>
                                                <option value="" selected disabled>Pilih Leader</option>
                                                <?php foreach ($data['leader'] as $l) : ?>
                                                    <option value="<?= $l['leader_id'] ?>"><?= $l['nama_leader']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <?php elseif($_SESSION['user']['nama_jabatan'] == 'Leader' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Production') : ?>
                                        <div class="col-md-6 mb-3">
                                            <label for="approval_2" class="form-label">Supervisor</label>
                                            <select name="approval_2" class="select2" style="width: 100%;" required>
                                                <option value="" selected disabled>Pilih Supervisor</option>
                                                <?php foreach ($data['supervisor'] as $l) : ?>
                                                    <option value="<?= $l['supervisor_id'] ?>"><?= $l['nama_supervisor']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <?php elseif($_SESSION['user']['nama_jabatan'] == 'Supervisor' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'PPIC'  || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Purchasing') : ?>
                                        <div class="col-md-6 mb-3">
                                            <label for="approval_3" class="form-label">Factory Manager</label>
                                            <select name="approval_3" class="select2" style="width: 100%;" required>
                                                <option value="" selected disabled>Pilih Factory Manager</option>
                                                <?php foreach ($data['factory_manager'] as $l) : ?>
                                                    <option value="<?= $l['factory_manager_id'] ?>"><?= $l['nama_factory_manager']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <?php elseif($_SESSION['user']['nama_jabatan'] == 'Factory Manager') : ?>
                                        <div class="col-md-6 mb-3">
                                            <label for="approval_4" class="form-label">Manager</label>
                                            <select name="approval_4" class="select2" style="width: 100%;" required>
                                                <option value="" selected disabled>Pilih Manager</option>
                                                <?php foreach ($data['manager'] as $l) : ?>
                                                    <option value="<?= $l['manager_id'] ?>"><?= $l['nama_manager']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <?php elseif($_SESSION['user']['nama_jabatan'] == 'Manager') : ?>
                                        <div class="col-md-6 mb-3">
                                            <label for="approval_5" class="form-label">HRD</label>
                                            <select name="approval_5" class="select2" style="width: 100%;" required>
                                                <option value="" selected disabled>Pilih HRD</option>
                                                <?php foreach ($data['hrd'] as $l) : ?>
                                                    <option value="<?= $l['hrd_id'] ?>"><?= $l['nama_hrd']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
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
                                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Tulis dengan singkat dan jelas alasan Anda membuat permohonan cuti" required></textarea>
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
                            <?php if ($_SESSION['user']['nama_jabatan'] == 'Helper' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Helper' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Maintenance') : ?>
                                <input type="hidden" name="status" value="2">
                            <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'Maintenance' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Production') : ?>
                                <input type="hidden" name="status" value="3">
                            <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'PPIC' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Purchasing' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'HRD' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'Maintenance') : ?>
                                <input type="hidden" name="status" value="4">
                            <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Factory Manager' && $_SESSION['user']['nama_dept'] == 'Management') : ?>
                                <input type="hidden" name="status" value="5">
                            <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Manager' && $_SESSION['user']['nama_dept'] == 'Management') : ?>
                                <input type="hidden" name="status" value="6">
                            <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'HRD') : ?>
                                <input type="hidden" name="status" value="7">
                            <?php endif; ?>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="bukti_cuti" class="form-label">Berkas Cuti Khusus</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="bukti_cuti" name="bukti_cuti" aria-describedby="inputGroupFileAddon01" required>
                                            <label class="custom-file-label" for="bukti_cuti">Format Only : Jpg / Png</label>
                                        </div>
                                    </div>
                                </div>
                                <?php if($_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Maintenance' || $_SESSION['user']['nama_jabatan'] == 'Helper' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Helper' && $_SESSION['user']['nama_dept'] == 'Warehouse') : ?>
                                    <div class="col-md-6 mb-3">
                                        <label for="approval_1" class="form-label">Leader</label>
                                        <select name="approval_1" class="select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih Leader</option>
                                            <?php foreach ($data['leader'] as $l) : ?>
                                                <option value="<?= $l['leader_id'] ?>"><?= $l['nama_leader']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php elseif($_SESSION['user']['nama_jabatan'] == 'Leader' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Production') : ?>
                                    <div class="col-md-6 mb-3">
                                        <label for="approval_2" class="form-label">Supervisor</label>
                                        <select name="approval_2" class="select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih Supervisor</option>
                                            <?php foreach ($data['supervisor'] as $l) : ?>
                                                <option value="<?= $l['supervisor_id'] ?>"><?= $l['nama_supervisor']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php elseif($_SESSION['user']['nama_jabatan'] == 'Supervisor' || $_SESSION['user']['nama_jabatan'] == 'Operator' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Warehouse' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'PPIC'  || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'Purchasing'  || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'HRD') : ?>
                                    <div class="col-md-6 mb-3">
                                        <label for="approval_3" class="form-label">Factory Manager</label>
                                        <select name="approval_3" class="select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih Factory Manager</option>
                                            <?php foreach ($data['factory_manager'] as $l) : ?>
                                                <option value="<?= $l['factory_manager_id'] ?>"><?= $l['nama_factory_manager']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php elseif($_SESSION['user']['nama_jabatan'] == 'Factory Manager') : ?>
                                    <div class="col-md-6 mb-3">
                                        <label for="approval_4" class="form-label">Manager</label>
                                        <select name="approval_4" class="select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih Manager</option>
                                            <?php foreach ($data['manager'] as $l) : ?>
                                                <option value="<?= $l['manager_id'] ?>"><?= $l['nama_manager']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php elseif($_SESSION['user']['nama_jabatan'] == 'Manager') : ?>
                                    <div class="col-md-6 mb-3">
                                        <label for="approval_5" class="form-label">HRD</label>
                                        <select name="approval_5" class="select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih HRD</option>
                                            <?php foreach ($data['hrd'] as $l) : ?>
                                                <option value="<?= $l['hrd_id'] ?>"><?= $l['nama_hrd']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
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
    <div class="modal fade" id="confirmDelete<?= $transcuti['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
    <div class="modal fade" id="buktiCuti<?= $c['id'] ?>" tabindex="-1" aria-labelledby="buktiCutiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buktiCutiModalLabel">Berkas Cuti <?= $c['karyawan'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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