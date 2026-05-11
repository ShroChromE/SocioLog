<?php
// Data dummy — ganti dengan data dari controller/database
$siswa = $siswa ?? [
  'nama'    => 'Kenzo Rivaldo',
  'kelas'   => 'XI TKJ 3',
  'sekolah' => 'SMK Kristen Immanuel',
  'foto'    => null,
  'status'  => 'Siswa Aktif',
];

$totalJam = $totalJam ?? 22;

$riwayat = $riwayat ?? [
  ['nama_kegiatan' => 'Bakti Sosial', 'tanggal' => '12 Jan 2026', 'peran' => 'Relawan', 'jam' => 10, 'status' => 'Terverifikasi'],
  ['nama_kegiatan' => 'Donor Darah',  'tanggal' => '20 Feb 2026', 'peran' => 'Panitia', 'jam' => 8,  'status' => 'Terverifikasi'],
  ['nama_kegiatan' => 'Seminar',      'tanggal' => '5 Mar 2026',  'peran' => 'Peserta', 'jam' => 4,  'status' => 'Menunggu'],
];
?>

<!-- Page Header -->
<div class="bg-[#5C3D1E] rounded-2xl p-6 mb-5 flex items-center justify-between">
  <div class="flex items-center gap-4">
    <span class="text-3xl">👤</span>
    <div>
      <h1 class="text-xl font-bold text-white">Profil Siswa</h1>
      <p class="text-sm text-white mt-0.5">Buku Catatan Sosial Siswa</p>
    </div>
  </div>
  <span class="bg-[#F5D97E] text-[#5C3D1E] text-sm font-bold px-5 py-2 rounded-xl">
    Total Jam Sosial: <?= $totalJam ?> Jam
  </span>
</div>

<hr class="border-[#D4B896] mb-5">

<!-- Profile Card -->
<div class="bg-[#5C3D1E] rounded-2xl p-6 mb-8 flex items-center gap-6">
  <!-- Avatar -->
  <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-[#F5D97E] flex-shrink-0 bg-[#7A5230] flex items-center justify-center">
    <?php if (!empty($siswa['foto'])): ?>
      <img src="<?= htmlspecialchars($siswa['foto']) ?>" alt="Foto Siswa" class="w-full h-full object-cover">
    <?php else: ?>
      <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-[#D4B896]" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
      </svg>
    <?php endif; ?>
  </div>

  <!-- Info -->
  <div class="flex-1">
    <p class="text-lg font-bold text-[#F5D97E]"><?= htmlspecialchars($siswa['nama']) ?></p>
    <p class="text-sm text-[#D4B896] mt-1">Kelas: <?= htmlspecialchars($siswa['kelas']) ?></p>
    <p class="text-sm text-[#D4B896]"><?= htmlspecialchars($siswa['sekolah']) ?></p>
  </div>

  <!-- Status Badge -->
  <span class="bg-[#F5D97E] text-[#5C3D1E] text-xs font-bold px-4 py-1.5 rounded-full self-start">
    <?= htmlspecialchars($siswa['status']) ?>
  </span>
</div>

<!-- Riwayat Kegiatan Sosial -->
<h2 class="text-2xl font-bold text-[#5C3D1E] mb-4">Riwayat Kegiatan Sosial</h2>

<div class="rounded-xl overflow-hidden border border-[#5C3D1E] mb-5">
  <table class="w-full border-collapse">
    <thead>
      <tr class="bg-[#5C3D1E]">
        <th class="px-4 py-3 text-left text-sm font-bold text-white">Nama Kegiatan</th>
        <th class="px-4 py-3 text-center text-sm font-bold text-white">Tanggal</th>
        <th class="px-4 py-3 text-center text-sm font-bold text-white">Peran</th>
        <th class="px-4 py-3 text-center text-sm font-bold text-white">Jam Kontribusi</th>
        <th class="px-4 py-3 text-center text-sm font-bold text-white">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($riwayat as $item): ?>
      <tr class="bg-[#F9F0DC] hover:bg-[#eedcb5] transition-colors duration-150">
        <td class="px-4 py-3 text-sm font-bold text-[#5C3D1E] border-t border-[#D4B896]"><?= htmlspecialchars($item['nama_kegiatan']) ?></td>
        <td class="px-4 py-3 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]"><?= htmlspecialchars($item['tanggal']) ?></td>
        <td class="px-4 py-3 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]"><?= htmlspecialchars($item['peran']) ?></td>
        <td class="px-4 py-3 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]"><?= htmlspecialchars($item['jam']) ?> Jam</td>
        <td class="px-4 py-3 text-center border-t border-[#D4B896]">
          <?php if ($item['status'] === 'Terverifikasi'): ?>
            <span class="inline-block text-xs font-bold px-3 py-0.5 rounded-full bg-[#F5D97E] text-[#5C3D1E]">Terverifikasi</span>
          <?php else: ?>
            <span class="inline-block text-xs font-bold px-3 py-0.5 rounded-full bg-[#e8d5b0] text-[#5C3D1E]">Menunggu</span>
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>