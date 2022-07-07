<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link" href="<?= BASEURL; ?>/transcuti" role="tab" aria-controls="CutiSaya" aria-selected="true">Cuti Saya</a>
    </li>
    <?php if ($_SESSION['user']['nama_jabatan'] == 'Leader' || $_SESSION['user']['nama_jabatan'] == 'Supervisor' && $_SESSION['user']['nama_jabatan'] == 'Manager' || $_SESSION['user']['nama_jabatan'] == 'Factory Manager' || $_SESSION['user']['nama_jabatan'] == 'Admin' && $_SESSION['user']['nama_dept'] == 'HRD') : ?>
        <li class="nav-item" role="presentation">
            <a class="nav-link" href="<?= BASEURL; ?>/transcuti/cutiKaryawan" role="tab" aria-controls="CutiKaryawan" aria-selected="false">Cuti Karyawan</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active" href="<?= BASEURL; ?>/transcuti/sisaCutiKaryawan" role="tab" aria-controls="SisaCutiKaryawan" aria-selected="false">Sisa Cuti Karyawan</a>
        </li>
    <?php endif; ?>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="CutiSaya" role="tabpanel" aria-labelledby="CutiSaya-tab">
    <div class="card font-primary table-responsive">
        <div class="card-body table-responsive">
            <!-- <?php var_dump($data)?> -->
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Sisa Cuti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($data['cuti_diambil'] as $c) : ?>
                    <tr class="text-center">
                        <td><?= $i++; ?></td>
                        <td><?= $c['nama_karyawan']; ?></td>
                        <td>
                            <!-- 12 adalah nilai statis untuk jatah cuti tahunan setiap tahunnya. Belum dapat cara untuk berikan nilai dinamis -->
                            <?php $sisa = 12 - $c['cuti_out']; ?>
                            <?= $sisa; ?>
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