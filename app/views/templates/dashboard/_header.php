<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/vendor/bootstrap-5.0.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/dashboard_style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/vendor/fontawesome-free-6.1.1/css/all.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <!-- Sweetalert2 -->
    <!-- <link rel="stylesheet" href="<?= BASEURL; ?>/vendor/sweetalert2/sweetalert2.min.css"> -->
    <!-- Sweetalert Animated CSS -->
    <!-- <link rel="stylesheet" href="<?= BASEURL; ?>/vendor/sweetalert2/animate.min.css"> -->
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/vendor/DataTables-1.11.5/datatables.min.css">
    <!-- JQuery -->
    <script src="<?= BASEURL; ?>/vendor/jQuery-3.6.0/jquery-3.6.0.js"></script>
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Icon Title -->
    <link rel="icon" href="<?= BASEURL; ?>/assets/img/navbar-brand.png">
    <title><?= $data['title']; ?></title>
</head>

<body>
    <div class="container-fluid px-5 my-3">
        <div class="row">
            <div class="col-md">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header bg-white">
                        <a href="<?= BASEURL; ?>/dashboard"><img src="<?= BASEURL; ?>/assets/img/navbar-brand2.png" alt="" class="w-75 ms-3"></a>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body bg-primary">
                        <ul class="nav flex-column px-3">
                            <?php if ($_SESSION['user']['nama_dept'] == 'HRD' || $_SESSION['user']['nama_dept'] == 'IT Support') : ?>
                                <li class="nav-item pt-5">
                                    <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/karyawan"><i class="fa-solid fa-users"></i> Karyawan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/group"><i class="fa-solid fa-people-roof"></i> Group</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>/transcuti"><i class="fa-solid fa-mug-hot"></i> Trans Cuti</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa-solid fa-keyboard"></i> Post Management</a>
                                </li>
                                <li class="nav-item">
                                    <p>
                                        <a class="nav-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa-solid fa-database"></i> Master Data
                                        </a>
                                    </p>
                                    <div class="collapse ms-3 me-3" id="collapseExample">
                                        <div class="card card-body bg-color-primary" style="border: 1px solid white; padding: 5px 5px;">
                                            <a href="<?= BASEURL; ?>/pendidikan" class="nav-link"><i class="fa-solid fa-graduation-cap"></i> Pendidikan</a>
                                            <a href="<?= BASEURL; ?>/jurusan" class="nav-link"><i class="fa-solid fa-paintbrush"></i> Jurusan</a>
                                            <a href="<?= BASEURL; ?>/dept" class="nav-link"><i class="fa-solid fa-building-flag"></i> Dept.</a>
                                            <a href="<?= BASEURL; ?>/jabatan" class="nav-link"><i class="fa-solid fa-user-tie"></i> Jabatan</a>
                                            <a href="<?= BASEURL; ?>/cuti" class="nav-link"><i class="fa-solid fa-mug-saucer"></i> Cuti</a>
                                            <a href="<?= BASEURL; ?>/user" class="nav-link"><i class="fa-brands fa-expeditedssl"></i> User Login</a>
                                        </div>
                                    </div>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>/transcuti"><i class="fa-solid fa-mug-hot"></i> Trans Cuti</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>