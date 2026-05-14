<?php
// manggil Header
require_once 'header.php';

$page = isset($_GET['p']) ? $_GET['p'] : 'home';
echo '<div class="content-box">';

switch ($page) {
    case 'home':
        echo '<h2>Selamat Datang di Plataran</h2>';
        echo '<p>Nikmati pengalaman bersantap yang elegan dan tak terlupakan dengan nuansa klasik yang memanjakan indera Anda. Kami menyajikan perpaduan harmoni antara cita rasa nusantara dan pelayanan bintang lima.</p>';
        break;

    case 'reservasi':
        echo '<h2>Reservasi Meja</h2>';
        echo '<p>Silakan rencanakan kedatangan Anda dengan mengisi formulir di bawah ini.</p>';
        require_once 'form_reservasi.php';
        break;

    case 'proses':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once 'class.Reservasi.php';

            try {
                // mengambil data dari form
                $nama = trim($_POST['nama']);
                $email = $_POST['email'];
                $tanggal = $_POST['tanggal'] ?? '';
                $meja = $_POST['meja'] ?? '';
                $area = $_POST['area'] ?? '';

                // Validasi Nama
                if (strlen($nama) < 1 || !preg_match("/^[a-zA-Z ]*$/", $nama)) {
                    throw new Exception("Nama tidak valid! Gunakan nama lengkap minimal 1 karakter.");
                }

                // Validasi Domain Email
                $allowedDomains = ['gmail.com', 'yahoo.com', 'outlook.com', 'uag.ac.id'];
                $emailDomain = substr(strrchr($email, "@"), 1);

                if (!in_array(strtolower($emailDomain), $allowedDomains)) {
                    throw new Exception("Harap gunakan email resmi (Gmail, Yahoo, atau Email Kampus).");
                }

                // Validasi data
                if (empty($tanggal)) {
                    throw new Exception("Tanggal reservasi harus diisi.");
                }

                if ($meja === 'Meja 7, Meja 2, Meja 3, Meja 5') {
                    throw new Exception("Mohon maaf, $meja sudah penuh dipesan untuk tanggal tersebut. Silakan pilih meja yang lain.");
                }

                $reservasi = new Reservasi($nama, $email, $tanggal, $meja, $area);

                echo '<h2>Detail Reservasi Anda</h2>';
                echo '<div style="margin-top: 2rem; padding: 2rem; border: 1px dashed var(--accent-color); border-radius: 4px;">';
                echo '<p style="color: var(--accent-color); font-size: 1.2rem; margin-top: 0;"><strong>Terima kasih, reservasi berhasil dibuat!</strong></p>';
                
                echo '<pre style="font-family: \'Lora\', serif; font-size: 1.05rem; white-space: pre-wrap;">' . $reservasi . '</pre>';
                echo '</div>';
                echo '<br><br><a href="index.php?p=home" style="color: var(--accent-color); text-decoration: none; border-bottom: 1px solid var(--accent-color);">&larr; Kembali ke Beranda</a>';

            } catch (Exception $e) {
                echo '<h2>Reservasi Gagal</h2>';
                echo '<div style="margin-top: 2rem; padding: 1.5rem; border: 1px solid #d9534f; background-color: rgba(217, 83, 79, 0.1); border-radius: 4px;">';
                echo '<p style="color: #d9534f; margin: 0; font-size: 1.1rem;"><strong>Error:</strong> ' . $e->getMessage() . '</p>';
                echo '</div>';
                echo '<br><br><a href="javascript:history.back()" style="color: var(--accent-color); text-decoration: none; border-bottom: 1px solid var(--accent-color);">&larr; Kembali Ubah Data</a>';
            }
        } else {
            echo '<h2>Akses Ditolak</h2>';
            echo '<p>Harap isi formulir reservasi terlebih dahulu.</p>';
            echo '<br><a href="index.php?p=reservasi" style="color: var(--accent-color); text-decoration: none; border-bottom: 1px solid var(--accent-color);">Ke Halaman Reservasi</a>';
        }
        break;

    case 'about':
        echo '<h2>Tentang Kami</h2>';
        echo '<p>Plataran didirikan untuk memberikan penghormatan terhadap kekayaan budaya dan menyajikannya dalam balutan kemewahan yang klasik. Desain Dark Academia ini mencerminkan keabadian ilmu pengetahuan dan seni kuliner yang kami jaga.</p>';
        break;

    default:
        echo '<h2>Halaman Tidak Ditemukan</h2>';
        echo '<p>Maaf, halaman yang Anda cari tidak tersedia. Silakan kembali ke menu navigasi di atas.</p>';
        break;
}

echo '</div>';

// Manggil Footer
require_once 'footer.php';
?>
