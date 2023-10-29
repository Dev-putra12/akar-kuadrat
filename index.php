<?php include 'koneksi.php';
session_start();
if ($_SESSION['nim'] != true) {
    header("location:login.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Akar Kuadrat</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan
                        Nilai:</label>
                    <input type="text" id="nilai" name="nilai" onkeypress="return hanyaAngka(event)" placeholder="Hanya Masukan Angka" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="hitungAkar()">Hitung Akar Kuadrat</button>
                <button type="submit" class="mb-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="hitungAkar()">Hitung PL</button>
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
                                Number
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                Square Root
                                <!-- ini gatau apa -->
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Input Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Silver
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- end tables -->
        </div>
    </section>
    <!-- form section -->
    <!-- end tailwind -->
    <!-- <form action="hasil.php" method="post">
                    <label for="nilai">Masukkan Nilai:</label>
                    <input type="text" class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600" id="nilai" name="nilai" onkeypress="return hanyaAngka(event)" placeholder="Hanya Masukan Angka">
                    <button type="button" onclick="hitungAkar()">Hitung Akar Kuadrat</button>
                </form>
                <form action="hasil.php" method="post">
                    <button type="button" onclick="hitungAkar()">Hitung PL</button>
                </form> -->
</body>

</html>