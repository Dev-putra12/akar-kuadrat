<?php
include 'koneksi.php';
?>
<header>
    <div class="flex flex-wrap place-items-center">
        <section class="relative mx-auto">
            <!-- navbar -->
            <nav class="flex justify-between bg-gray-900 text-white w-screen">
                <div class="px-2 xl:px-5 py-6 flex w-full items-center">
                    <a class="text-3xl font-bold font-heading" href="#">
                        <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                        Logo Here.
                    </a>
                    <!-- Nav Links -->
                    <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-5">
                    </ul>
                    <?php
                    // ambil data berdasarkan session yang login
                    $nim = $_SESSION['nim'];
                    // dapatkan info user berdasarkan NIM
                    $query = "SELECT * FROM user WHERE nim ='$nim'";
                    // tampilkan data dari tabel user
                    $user = mysqli_query($connect, $query);
                    $row = mysqli_fetch_array($user)
                    ?>
                    <!-- Header Icons -->
                    <div class="hidden xl:flex items-center space-x-5 items-center">
                        <ul class="hidden md:flex px-4 mx-1 font-semibold font-heading space-x-12">
                            <li><a class="hover:text-gray-200" href="#">Selamat datang, <?= $row['nama'] ?></a></li>
                            <li><a class="hover:text-gray-200" href="logout_user.php">Log-Out</a></li>
                            <!-- Sign In / Register      -->
                        </ul>
                    </div>
                </div>
                <!-- Responsive navbar -->
                <a class="xl:hidden flex mr-6 items-center" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <span class="flex absolute -mt-5 ml-4">
                        <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                        </span>
                    </span>
                </a>
            </nav>
        </section>
    </div>
</header>