<?php
// Ambil data POST dari permintaan AJAX
$nilai = $_POST['nilai'];
$servername = "localhost";
$username = "hiko3370_root";
$password = "Blackcnz1@";
$dbname = "hiko3370_akar_kuadrat";
// Periksa apakah permintaan adalah metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Periksa apakah parameter 'nilai' telah diterima
    if (isset($_POST['nilai'])) {
        // Dapatkan nilai yang diterima
        $nilai = $_POST['nilai'];

        // Lakukan validasi atau tindakan lain yang diperlukan pada nilai

        // Lakukan koneksi ke database dan panggil stored procedure calculateSquareRoot dengan menggunakan data yang diterima
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Koneksi database gagal: " . $conn->connect_error);
        }

        // Panggil stored procedure calculateSquareRoot dengan menggunakan nilai yang diterima
        $sql = "CALL calculateSquareRoot($nilai)";
        $result = $conn->query($sql);

        // Cek apakah ada hasil dan ambil hasilnya
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $squareRoot = $row['result'];
        } else {
            $squareRoot = null;
        }

        $conn->close();

        // Lakukan sesuatu dengan hasil perhitungan akar kuadrat

        // Misalnya, mengembalikan hasil perhitungan sebagai respons
        echo $squareRoot;
        exit;
    }
}
