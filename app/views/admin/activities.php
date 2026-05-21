<div class="bg-[#5C3D1E] rounded-2xl p-6 mb-5 flex items-center gap-4">
  <img src="/assets/icons/manage-active.svg" alt="Manage Icon Active" class="w-12 h-12">
  <div>
    <h1 class="text-xl font-bold text-white">Kelola Kegiatan Sosial</h1>
    <p class="text-sm text-white mt-0.5">Buatlah dan atur kegiatan sosial yang sesuai dengan minat anda</p>
  </div>
</div>

<hr class="border-[#D4B896] mb-5">

<div class="mb-5">
  <a href="/admin/activities/create"
    class="inline-flex items-center gap-2 bg-[#5C3D1E] hover:bg-[#7A5230] active:scale-95 text-white font-bold text-sm px-5 py-2.5 rounded-xl transition-all duration-200">
    Create New
  </a>
</div>

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
    <tbody>
      <?php if (empty($activities)): ?>
        <tr class="bg-[#F9F0DC]">
          <td colspan="5" class="px-4 py-6 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]">Belum ada kegiatan.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($activities as $activity): ?>
        <tr class="bg-[#F9F0DC] hover:bg-[#eedcb5] transition-colors duration-150">
          <td class="px-4 py-3 text-sm font-bold text-[#5C3D1E] border-t border-[#D4B896]">
            <?= htmlspecialchars($activity['activity'] ?? '', ENT_QUOTES, 'UTF-8') ?>
          </td>
          <td class="px-4 py-3 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]">
            <?= htmlspecialchars($activity['date'] ?? '', ENT_QUOTES, 'UTF-8') ?>
          </td>
          <td class="px-4 py-3 text-center text-sm text-[#5C3D1E] border-t border-[#D4B896]">
            <?= htmlspecialchars((string) ($activity['quota'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
          </td>
          <td class="px-4 py-3 text-center border-t border-[#D4B896]">
            <?php if (($activity['status'] ?? 'active') === 'inactive'): ?>
              <span class="inline-block text-xs font-bold px-3 py-0.5 rounded-full bg-gray-200 text-gray-600">Selesai</span>
            <?php else: ?>
              <span class="inline-block text-xs font-bold px-3 py-0.5 rounded-full bg-[#e8d5b0] text-[#5C3D1E]">Aktif</span>
            <?php endif; ?>
          </td>
          <td class="px-4 py-3 text-center border-t border-[#D4B896]">
            <div class="flex items-center justify-center gap-2">
              <?php if (($activity['status'] ?? 'active') === 'active'): ?>
                <a href="/admin/activities/<?= (int) $activity['id'] ?>/edit"
                   class="inline-flex items-center gap-1 text-xs font-bold text-white bg-[#5C3D1E] hover:bg-[#7A5230] px-3 py-1.5 rounded-lg transition-colors">
                  Edit
                </a>
                <form method="POST" action="/admin/activities/<?= (int) $activity['id'] ?>/close" class="inline">
                  <button type="submit"
                          onclick="return confirm('Tutup kegiatan ini? Semua pendaftaran yang menunggu akan dihapus.')"
                          class="inline-flex items-center gap-1 text-xs font-bold text-white bg-gray-500 hover:bg-gray-600 px-3 py-1.5 rounded-lg transition-colors">
                    Selesai
                  </button>
                </form>
              <?php else: ?>
                <span class="text-xs text-gray-400 italic">Tidak dapat diedit</span>
              <?php endif; ?>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>