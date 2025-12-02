<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab InLet - Information & Learning Technology</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/home.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/quick-stat.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/about-us.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/research-snippet.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/riset_list.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/riset_detail.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/profil.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/tim.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/fasilitas.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/kegiatan.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/detail_kegiatan.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/galeri.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/kontak.css">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        
        /* Agar link tidak ada garis bawah default */
        a { text-decoration: none; }

        /* Hero Section Background */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            /* Pastikan ada file hero-bg.jpg di folder images */
            background: url('<?= BASE_URL; ?>/assets/images/hero-bg.jpg') no-repeat center center;
            background-size: cover;
        }

        /* Overlay Putih Transparan */
        .hero-overlay {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(255, 255, 255, 0.85); z-index: 1;
        }
        
        .hero-content { position: relative; z-index: 2; }

        /* Warna Biru Inlet */
        .text-inlet { color: #1a3cb6; }
        .btn-inlet {
            background-color: #1a3cb6; color: white; border: none;
            padding: 10px 30px; font-weight: 600; border-radius: 5px; transition: 0.3s;
        }
        .btn-inlet:hover { background-color: #142e8c; color: white; }
    </style>
</head>
<body>