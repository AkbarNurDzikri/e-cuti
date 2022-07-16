<div class="row align-items-center">
    <div class="col-md mt-3">
        <?php Flasher::flash(); ?>
    </div>
</div>

<div class="card card-body font-primary">
    <div class="row">
        <div class="col-md">
            <h4>Selamat datang, <b><?= $_SESSION['user']['nama_user']; ?></b> <i class="fa-2x fa-solid fa-hands-clapping text-secondary"></i></h4>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>Total Permohonan</h4>
                        </div>

                        <div class="col-md-2 text-end">
                            <i class="fa-2x fa-solid fa-list-ol"></i>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md mx-auto py-3 text-center">
                            <h1><?= $data['totalPermohonanCuti']['COUNT(cuti_out)']; ?> Permohonan</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>Cuti Tahunan</h4>
                        </div>

                        <div class="col-md-2 text-end">
                            <i class="fa-2x fa-solid fa-calendar-minus"></i>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md mx-auto py-3 text-center">
                            <h1><?= $data['totalCutiTahunan']['COUNT(cuti_id)']; ?> Permohonan</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>Cuti Khusus</h4>
                        </div>

                        <div class="col-md-2 text-end">
                            <i class="fa-2x fa-solid fa-circle-notch"></i>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md mx-auto py-3 text-center">
                            <h1><?= $data['totalCutiKhusus']['COUNT(cuti_id)']; ?> Permohonan</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>Cuti Diterima</h4>
                        </div>

                        <div class="col-md-2 text-end">
                            <i class="fa-2x fa-solid fa-check"></i>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md mx-auto py-3 text-center">
                            <h1>Cuti Tahunan : </h1>
                            <h4><?= $data['totalCutiTahunanAcc']['COUNT(cuti_id)']; ?> Permohonan, <?= $data['totalCutiTahunanAccHari']['SUM(cuti_out)']; ?> Hari</h4>

                            <hr>

                            <h1>Cuti Khusus : </h1>
                            <h4><?= $data['totalCutiKhususAcc']['COUNT(cuti_id)']; ?> Permohonan, <?= $data['totalCutiKhususAccHari']['SUM(cuti_out)']; ?> Hari</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>Cuti On Progress</h4>
                        </div>

                        <div class="col-md-2 text-end">
                            <i class="fa-2x fa-solid fa-hourglass"></i>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md mx-auto py-3 text-center">
                            <h1>Cuti Tahunan : </h1>
                            <h4><?= $data['totalCutiTahunanOnProgress']['COUNT(cuti_id)']; ?> Permohonan, <?= $data['totalCutiTahunanOnprogressHari']['SUM(cuti_out)']; ?> Hari</h4>

                            <hr>

                            <h1>Cuti Khusus : </h1>
                            <h4><?= $data['totalCutiKhususOnProgress']['COUNT(cuti_id)']; ?> Permohonan, <?= $data['totalCutiKhususOnprogressHari']['SUM(cuti_out)']; ?> Hari</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>Cuti Ditolak</h4>
                        </div>

                        <div class="col-md-2 text-end">
                            <i class="fa-2x fa-solid fa-xmark"></i>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md mx-auto py-3 text-center">
                            <h1>Cuti Tahunan : </h1>
                            <h4><?= $data['totalCutiTahunanRejected']['COUNT(cuti_id)']; ?> Permohonan, <?= $data['totalCutiTahunanRejectedHari']['SUM(cuti_out)']; ?> Hari</h4>

                            <hr>

                            <h1>Cuti Khusus : </h1>
                            <h4><?= $data['totalCutiKhususRejected']['COUNT(cuti_id)']; ?> Permohonan, <?= $data['totalCutiKhususRejectedHari']['SUM(cuti_out)']; ?> Hari</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>