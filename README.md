<h1 align="center">SocioLog</h1>

<div align="center">
   <img src=".github/images/banner/banner.png" alt="SocioLog Banner">
   <br><br>
   <a href="https://github.com/ShroChromE/SocioLog?tab=readme-ov-file#changelog">
      <img src="https://img.shields.io/badge/GitHub Version-wip--1.0.0-red">
   </a>
   <a href="https://github.com/ShroChromE/SocioLog?tab=readme-ov-file#changelog">
      <img src="https://img.shields.io/badge/Latest Release-1.0.0-green">
   </a><br>
   <a href="http://unlicense.org/">
      <img src="https://img.shields.io/badge/License-Unlicense-blue.svg">
   </a>
   <a href="https://github.com/ShroChromE/SocioLog?tab=readme-ov-file#kontributor">
      <img src="https://img.shields.io/badge/Contributor-3-yellow">
   </a>
</div>

## Table of Contents

<details>
   <summary>Tekan untuk Buka</summary>

- [Instalasi](#instalasi)
- [Penggunaan](#penggunaan)
- [Arsitektur](#arsitektur)
- [Kontributor](#kontributor)
- [Lisensi](#lisensi)
- [Changelog](#changelog)
</details>

## Instalasi

<details>
   <summary>Instalasi</summary>

### Step 1 — Download & Pindahkan File

<details>
   <summary>Step 1</summary>

1. Download repository ini (Cari tombol code warna hijau di bagian atas lalu tekan "Download ZIP").
2. Ekstrak file tersebut.
3. Pindahkan folder yang telah diekstrak ke directory `C:\laragon\www\`. Folder yang dipindahkan seharusnya dapat langsung melihat isi dari websitenya. Apabila dalam folder yang dipindahkan terdapat sebuah folder lagi, keluarkan semua isi dari websitenya keluar dari foldernya.
4. Lanjut ke Step 2.
</details>

### Step 2 — Setup Database

<details>
   <summary>Step 2</summary>

1. Buka Laragon.
2. Tekan "Start All" lalu tekan "Database".
3. Login ke phpMyAdmin menggunakan username `root` dan password kosong.
4. Buat database baru dengan nama `sociolog`.
5. Pilih database `sociolog`, lalu buka tab **Import**.
6. Import file `sociolog.sql` yang terdapat di dalam folder project.
7. Lanjut ke Step 3.
</details>

### Step 3 — Jalankan Aplikasi

<details>
   <summary>Step 3</summary>

1. Buka terminal di Laragon.
2. Ketikkan `cd (nama folder project)`. Apabila lupa nama foldernya, ketikkan `ls` terlebih dahulu.
3. Ketikkan perintah berikut lalu tekan link yang muncul sambil menekan Ctrl kiri:
```
php -S localhost:8000 -t public
```

<h3 align="center">Selesai!</h3>
</details>

</details>

## Penggunaan

SocioLog adalah sistem berbasis web yang dikembangkan untuk SMK Kristen Immanuel Pontianak. Sistem ini mampu mengelola data kegiatan sosial, mencatat pendaftaran relawan, serta menyimpan riwayat keterlibatan siswa dalam kegiatan sosial secara terstruktur dan mudah diakses.

**Fitur utama:**
- Siswa dapat mendaftar dan login sebagai relawan
- Siswa dapat melihat daftar kegiatan sosial dan mendaftar ke kegiatan yang tersedia
- Admin dapat membuat, mengedit, dan menutup kegiatan sosial
- Admin dapat menerima atau menolak pendaftaran relawan
- Riwayat keikutsertaan siswa tercatat otomatis di halaman profil beserta total jam kontribusi
- Profil siswa dapat dikustomisasi dengan foto dan kelas

## Arsitektur

<b>-- Front-end Development --</b><br>
![HTML](https://img.shields.io/badge/HTML-orange?logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-1572B6?logo=css&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-yellow?logo=javascript&logoColor=white)

<b>-- Back-end Development --</b><br>
![PHP](https://img.shields.io/badge/PHP-777bb4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white)

<b>-- UI/UX Design --</b><br>
![Figma](https://img.shields.io/badge/Figma-F24E1E?logo=figma&logoColor=white)

<b>-- Libraries --</b><br>
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-%2338B2AC.svg?logo=tailwind-css&logoColor=white)

<b>-- Development Tools --</b><br>
![Laragon](https://img.shields.io/badge/Laragon-0E83CD?style=flat&logo=laragon&logoColor=white)
![VS Code](https://img.shields.io/badge/VS%20Code-007ACC?style=flat&logo=visual-studio-code&logoColor=white)

## Kontributor

| Nama | Role |
|------|------|
| Owen Christian | Front-End & Back-End Developer |
| Kenzo Rivaldo | Front-End Developer & UI/UX Designer |
| Valentino | UI/UX Designer & Back-End Developer |

SMK Kristen Immanuel Pontianak

## Lisensi

Proyek ini menggunakan lisensi [Unlicense](http://unlicense.org/).

## Changelog

<details>
   <summary>2026</summary>

<details>
   <summary>Mei</summary>

### 24/05/2026 - 1.0.0

<details>

- Update Readme dan menambahkan database
- Memperbaiki halaman admin agar tidak dapat diakses oleh volunteer melalui URL
- Menambahkan gambar dan mengimplementasikan quota countdown kegiatan
</details>

### 23/05/2026 - 0.9.2

<details>

- Implementasi halaman edit kegiatan (back-end) oleh Valentino
- Merge halaman edit ke main
</details>

### 22/05/2026 - 0.9.1

<details>

- Implementasi section insert gambar di halaman edit dan create
- Implementasi penghapusan URL gambar
</details>

### 21/05/2026 - 0.9.0

<details>

- Implementasi back-end halaman verifikasi
- Mengizinkan kegiatan untuk di-set sebagai inactive
</details>

### 20/05/2026 - 0.8.2

<details>

- Implementasi halaman verifikasi (front-end) oleh Kenzo
</details>

### 19/05/2026 - 0.8.1

<details>

- Implementasi halaman verifikasi (front-end)
- Menambahkan responsivitas halaman login dan register
- Menambahkan logo pada halaman login dan register
</details>

### 18/05/2026 - 0.8.0

<details>

- Implementasi riwayat kegiatan, total jam kontribusi, dan upload foto profil
- Implementasi back-end halaman edit oleh Valentino
- Update layout app.php
</details>

### 15/05/2026 - 0.7.1

<details>

- Resolving merge conflict dengan main
</details>

### 14/05/2026 - 0.7.0 (wip)

<details>

- WIP back-end halaman edit oleh Valentino
</details>

### 12/05/2026 - 0.6.2

<details>

- Implementasi halaman profil dan riwayat siswa oleh Kenzo
- Menambahkan foto dan memperbaiki masalah yang ada
- Perbaikan merge conflict
</details>

### 11/05/2026 - 0.6.1

<details>

- Merge halaman profil dan riwayat siswa ke main
</details>

### 08/05/2026 - 0.6.0

<details>

- WIP desain front-end halaman edit kegiatan oleh Valentino
- Implementasi halaman login dan register oleh Owen
- Implementasi halaman manage oleh Kenzo
</details>

### 05/05/2026 - 0.5.1

<details>

- Implementasi manage page oleh Kenzo
</details>

### 03/05/2026 - 0.5.0

<details>

- Perbaikan halaman kelola kegiatan siswa
</details>

### 28/04/2026 - 0.4.1 (wip)

<details>

- WIP implementasi manage page
</details>

</details>
<br>
<details>
   <summary>April</summary>

### 28/04/2026 - 0.4.0

<details>

- Implementasi database ke halaman index dan show
- Merge implementasi database ke main
</details>

</details>
<br>
<details>
   <summary>Maret</summary>

### 22/03/2026 - 0.3.0

<details>

- Implementasi halaman detail kegiatan oleh Owen
- Implementasi halaman daftar kegiatan oleh Kenzo
</details>

### 17/03/2026 - 0.2.0

<details>

- Setup CSS Tailwind
- Re-adding node.js dan menambahkan .gitignore
- Setup MVC structure
</details>

</details>
<br>
<details>
   <summary>Januari</summary>

### 23/01/2026 - 0.0.0 ( First Commit )

<details>

- First Commit
</details>

</details>

</details>
