<?php
spl_autoload_register(function ($namaClass) {
    require_once "class/class." . $namaClass . ".php";
});

session_start();

require_once 'header.php';

$page = isset($_GET['p']) ? $_GET['p'] : 'home';

switch ($page) {
    case 'home':
        ?>
        <style>
            .hero-section {
                height: 100vh;
                width: 100%;
                background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('hero_bg.png');
                background-size: cover;
                background-position: center;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .hero-section h2 {
                font-size: 4.5rem;
                margin: 0;
                color: var(--text-light);
                letter-spacing: 1px;
            }

            .hero-section h3 {
                font-size: 1.2rem;
                font-family: var(--font-body);
                letter-spacing: 4px;
                margin-top: 1rem;
                font-weight: 300;
            }

            .sub-nav {
                display: flex;
                justify-content: center;
                gap: 3rem;
                padding: 1.5rem 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .sub-nav a {
                color: var(--text-light);
                text-decoration: none;
                font-size: 0.9rem;
                padding-bottom: 0.5rem;
                border-bottom: 2px solid transparent;
                transition: border-color 0.3s;
            }

            .sub-nav a:hover,
            .sub-nav a.active {
                border-color: var(--gold-accent);
            }

            .content-section {
                padding: 5rem 2rem;
                text-align: center;
                max-width: 900px;
                margin: 0 auto;
            }

            .content-section h2 {
                font-size: 2.8rem;
                margin-bottom: 2rem;
            }

            .content-section p {
                font-size: 1rem;
                line-height: 1.8;
                font-weight: 300;
                margin-bottom: 1.5rem;
            }

            .location-section {
                background-color: var(--cream-bg);
                color: var(--text-dark);
                padding: 5rem 2rem;
                text-align: center;
            }

            .location-section h2 {
                font-size: 2.5rem;
                margin-bottom: 1.5rem;
                color: var(--text-dark);
            }

            .location-section p {
                max-width: 800px;
                margin: 0 auto 3rem auto;
                line-height: 1.8;
                font-weight: 300;
            }
        </style>

        <div class="hero-section">
            <h2>Esteemed Royal Dining</h2>
            <h3>PLATARAN DHARMAWANGSA</h3>
        </div>

        <div style="background-color: var(--olive-bg);">
            <div
                style="max-width: 1200px; margin: 0 auto; padding: 2rem 2rem 0 2rem; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h2 style="margin: 0; font-size: 2rem; display: flex; align-items: center; gap: 0.8rem;">
                        <img src="logo-white.png" alt="Plataran" style="height: 40px;"> Dharmawangsa
                    </h2>
                    <p style="margin: 0.5rem 0 0 0; font-weight: 300; letter-spacing: 1px;">Venue & Dining</p>
                </div>
                <a href="index.php?p=reservasi" class="btn-gold">Reservations</a>
            </div>

            <div class="sub-nav" style="max-width: 1200px; margin: 2rem auto 0 auto;">
                <a href="#" class="active">The Venue</a>
                <a href="#">Cuisine</a>
                <a href="#">Occasions</a>
                <a href="#">Special Offers</a>
                <a href="index.php?p=about">Gallery</a>
            </div>

            <div class="content-section">
                <h2>Esteemed Royal Dining</h2>
                <p>Located in Jakarta's elite Kebayoran Baru neighborhood along Jalan Dharmawangsa, Plataran Dharmawangsa offers
                    authentic Indonesian cuisine in a setting inspired by Javanese royalty. The restaurant, frequently awarded
                    as Jakarta's 'Best Indonesian Restaurant' by Indonesia Tatler, is a popular choice among high society and
                    expatriates.</p>
                <p>Designed as a traditional Javanese royal family compound, it features a 150-year-old heritage Joglo house,
                    Javanese pavilions, a 50-year-old prayer house, and a glass-roofed conservatory overlooking a classic tempo
                    doeloe garden.</p>
                <p>With seating for up to 200, Plataran Dharmawangsa provides an elegant backdrop for private events, weddings,
                    and corporate functions, with Indonesian interiors and semi-al fresco options surrounded by lush greenery.
                    Amenities include wedding and meeting spaces, exotic table settings, WiFi, and cultural performances.</p>
            </div>
        </div>

        <div class="location-section">
            <h2>Location</h2>
            <p>Located in the prestigious Kebayoran Baru area along Jalan Dharmawangsa, Plataran Dharmawangsa is set within one
                of Jakarta's most elite residential neighborhoods, home to The Dharmawangsa hotel and other upscale
                establishments.</p>
            <div style="max-width: 1000px; margin: 0 auto; display: flex; text-align: left; gap: 2rem; align-items: stretch;">
                <div style="flex: 1;">
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.8rem;">
                        <img src="logo-brown.png" alt="Plataran" style="height: 30px;"> Dharmawangsa
                    </h3>
                    <p style="margin: 0; font-size: 0.9rem;">Jl. Dharmawangsa Raya No. 6, Kebayoran Baru Jakarta<br>Selatan
                        12160</p>
                </div>
                <div style="flex: 2; background-color: #ccc; min-height: 250px; border-radius: 4px;">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.071191831818!2d106.7972825757715!3d-6.254341993734005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f16e45d55e39%3A0xc3f8373b320d3a77!2sPlataran%20Dharmawangsa!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <?php
        break;

    case 'reservasi':
        ?>
        <div class="page-content-wrapper" style="background-color: var(--olive-bg); padding-bottom: 5rem;">
            <div
                style="max-width: 700px; margin: 0 auto; background-color: var(--cream-bg); padding: 4rem; color: var(--text-dark); box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                <div style="text-align: center; margin-bottom: 1.5rem;">
                    <img src="logo-brown.png" alt="Plataran Logo" style="height: 80px;">
                </div>
                <h2 style="text-align: center; margin-bottom: 1rem; font-size: 2.5rem; color: var(--text-dark);">Reservasi Meja
                </h2>
                <p style="text-align: center; margin-bottom: 3rem; font-weight: 300;">Silakan rencanakan kedatangan Anda dengan
                    mengisi formulir di bawah ini.</p>
                <?php require_once 'pages/form_reservasi.php'; ?>
            </div>
        </div>
        <?php
        break;

    case 'proses':
        ?>
        <div class="page-content-wrapper" style="background-color: var(--olive-bg); padding-bottom: 5rem;">
            <div
                style="max-width: 800px; margin: 0 auto; background-color: var(--cream-bg); padding: 4rem; color: var(--text-dark); box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                <div style="text-align: center; margin-bottom: 1.5rem;">
                    <img src="logo-brown.png" alt="Plataran Logo" style="height: 80px;">
                </div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    try {
                        $nama = trim($_POST['nama']);
                        $email = $_POST['email'];
                        $tanggal = $_POST['tanggal'] ?? '';
                        $meja = $_POST['meja'] ?? '';
                        $area = $_POST['area'] ?? '';

                        if (strlen($nama) < 1 || !preg_match("/^[a-zA-Z ]*$/", $nama)) {
                            throw new Exception("Nama tidak valid! Gunakan nama lengkap minimal 1 karakter.");
                        }

                        $allowedDomains = ['gmail.com', 'yahoo.com', 'outlook.com', 'uag.ac.id'];
                        $emailDomain = substr(strrchr($email, "@"), 1);

                        if (!in_array(strtolower($emailDomain), $allowedDomains)) {
                            throw new Exception("Harap gunakan email resmi (Gmail, Yahoo, atau Email Kampus).");
                        }

                        if (empty($tanggal)) {
                            throw new Exception("Tanggal reservasi harus diisi.");
                        }

                        $meja_penuh = ['Meja 7', 'Meja 1', 'Meja 4', 'Meja 2'];
                        if (in_array($meja, $meja_penuh)) {
                            throw new Exception("Mohon maaf, $meja sudah penuh dipesan untuk tanggal tersebut. Silakan pilih meja yang lain.");
                        }

                        $reservasi = new Reservasi($nama, $email, $tanggal, $meja, $area);

                        // Meyimpan Reservasi biar bisa dilihat admin
                        if (!isset($_SESSION['reservasi_list'])) {
                            $_SESSION['reservasi_list'] = [];
                        }
                        $_SESSION['reservasi_list'][] = $reservasi;

                        echo '<h2 style="text-align:center; font-size: 2.2rem; color:var(--text-dark);">Detail Reservasi Anda</h2>';
                        echo '<div style="margin-top: 2rem; padding: 2rem; border: 1px dashed var(--gold-accent); background-color: #fff;">';
                        echo '<p style="color: var(--gold-accent); font-size: 1.2rem; margin-top: 0; text-align:center;"><strong>Terima kasih, reservasi berhasil dibuat!</strong></p>';
                        echo '<pre style="font-family: var(--font-body); font-size: 1.05rem; white-space: pre-wrap; line-height: 1.8;">';
                        echo $reservasi;
                        echo '</pre>';
                        echo '</div>';
                        echo '<div style="text-align:center; margin-top:3rem;"><a href="index.php?p=home" class="btn-gold" style="text-decoration: none;">&larr; Kembali ke Beranda</a></div>';

                    } catch (Exception $e) {
                        echo '<h2 style="text-align:center; font-size: 2.2rem; color: #d9534f;">Reservasi Gagal</h2>';
                        echo '<div style="margin-top: 2rem; padding: 1.5rem; border: 1px solid #d9534f; background-color: rgba(217, 83, 79, 0.1);">';
                        echo '<p style="color: #d9534f; margin: 0; font-size: 1.1rem; text-align:center;"><strong>Error:</strong> ' . $e->getMessage() . '</p>';
                        echo '</div>';
                        echo '<div style="text-align:center; margin-top:3rem;"><a href="javascript:history.back()" class="btn-gold" style="text-decoration: none;">&larr; Kembali Ubah Data</a></div>';
                    }
                } else {
                    echo '<h2 style="text-align:center; font-size: 2.2rem; color: #d9534f;">Akses Ditolak</h2>';
                    echo '<p style="text-align:center;">Harap isi formulir reservasi terlebih dahulu.</p>';
                    echo '<div style="text-align:center; margin-top:3rem;"><a href="index.php?p=reservasi" class="btn-gold" style="text-decoration: none;">Ke Halaman Reservasi</a></div>';
                }
                ?>
            </div>
        </div>
        <?php
        break;
    case 'contact':
        ?>
        <div class="page-content-wrapper"
            style="background-color: var(--cream-bg); color: var(--text-dark); padding-bottom: 5rem;">
            <div style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
                <h2
                    style="text-align: center; font-size: 3rem; margin-bottom: 4rem; font-family: var(--font-heading); font-weight: 400;">
                    Destination Information</h2>

                <div style="display: flex; gap: 3rem; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 300px;">
                        <h3
                            style="font-size: 1.8rem; margin-bottom: 1.5rem; font-family: var(--font-heading); font-weight: 400;">
                            Select a Destination</h3>

                        <div
                            style="border: 1px solid rgba(0,0,0,0.2); padding: 1rem; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center; cursor: pointer;">
                            <span
                                style="color: var(--gold-accent); font-family: var(--font-heading); font-size: 1.2rem; display: flex; align-items: center; gap: 0.5rem;">
                                <img src="logo-brown.png" alt="Plataran" style="height: 24px;"> Head Office</span>
                            <span style="color: rgba(0,0,0,0.5);">&#x2304;</span>
                        </div>

                        <div style="border: 1px solid rgba(0,0,0,0.2); padding: 2rem;">
                            <h4
                                style="font-family: var(--font-heading); font-size: 1.5rem; margin-top: 0; margin-bottom: 1rem; font-weight: 400; display: flex; align-items: center; gap: 0.8rem;">
                                <img src="logo-brown.png" alt="Plataran" style="height: 30px;"> Head Office
                            </h4>
                            <p
                                style="font-size: 0.95rem; line-height: 1.6; margin-bottom: 2rem; font-weight: 300; font-family: var(--font-body);">
                                Jl. Brawijaya Raya No.4 Kebayoran Baru, Jakarta Selatan, DKI Jakarta<br>
                                12160, Indonesia
                            </p>

                            <h5
                                style="font-size: 1rem; margin-bottom: 0.5rem; font-weight: 500; font-family: var(--font-body);">
                                General Inquiries</h5>
                            <p
                                style="font-size: 0.9rem; line-height: 1.8; margin-top: 0; font-weight: 300; font-family: var(--font-body);">
                                E. info.desk@plataran.com<br>
                                T. +6221 1722 1740<br>
                                WA. +62 811 1390 0483<br>
                                WA. +62 811 1053 9486 (Test Message Only)
                            </p>

                            <div
                                style="margin-top: 2rem; display: flex; flex-direction: column; gap: 0.8rem; font-size: 0.9rem; font-weight: 300; font-family: var(--font-body);">
                                <div style="display: flex; align-items: center; gap: 0.8rem;">
                                    <span style="display: inline-block; width: 20px; text-align: center;">&#128247;</span>
                                    Instagram
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.8rem;">
                                    <span style="display: inline-block; width: 20px; text-align: center;">&#128101;</span>
                                    Facebook
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.8rem;">
                                    <span style="display: inline-block; width: 20px; text-align: center;">&#9654;</span> Youtube
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.8rem;">
                                    <span
                                        style="display: inline-block; width: 20px; text-align: center; font-weight: bold;">X</span>
                                    X
                                </div>
                                <div style="display: flex; align-items: center; gap: 0.8rem;">
                                    <span
                                        style="display: inline-block; width: 20px; text-align: center; font-weight: bold;">in</span>
                                    LinkedIn
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="flex: 1.5; min-width: 300px; min-height: 500px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.179374092288!2d106.80205567577138!3d-6.253272993734994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f17094baeb8f%3A0xc0fb1dfb25d19a4!2sPlataran%20Indonesia!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <?php
        break;

    case 'about':
        ?>
        <div class="page-content-wrapper"
            style="background-color: var(--cream-bg); color: var(--text-dark); padding-bottom: 5rem;">
            <div style="max-width: 900px; margin: 0 auto; text-align: center; padding: 2rem;">
                <div style="text-align: center; margin-bottom: 2rem;">
                    <img src="logo-brown.png" alt="Plataran Logo" style="height: 100px;">
                </div>
                <h2 style="font-size: 3rem; margin-bottom: 2rem; color: var(--text-dark);">Tentang Kami</h2>
                <p style="font-size: 1.1rem; line-height: 2; font-weight: 300;">Plataran didirikan untuk memberikan penghormatan
                    terhadap kekayaan budaya dan menyajikannya dalam balutan kemewahan yang klasik. Kami menyajikan perpaduan
                    harmoni antara cita rasa nusantara dan pelayanan bintang lima.</p>
                <div style="margin-top: 4rem;">
                    <img src="hero_bg.png" style="width: 100%; border-radius: 4px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);"
                        alt="Plataran Interior">
                </div>
            </div>
        </div>
        <?php
        break;

    case 'admin':
        // input password admin
        $login_error = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admin_password'])) {
            if ($_POST['admin_password'] === 'plataranid') {
                $_SESSION['admin_logged_in'] = true;
            } else {
                $login_error = "Password salah!";
            }
        }

        // logout button
        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            unset($_SESSION['admin_logged_in']);
            header("Location: index.php?p=admin");
            exit;
        }

        echo '<div class="page-content-wrapper" style="background-color: var(--cream-bg); color: var(--text-dark); padding: 5rem 2rem;">';
        echo '<div style="max-width: 900px; margin: 0 auto;">';

        // cek apa udh login apa belom
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            // menampilkan form login
            echo '<div style="max-width: 400px; margin: 10rem auto 0 auto; background-color: #fff; padding: 3rem; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center;">';
            echo '<h2 style="font-size: 2rem; color: var(--text-dark); margin-top: 0; margin-bottom: 1.5rem;">Admin Login</h2>';
            if (!empty($login_error)) {
                echo '<p style="color: #d9534f; background-color: rgba(217,83,79,0.1); padding: 0.8rem; border-radius: 4px; margin-bottom: 1.5rem;">' . $login_error . '</p>';
            }
            echo '<form method="POST" action="index.php?p=admin">';
            echo '<input type="password" name="admin_password" placeholder="Masukkan Password (plataranid)" required style="width: 100%; padding: 1rem; margin-bottom: 1.5rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-family: var(--font-body); font-size: 1rem;">';
            echo '<button type="submit" class="btn-gold" style="width: 100%; border-radius: 4px; font-size: 1.1rem; padding: 1rem;">Masuk Dashboard</button>';
            echo '</form>';
            echo '</div>';
        } else {
            // Tampilkan dashboard
            echo '<div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10rem; margin-bottom: 1.5rem;">';
            echo '<h2 style="font-size: 2.5rem; margin: 0; color: var(--text-dark);">Admin View</h2>';
            echo '<a href="index.php?p=admin&action=logout" style="color: #d9534f; text-decoration: none; border: 1px solid #d9534f; padding: 0.5rem 1rem; border-radius: 4px; transition: 0.3s;">Logout</a>';
            echo '</div>';
            echo '<p style="font-size: 1.1rem; line-height: 2; font-weight: 300;">Daftar meja yang saat ini terisi di Plataran Dharmawangsa:</p>';
            echo '<div style="margin-top: 2rem; padding: 2rem; border: 1px solid rgba(0,0,0,0.1); background-color: #fff;">';

            if (isset($_SESSION['reservasi_list']) && count($_SESSION['reservasi_list']) > 0) {
                foreach ($_SESSION['reservasi_list'] as $index => $res) {
                    echo '<div style="border-bottom: 1px solid #eee; padding-bottom: 1rem; margin-bottom: 1rem;">';
                    echo '<p style="margin:0 0 0.5rem 0; font-weight:bold; color:var(--gold-accent);">Reservasi #' . ($index + 1) . '</p>';
                    echo '<pre style="font-family: var(--font-body); font-size: 1rem; white-space: pre-wrap; line-height: 1.5; margin: 0;">';
                    echo $res;
                    echo '</pre>';
                    echo '</div>';
                }
            } else {
                echo '<p style="font-style: italic; color: #666;">-- Belum ada data reservasi --</p>';
            }

            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
        break;

    default:
        ?>
        <div class="page-content-wrapper" style="text-align:center; padding: 5rem 2rem;">
            <h2>Halaman Tidak Ditemukan</h2>
            <p>Maaf, halaman yang Anda cari tidak tersedia. Silakan kembali ke menu navigasi di atas.</p>
        </div>
        <?php
        break;
}
require_once 'footer.php';
?>

<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] == 'employee') {
        echo '<script>window.location="dashboardemployee.php";</script>';
        exit;
    } elseif ($_SESSION["role"] == 'manager') {
        echo '<script>window.location="dashboardmanager.php";</script>';
        exit;
    } elseif ($_SESSION["role"] == 'admin') {
        echo '<script>window.location="dashboardadmin.php";</script>';
        exit;
    }
}

spl_autoload_register(function ($namaClass) {
    require_once "class/class." . $namaClass . ".php";
});

// jika ada file koneksi
require_once "class/class.Connection.php";