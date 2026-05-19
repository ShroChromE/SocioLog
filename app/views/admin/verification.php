<?php
// Contoh data dummy — ganti dengan query database kamu
$registrations = [
    ['id' => 1, 'nama' => 'Kenzo Rivaldo', 'kelas' => 'XI TKJ 3', 'kegiatan' => 'Donor Darah'],
    ['id' => 2, 'nama' => 'Kenzo Rivaldo', 'kelas' => 'XI TKJ 3', 'kegiatan' => 'Bersih Pantai'],
    ['id' => 3, 'nama' => 'Kenzo Rivaldo', 'kelas' => 'XI TKJ 3', 'kegiatan' => 'Bakti Sosial'],
    ['id' => 4, 'nama' => 'Kenzo Rivaldo', 'kelas' => 'XI TKJ 3', 'kegiatan' => 'Penanaman Pohon'],
];

// Ambil daftar kegiatan unik untuk opsi filter
$kegiatanList = array_unique(array_column($registrations, 'kegiatan'));

// Filter aktif dari query string
$activeFilter = $_GET['kegiatan'] ?? 'Semua';

// Terapkan filter ke data
$filtered = $activeFilter === 'Semua'
    ? $registrations
    : array_filter($registrations, fn($r) => $r['kegiatan'] === $activeFilter);
?>

<!-- Header Banner -->
<div class="bg-[#5C3D1E] rounded-2xl p-6 mb-5 flex items-center gap-4">
  <span class="text-3xl text-white">✏️</span>
  <div>
    <h1 class="text-xl font-bold text-white">Pendaftaran &amp; Verifikasi Relawan</h1>
    <p class="text-sm text-white mt-0.5">Validasi kehadiran peserta kegiatan secara akurat dan real-time</p>
  </div>
</div>

<hr class="border-[#D4B896] mb-5">

<!-- Filter Dropdown -->
<div class="relative inline-block mb-5" x-data="{ open: false }">

  <button
    onclick="toggleFilterDropdown()"
    id="filter-toggle"
    class="inline-flex items-center gap-2 bg-[#5C3D1E] hover:bg-[#7A5230] active:scale-95 text-white font-bold text-sm px-5 py-2.5 rounded-xl transition-all duration-200">
    ▼ Filter
    <span class="ml-1 text-xs font-semibold bg-[#e8d5b0] text-[#5C3D1E] px-2.5 py-0.5 rounded-full">
      <?= htmlspecialchars($activeFilter, ENT_QUOTES, 'UTF-8') ?>
    </span>
  </button>

  <div
    id="filter-dropdown"
    class="hidden absolute left-0 mt-2 w-52 bg-white border border-[#D4B896] rounded-xl shadow-lg z-10 overflow-hidden">

    <?php
    $allOptions = array_merge(['Semua'], $kegiatanList);
    foreach ($allOptions as $opt):
      $isActive = $opt === $activeFilter;
      $url = '?' . http_build_query(['kegiatan' => $opt]);
    ?>
    <a href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8') ?>"
       class="flex items-center gap-2 px-4 py-2.5 text-sm transition-colors duration-150
              <?= $isActive
                  ? 'bg-[#5C3D1E] text-white font-bold'
                  : 'text-[#5C3D1E] hover:bg-[#F9F0DC]' ?>">
      <?php if ($isActive): ?>
        <span>✓</span>
      <?php else: ?>
        <span class="w-4"></span>
      <?php endif; ?>
      <?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>
    </a>
    <?php endforeach; ?>

  </div>
</div>

<!-- Table -->
<div class="rounded-xl overflow-hidden border border-[#5C3D1E] mb-5">
  <table class="w-full border-collapse">
    <thead>
      <tr class="bg-[#5C3D1E]">
        <th class="px-4 py-3 text-left text-sm font-bold text-white">Nama Siswa</th>
        <th class="px-4 py-3 text-center text-sm font-bold text-white">Kelas</th>
        <th class="px-4 py-3 text-center text-sm font-bold text-white">Kegiatan</th>
        <th class="px-4 py-3 text-center text-sm font-bold text-white">Terima</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($filtered as $reg): ?>
      <tr class="bg-[#F9F0DC] hover:bg-[#eedcb5] transition-colors duration-150">
        <td class="px-4 py-3 text-sm font-bold text-[#5C3D1E] border-t border-[#D4B896]">
          <?= htmlspecialchars($reg['nama'] ?? '', ENT_QUOTES, 'UTF-8') ?>
        </td>
        <td class="px-4 py-3 text-center text-sm font-bold text-[#5C3D1E] border-t border-[#D4B896]">
          <?= htmlspecialchars($reg['kelas'] ?? '', ENT_QUOTES, 'UTF-8') ?>
        </td>
        <td class="px-4 py-3 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]">
          <?= htmlspecialchars($reg['kegiatan'] ?? '-', ENT_QUOTES, 'UTF-8') ?>
        </td>
        <td class="px-4 py-3 text-center border-t border-[#D4B896]">
          <div class="flex items-center justify-center gap-2">
            <form method="POST" action="/pendaftaran/setuju/<?= (int) $reg['id'] ?>" class="inline">
              <button type="submit"
                class="text-xs font-bold text-[#5C3D1E] border border-[#5C3D1E] bg-transparent hover:bg-[#5C3D1E] hover:text-white px-4 py-1.5 rounded-full transition-colors duration-150">
                Setuju
              </button>
            </form>
            <form method="POST" action="/pendaftaran/tolak/<?= (int) $reg['id'] ?>" class="inline">
              <button type="submit"
                class="text-xs font-bold text-[#5C3D1E] border border-[#5C3D1E] bg-transparent hover:bg-red-600 hover:text-white hover:border-red-600 px-4 py-1.5 rounded-full transition-colors duration-150">
                Tolak
              </button>
            </form>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>

      <?php if (empty($filtered)): ?>
      <tr class="bg-[#F9F0DC]">
        <td colspan="4" class="px-4 py-6 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]">
          Tidak ada data untuk kegiatan ini.
        </td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<script>
  function toggleFilterDropdown() {
    const dropdown = document.getElementById('filter-dropdown');
    dropdown.classList.toggle('hidden');
  }

  document.addEventListener('click', function (e) {
    const toggle = document.getElementById('filter-toggle');
    const dropdown = document.getElementById('filter-dropdown');
    if (!toggle.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.classList.add('hidden');
    }
  });
</script>