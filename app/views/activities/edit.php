<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan</title>
</head>
<body class="bg-[#e6ddbd] font-sans">

<div class="max-w-xl mx-auto mt-10">
    
    <!-- Judul -->
    <h2 class="text-black text-center font-bold mb-2">Edit Kegiatan Anda</h2>

    <!-- Form -->
    <form method="post" class="bg-[#f4d96b] rounded-xl overflow-hidden shadow-md">

        <!-- Nama -->
        <div class="flex border-b border-black">
            <div class="w-32 bg-[#7a5a3a] text-white font-bold p-3">
                Nama
            </div>
            <div class="flex-1 p-2">
                <input type="text" name="nama"
                    class="w-full p-2 rounded-md border border-black outline-none text-black">
            </div>
        </div>

        <!-- Tanggal -->
        <div class="flex border-b border-black">
            <div class="w-32 bg-[#7a5a3a] text-white font-bold p-3">
                Tanggal
            </div>
            <div class="flex-1 p-2">
                <input type="date" name="tanggal"
                    class="w-full p-2 rounded-md border border-black outline-none text-black">
            </div>
        </div>

        <!-- Kuota -->
        <div class="flex border-b border-black">
            <div class="w-32 bg-[#7a5a3a] text-white font-bold p-3">
                Kuota
            </div>
            <div class="flex-1 p-2">
                <input type="number" name="kuota"
                    class="w-full p-2 rounded-md border border-black outline-none text-black">
            </div>
        </div>

        <!-- Status -->
        <div class="flex">
            <div class="w-32 bg-[#7a5a3a] text-white font-bold p-3">
                Status
            </div>
            <div class="flex-1 p-2">
                <input type="text" name="status"
                    class="w-full p-2 rounded-md border border-black outline-none text-black">
            </div>
        </div>

    </form>

    <!-- Tombol -->
    <div class="mt-4 flex gap-3">
        <button type="submit" form=""
            class="px-6 py-2 rounded-lg bg-[#f4d96b] border border-black font-semibold">
            Selesai
        </button>
        <button type="reset"
            class="px-6 py-2 rounded-lg bg-[#7a5a3a] text-white font-semibold">
            Batal
        </button>
    </div>

    <!-- Output PHP -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<div class='mt-5 p-3 bg-white rounded shadow'>";
        echo "<b>Hasil Input:</b><br>";
        echo "Nama: " . $_POST['nama'] . "<br>";
        echo "Tanggal: " . $_POST['tanggal'] . "<br>";
        echo "Kuota: " . $_POST['kuota'] . "<br>";
        echo "Status: " . $_POST['status'];
        echo "</div>";
    }
    ?>

</div>
</html>