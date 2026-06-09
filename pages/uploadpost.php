<?php
$ukuran_maks_file = 1000000; // 1MB
$tipe_file   = $_FILES['fupload']['type'];
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
$ukuran_file = $_FILES['fupload']['size'];

$folder = "./upload/";

if ($ukuran_file > $ukuran_maks_file) {
    echo "<script>alert('Ukuran file terlalu besar!');</script>";
    echo "<script>window.location='index.php?p=upload';</script>";
} else if (
    $tipe_file != "image/gif" &&
    $tipe_file != "image/jpeg" &&
    $tipe_file != "image/png"
) {

    echo "<script>alert('Hanya boleh meng-upload file gambar!');</script>";
    echo "<script>window.location='index.php?p=upload';</script>";

} else {

    $isSuccessUpload = move_uploaded_file(
        $lokasi_file,
        $folder . $nama_file
    );

    if ($isSuccessUpload) {
        echo "Nama File : <b>$nama_file</b> sukses diupload<br>";
        echo "Ukuran File : <b>$ukuran_file</b> bytes<br>";
        echo "Tipe File : <b>$tipe_file</b>";
    } else {
        echo "Upload gagal!";
    }
}
?>