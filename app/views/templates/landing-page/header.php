<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/vendor/bootstrap-5.0.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/vendor/fontawesome-free-6.1.1/css/all.css">
    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet"> -->
    <!-- AOS Animation -->
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
    <!-- Icon Title -->
    <link rel="icon" href="<?= BASEURL; ?>/assets/img/navbar-brand.png">
    <title>HRIS Blasfolie</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-navbar fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL; ?>/home"><img src="<?= BASEURL; ?>/assets/img/navbar-brand.png" alt="navbar-brand" style="width: 50px;">
                <h4 class="font-primary d-inline">Blasfolie</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/home"><i class="fa-solid fa-house-chimney-window"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/home/kritik-saran"><i class="fa-solid fa-hands-clapping"></i> Kritik & Saran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/auth"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>