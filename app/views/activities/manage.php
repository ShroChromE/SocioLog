<!-- Page Header -->
<div class="bg-[#5C3D1E] rounded-2xl p-6 mb-5 flex items-center gap-4">
  <span class="text-3xl">🕐</span>
  <div>
    <h1 class="text-xl font-bold text-white">Kelola Kegiatan Sosial</h1>
    <p class="text-sm text-white mt-0.5">Buatlah dan atur kegiatan sosial yang sesuai dengan minat anda</p>
  </div>
</div>

<hr class="border-[#D4B896] mb-5">

<!-- Toolbar -->
<div class="mb-5">
  <a href="/kegiatan/buat"
    class="inline-flex items-center gap-2 bg-[#5C3D1E] hover:bg-[#7A5230] active:scale-95 text-white font-bold text-sm px-5 py-2.5 rounded-xl transition-all duration-200">
    ➕ Buat
  </a>
</div>

<!-- Table -->
<div class="rounded-xl overflow-hidden border border-[#5C3D1E] mb-5">
  <table class="w-full border-collapse">
    <thead>
      <tr class="bg-[#5C3D1E]">
        <th class="px-4 py-3 text-left text-sm font-bold text-white">Nama</th>
        <th class="px-4 py-3 text-center text-sm font-bold text-white">Tanggal</th>
        <th class="px-4 py-3 text-center text-sm font-bold text-white">Kuota</th>
        <th class="px-4 py-3 text-center text-sm font-bold text-white">Status</th>
        <th class="px-4 py-3 text-center text-sm font-bold text-white">Aksi</th>
      </tr>
    </thead>
    <>

      <!-- Row 1 -->
      <?php foreach ($activities as $activity): ?>
      <tr class="bg-[#F9F0DC] hover:bg-[#eedcb5] transition-colors duration-150">
        <td class="px-4 py-3 text-sm font-bold text-[#5C3D1E] border-t border-[#D4B896]"><?= ($activity['activity'])?></td>
        <td class="px-4 py-3 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]"><?= ($activity['date'])?></td>
        <td class="px-4 py-3 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]"><?= ($activity['quota'])?></td>
        <td class="px-4 py-3 text-center border-t border-[#D4B896]">
          <span class="inline-block text-xs font-bold px-3 py-0.5 rounded-full bg-[#e8d5b0] text-[#5C3D1E]">Belum</span>
        </td>
        <td class="px-4 py-3 text-center border-t border-[#D4B896]">
          <a href="/kegiatan/1/edit" class="inline-flex items-center gap-1 text-xs font-bold text-white bg-[#5C3D1E] hover:bg-[#7A5230] px-3 py-1.5 rounded-lg transition-colors">✏️ Edit</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<div class="mb-6">
  <a href="/kegiatan/buat"
    class="inline-flex items-center gap-2 bg-[#5C3D1E] hover:bg-[#7A5230] active:scale-95 text-white font-bold text-sm px-5 py-2.5 rounded-xl transition-all duration-200">
    ✏️ Edit
  </a>
</div>