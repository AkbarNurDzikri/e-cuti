<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link" href="<?= BASEURL; ?>/transcuti" role="tab" aria-controls="CutiSaya" aria-selected="true">Cuti Saya</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active" href="<?= BASEURL; ?>/transcuti/cutiKaryawan" role="tab" aria-controls="CutiKaryawan" aria-selected="false">Cuti Karyawan</a>
    </li>
    <?php if($_SESSION['user']['nama_dept'] == 'HRD') : ?>
        <li class="nav-item" role="presentation">
            <a class="nav-link" href="<?= BASEURL; ?>/transcuti/sisaCutiKaryawan" role="tab" aria-controls="SisaCutiKaryawan" aria-selected="false">Sisa Cuti Karyawan</a>
        </li>
    <?php endif; ?>
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
                        <!-- <th>Berkas Cuti Khusus</th> -->
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
                            <!-- <td>
                                <?php if ($transcuti['bukti_cuti'] !== null) : ?>
                                    <img src="<?= BASEURL; ?>/assets/img/upload/<?= $transcuti['bukti_cuti'] ?>" alt="Berkas tidak ditemukan, hhhmm sepertinya file yang diupload tidak sesuai dengan format yang diizinkan !" class="w-50"> <br>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="badge bg-dark border-0 mt-2" data-toggle="modal" data-target="#buktiCuti<?= $transcuti['id'] ?>">
                                        <i class="fa-2x fa-solid fa-magnifying-glass"></i>
                                    </button>
                                <?php endif; ?>
                            </td> -->
                            <td>
                                <?php if ($transcuti['status'] == 8) : ?>
                                    <p class="text-primary">Permohonan disetujui <br> <?= date('d-M-Y H:i', strtotime($transcuti['created_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 1) : ?>
                                    <p class="text-primary">Adjustment by HRD <br> <?= date('d-M-Y H:i', strtotime($transcuti['created_at'])); ?></p>
                                <?php elseif ($transcuti['status'] == 2 || $transcuti['status'] == 3 || $transcuti['status'] == 4 || $transcuti['status'] == 5 || $transcuti['status'] == 6) : ?>
                                    <i class="fa-solid fa-hourglass"></i> Menunggu konfirmasi
                                <?php elseif ($transcuti['status'] == 30 || $transcuti['status'] == 40 || $transcuti['status'] == 50 || $transcuti['status'] == 60 || $transcuti['status'] == 70) : ?>
                                    <p class="text-danger"><i class="fa-solid fa-xmark"></i> Ditolak <br> <?= date('d-M-Y H:i', strtotime($transcuti['updated_at'])); ?></p>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($_SESSION['user']['nama_jabatan'] == 'Leader' && $transcuti['status'] == 2 || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $transcuti['status'] == 3 || $_SESSION['user']['nama_jabatan'] == 'Factory Manager' && $transcuti['status'] == 4 || $_SESSION['user']['nama_jabatan'] == 'Manager' && $transcuti['status'] == 5 || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'HRD' && $transcuti['status'] == 6) : ?>
                                    <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#approval<?= $transcuti['id']; ?>"><i class="fa-solid fa-pencil"></i></button>
                                <?php endif; ?>

                                <?php if ($transcuti['status'] < 7) : ?>
                                    <button class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#confirmDelete<?= $transcuti['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
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
                        <input type="hidden" name="approval_1" value="<?= $transcuti['approval_1'] ?>">
                        <input type="hidden" name="approval_2" value="<?= $transcuti['approval_2'] ?>">
                        <input type="hidden" name="approval_3" value="<?= $transcuti['approval_3'] ?>">
                        <input type="hidden" name="approval_4" value="<?= $transcuti['approval_4'] ?>">
                        <input type="hidden" name="approval_5" value="<?= $transcuti['approval_5'] ?>">
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

                            <?php if($_SESSION['user']['nama_dept'] == 'HRD' && $_SESSION['user']['nama_jabatan'] == 'Admin') : ?>
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

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <p>Approval</p>
                                </div>
                                <div class="col-md-4">
                                    <select name="status" class="select2" style="width: 100%;" required>
                                        <option value="" disabled selected>Pilih Keputusan</option>
                                        <?php if ($_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Leader' && $_SESSION['user']['nama_dept'] == 'Maintenance') : ?>
                                            <option value="3">Approve</option>
                                            <option value="30">Reject</option>
                                        <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'Production' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'QC' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_dept'] == 'Maintenance') : ?>
                                            <option value="4">Approve</option>
                                            <option value="40">Reject</option>
                                        <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Factory Manager') : ?>
                                            <option value="5">Approve</option>
                                            <option value="50">Reject</option>
                                        <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Manager') : ?>
                                            <option value="6">Approve</option>
                                            <option value="60">Reject</option>
                                        <?php elseif ($_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'HRD') : ?>
                                            <option value="7">Approve</option>
                                            <option value="70">Reject</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <?php if($_SESSION['user']['nama_jabatan'] !== 'Leader' && $_SESSION['user']['nama_jabatan'] !== 'Supervisor' && $_SESSION['user']['nama_jabatan'] !== 'Factory Manager' && $_SESSION['user']['nama_jabatan'] !== 'Manager' && $_SESSION['user']['nama_dept'] !== 'HRD') : ?>
                                    <div class="col-md-2">
                                        <p>Next Approval</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <select name="approval_1" class="select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih Leader</option>
                                            <?php foreach ($data['leader'] as $l) : ?>
                                                <option value="<?= $l['leader_id'] ?>"><?= $l['nama_leader']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php elseif($_SESSION['user']['nama_jabatan'] == 'Leader') : ?>
                                    <div class="col-md-2">
                                        <p>Next Approval</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <select name="approval_2" class="select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih Supervisor</option>
                                            <?php foreach ($data['supervisor'] as $l) : ?>
                                                <option value="<?= $l['supervisor_id'] ?>"><?= $l['nama_supervisor']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php elseif($_SESSION['user']['nama_jabatan'] == 'Supervisor') : ?>
                                    <div class="col-md-2">
                                        <p>Next Approval</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <select name="approval_3" class="select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih Factory Manager</option>
                                            <?php foreach ($data['factory_manager'] as $l) : ?>
                                                <option value="<?= $l['factory_manager_id'] ?>"><?= $l['nama_factory_manager']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php elseif($_SESSION['user']['nama_jabatan'] == 'Factory Manager') : ?>
                                    <div class="col-md-2">
                                        <p>Next Approval</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <select name="approval_4" class="select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih Manager</option>
                                            <?php foreach ($data['manager'] as $l) : ?>
                                                <option value="<?= $l['manager_id'] ?>"><?= $l['nama_manager']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php elseif($_SESSION['user']['nama_jabatan'] == 'Manager') : ?>
                                    <div class="col-md-2">
                                        <p>Next Approval</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <select name="approval_5" class="select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih HRD</option>
                                            <?php foreach ($data['hrd'] as $l) : ?>
                                                <option value="<?= $l['hrd_id'] ?>"><?= $l['nama_hrd']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
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