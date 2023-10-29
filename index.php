<?php
include 'koneksi.php';
session_start();

// Cek jika session 'nim' ada
if (!isset($_SESSION['nim'])) {
    header("Location: login.php?pesan=belum_login");
    exit;
}

// PDO (PHP Data Object) initialization 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akar-kuadrat";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$nim = $_SESSION['nim'];
$is_found = false;
$dataPerhalaman = [];
$n = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cek jika 'nilai' ada dalam $_POST
    $n = isset($_POST['nilai']) ? $_POST['nilai'] : null;

    for ($i = 1; $i <= $n; $i++) {
        if ($i * $i === $n) {
            $sql = "INSERT INTO squareroot(nim, input_number, result) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nim, $n, $i]);
            $is_found = true;
            break;
        }
    }

    if (!$is_found) {
        $sql = "INSERT INTO squareroot(nim, input_number, result) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nim, $n, 0]);
    }
}
// menampilkan hasil dalam format JSON
// header('Content-type: application/json');
// echo json_encode(['success' => true]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Akar Kuadrat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function hanyaAngka() {
            var angka = event.which;
            if (angka < 48 || angka > 57) {
                return false;
            }
            return true;
        }

        function hitungAkar() {
            // Mengambil nilai dari input
            const nilai = document.getElementById('nilai').value;
            // Melakukan permintaan ke API
            fetch(`http://hi-kode.com/index.php?nilai=${nilai}`)
                .then(response => response.json())
                .then(data => console.log(data));
        }

        function hitungSql() {
            // Dapatkan angka dari input
            const nilai = document.getElementById('nilai').value;
            // Buat request ke API PHP
            // Perhatikan Anda harus mengganti URL dengan URL API yang benar
            fetch(`http://hi-kode.com/index.php?nilai=${nilai}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Tangani data yang diterima dari API di sini
                })
                .catch(error => console.error('Error:', error));
        }
        document.querySelector('#hitungSqlButton').addEventListener('click', hitungSql);
    </script>
</head>

<body>
    <!-- header -->
    <?php include('header.php') ?>
    <!-- batas header -->
    <!-- tailwind -->
    <section class="dark:bg-gray-900 h-screen">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Kalkulator Akar Kuadrat </h1>
            <!-- form -->
            <form>
                <div class="mb-6">
                    <label for="nilai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan
                        Nilai:</label>
                    <input type="number" id="nilai" name="nilai" onkeypress="return hanyaAngka(event)" placeholder="Hanya Masukan Angka" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="hitungAkar()">Hitung Akar Kuadrat</button>
                <button type="submit" class="mb-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="hitungSql()">Hitung PL</button>
            </form>
            <!-- end form -->

            <!-- hasil -->
            <label for="hasil" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasil</label>
            <label for="hasil" class="block mb-10 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">Tampilkan
                nilai hasil</label>
            <!-- end hasil -->

            <!-- tables -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-50">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Input Number
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                Result
                                <!-- ini gatau apa -->
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Input Date
                            </th>
                        </tr>
                    </thead>
                    <?php
                    // ambil data berdasarkan session yang login
                    $nim = $_SESSION['nim'];
                    $result = mysqli_query($connect, "SELECT * FROM squareroot WHERE nim='$nim'");
                    $query = "SELECT id,input_number,result,created_at FROM squareroot WHERE nim ='$nim'";
                    // Pagination
                    $limitData = 5;
                    $getTotalData = $pdo->prepare("SELECT * FROM squareroot WHERE nim=?");
                    $getTotalData->execute([$nim]);
                    $totalData = $getTotalData->rowCount();
                    $jumlahPagination = ceil($totalData / $limitData);
                    $page = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
                    $dataAwal = ($page * $jumlahPagination) - $jumlahPagination;
                    $dataPerhalamanStatement = $pdo->prepare("SELECT * FROM squareroot WHERE nim=? LIMIT ?,?");
                    $dataPerhalamanStatement->bindParam(1, $nim, PDO::PARAM_STR);
                    $dataPerhalamanStatement->bindParam(2, $dataAwal, PDO::PARAM_INT);
                    $dataPerhalamanStatement->bindParam(3, $limitData, PDO::PARAM_INT);
                    $dataPerhalamanStatement->execute();
                    $dataPerhalaman = $dataPerhalamanStatement->fetchAll();
                    // tampilkan data dari tabel user
                    $user = mysqli_query($connect, $query);
                    $row = mysqli_fetch_array($user);
                    ?>
                    <tbody>
                        <?php foreach ($dataPerhalaman as $row) : ?>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    <?= $row['id'] ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?= $row['input_number'] ?>
                                </td>
                                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                    <?= $row['result'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $row['created_at'] ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- Paginasi -->
                <nav aria-label="Page navigation example">
                    <ul class="list-style-none flex">
                        <?php if ($page > 1) : ?>
                            <li>
                                <a class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white" href="?halaman=<?= $page - 1 ?>">Previous</a>
                            </li>
                        <?php endif ?>
                        <?php for ($i = 1; $i <= $jumlahPagination; $i++) : ?>
                            <?php if ($page == $i) : ?>
                                <li>
                                    <a class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-blue-700 dark:hover:text-white" href="?halaman=<?php echo $i ?>"> <?php echo $i ?> </a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white" href="?halaman=<?php echo $i ?>"> <?php echo $i ?> </a>
                                </li>
                            <?php endif ?>
                        <?php endfor; ?>
                        <?php if ($page < $jumlahPagination) : ?>
                            <li>
                                <a class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white" href="?halaman=<?= $page + 1 ?>">Next</a>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>
            <!-- end tables -->
        </div>
    </section>
</body>

</html>