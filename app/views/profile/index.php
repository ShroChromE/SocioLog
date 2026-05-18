<?php
$siswa    = $siswa    ?? ['nama' => 'Guest', 'kelas' => '-', 'foto' => null, 'status' => 'Siswa Aktif', 'sekolah' => 'SMK Kristen Immanuel'];
$totalJam = $totalJam ?? 0;
$riwayat  = $riwayat  ?? [];
?>

<!-- Page Header -->
<div class="bg-[#5C3D1E] rounded-2xl p-6 mb-5 flex items-center justify-between">
  <div class="flex items-center gap-4">
    <span class="text-3xl">
      <img src="assets/icons/profile-active.svg" alt="Profile Icon Active" class="w-12 h-12">
    </span>
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
  <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-[#F5D97E] flex-shrink-0 bg-[#7A5230] flex items-center justify-center transition-colors duration-150 cursor-pointer"
     onclick="openModal()"
     onmouseover="this.style.backgroundColor='#FFE1C5'; document.getElementById('profilePlaceholder').src='/assets/icons/edit-profile.svg'"
     onmouseout="this.style.backgroundColor='#7A5230'; document.getElementById('profilePlaceholder').src='/assets/icons/profile-placeholder.svg'">
    <?php if (!empty($siswa['foto'])): ?>
      <img src="<?= htmlspecialchars($siswa['foto']) ?>" alt="Foto Siswa" class="w-full h-full object-cover">
    <?php else: ?>
      <img id="profilePlaceholder"
          src="/assets/icons/profile-placeholder.svg"
          alt="Profile Placeholder"
          class="w-12 h-12 pointer-events-none"
          onerror="this.style.display='none'" />
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

<!-- Edit Profile Popup -->
 <div id="uploadModal" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden">
  <div class="bg-[#F9F0DC] border-2 border-[#5C3D1E] rounded-2xl p-8 w-full max-w-sm shadow-xl">
    <h2 class="text-lg font-bold text-[#5C3D1E] mb-5">Ganti Foto Profil</h2>

    <form method="POST" action="/profile/upload" enctype="multipart/form-data">
      <!-- Preview -->
      <div class="w-64 h-64 rounded-full overflow-hidden border-2 border-[#7A5230] flex items-center justify-center mx-auto mb-5">
        <img id="previewImg"
             src="<?= !empty($siswa['foto']) ? htmlspecialchars($siswa['foto']) : '/assets/icons/profile-placeholder.svg' ?>"
             class="w-full h-full object-cover" />
      </div>

      <input type="file" name="profile_picture" id="fileInput" accept="image/*" class="hidden"
             onchange="previewImage(event)" />

      <button type="button" onclick="document.getElementById('fileInput').click()"
              class="w-full py-2.5 mb-3 bg-[#5C3D1E] hover:bg-[#7A5230] text-white font-bold rounded-xl transition-colors">
        Pilih Foto
      </button>

      <button type="submit"
              class="w-full py-2.5 mb-3 bg-[#F5D97E] hover:bg-[#E0C84A] text-[#5C3D1E] font-bold rounded-xl transition-colors">
        Simpan
      </button>

      <button type="button" onclick="closeModal()"
              class="w-full py-2.5 bg-transparent border border-[#5C3D1E] text-[#5C3D1E] font-bold rounded-xl hover:bg-[#e8d5b0] transition-colors">
        Batal
      </button>
    </form>
  </div>
</div>

<script>
  function openModal()  { document.getElementById('uploadModal').classList.remove('hidden'); }
  function closeModal() { document.getElementById('uploadModal').classList.add('hidden'); }

  function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = e => document.getElementById('previewImg').src = e.target.result;
      reader.readAsDataURL(file);
    }
  }
</script>

<!-- Activity History -->
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
      <?php if (empty($riwayat)): ?>
        <tr class="bg-[#F9F0DC]">
          <td colspan="5" class="px-4 py-6 text-center text-sm text-[#5C3D1E]">Belum ada kegiatan yang diikuti.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($riwayat as $item): ?>
        <tr class="bg-[#F9F0DC] hover:bg-[#eedcb5] transition-colors duration-150">
          <td class="px-4 py-3 text-sm font-bold text-[#5C3D1E] border-t border-[#D4B896]">
            <?= htmlspecialchars($item['activity']) ?>
          </td>
          <td class="px-4 py-3 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]">
            <?= date('d M Y', strtotime($item['date'])) ?>
          </td>
          <td class="px-4 py-3 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]">
            Relawan
          </td>
          <td class="px-4 py-3 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]">
            <?= $item['jam'] ?> Jam
          </td>
          <td class="px-4 py-3 text-center border-t border-[#D4B896]">
            <?php if ($item['status'] === 'terverifikasi'): ?>
              <span class="inline-block text-xs font-bold px-3 py-0.5 rounded-full bg-[#F5D97E] text-[#5C3D1E]">Terverifikasi</span>
            <?php else: ?>
              <span class="inline-block text-xs font-bold px-3 py-0.5 rounded-full bg-[#e8d5b0] text-[#5C3D1E]">Menunggu</span>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>