<?php

$tipe_file   = $_FILES['fileToUpload']['type'];
$lokasi_file = $_FILES['fileToUpload']['tmp_name'];
$nama_file   = $_FILES['fileToUpload']['name'];
$ukuran_file = $_FILES['fileToUpload']['size'];

$folder = "../upload/";

if (
    $tipe_file != "image/gif" &&
    $tipe_file != "image/jpeg" &&
    $tipe_file != "image/png"
) {

    echo "<script>alert('Hanya boleh meng-upload file gambar!');</script>";
    echo "<script>window.location='upload.php';</script>";

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