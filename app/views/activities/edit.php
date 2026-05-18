<?php if (!$activity): ?>
  <div class="bg-[#F9F0DC] border border-[#D4B896] rounded-xl p-6 text-[#5C3D1E]">
    <h1 class="text-xl font-bold mb-2">Kegiatan tidak ditemukan</h1>
    <a href="/admin/activities" class="font-bold underline">Kembali ke kelola kegiatan</a>
  </div>
<?php return; endif; ?>

<div class="bg-[#5C3D1E] rounded-2xl p-6 mb-5">
  <h1 class="text-xl font-bold text-white">Edit Kegiatan Sosial</h1>
  <p class="text-sm text-white mt-0.5">Perbarui semua informasi kegiatan sosial</p>
</div>

<form method="POST" action="/admin/activities/<?= (int) $activity['id'] ?>/update" class="bg-[#F9F0DC] border border-[#D4B896] rounded-xl p-5 space-y-4">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <label class="block">
      <span class="block text-sm font-bold text-[#5C3D1E] mb-1">Nama Kegiatan</span>
      <input required type="text" name="activity" value="<?= htmlspecialchars($activity['activity'] ?? '', ENT_QUOTES, 'UTF-8') ?>" class="w-full rounded-lg border border-[#D4B896] px-3 py-2 text-sm text-[#3B2507]">
    </label>

    <label class="block">
      <span class="block text-sm font-bold text-[#5C3D1E] mb-1">Thumbnail URL</span>
      <input type="text" name="thumbnail" value="<?= htmlspecialchars($activity['thumbnail'] ?? '', ENT_QUOTES, 'UTF-8') ?>" class="w-full rounded-lg border border-[#D4B896] px-3 py-2 text-sm text-[#3B2507]">
    </label>

    <label class="block">
      <span class="block text-sm font-bold text-[#5C3D1E] mb-1">Tanggal</span>
      <input required type="date" name="date" value="<?= htmlspecialchars($activity['date'] ?? '', ENT_QUOTES, 'UTF-8') ?>" class="w-full rounded-lg border border-[#D4B896] px-3 py-2 text-sm text-[#3B2507]">
    </label>

    <label class="block">
      <span class="block text-sm font-bold text-[#5C3D1E] mb-1">Waktu</span>
      <input required type="text" name="time" value="<?= htmlspecialchars($activity['time'] ?? '', ENT_QUOTES, 'UTF-8') ?>" placeholder="08.00 - 12.00" class="w-full rounded-lg border border-[#D4B896] px-3 py-2 text-sm text-[#3B2507]">
    </label>

    <label class="block md:col-span-2">
      <span class="block text-sm font-bold text-[#5C3D1E] mb-1">Lokasi</span>
      <input required type="text" name="location" value="<?= htmlspecialchars($activity['location'] ?? '', ENT_QUOTES, 'UTF-8') ?>" class="w-full rounded-lg border border-[#D4B896] px-3 py-2 text-sm text-[#3B2507]">
    </label>
  </div>

  <label class="block">
    <span class="block text-sm font-bold text-[#5C3D1E] mb-1">Deskripsi</span>
    <textarea required name="description" rows="4" class="w-full rounded-lg border border-[#D4B896] px-3 py-2 text-sm text-[#3B2507]"><?= htmlspecialchars($activity['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
  </label>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <label class="block">
      <span class="block text-sm font-bold text-[#5C3D1E] mb-1">Tujuan</span>
      <textarea name="goal" rows="5" class="w-full rounded-lg border border-[#D4B896] px-3 py-2 text-sm text-[#3B2507]"><?= htmlspecialchars($activity['goal'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
    </label>

    <label class="block">
      <span class="block text-sm font-bold text-[#5C3D1E] mb-1">Rangkaian Acara</span>
      <textarea name="event" rows="5" class="w-full rounded-lg border border-[#D4B896] px-3 py-2 text-sm text-[#3B2507]"><?= htmlspecialchars($activity['event'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
    </label>
  </div>

  <label class="block">
    <span class="block text-sm font-bold text-[#5C3D1E] mb-1">Kuota</span>
    <input required type="number" name="quota" min="1" value="<?= htmlspecialchars((string) ($activity['quota'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" class="w-full rounded-lg border border-[#D4B896] px-3 py-2 text-sm text-[#3B2507]">
  </label>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <?php for ($i = 1; $i <= 4; $i++): ?>
      <label class="block">
        <span class="block text-sm font-bold text-[#5C3D1E] mb-1">Dokumentasi <?= $i ?> URL</span>
        <input type="text" name="documentation-<?= $i ?>" value="<?= htmlspecialchars($activity["documentation-$i"] ?? '', ENT_QUOTES, 'UTF-8') ?>" class="w-full rounded-lg border border-[#D4B896] px-3 py-2 text-sm text-[#3B2507]">
      </label>
    <?php endfor; ?>
  </div>

  <div class="flex flex-wrap gap-3 pt-2">
    <button type="submit" class="bg-[#5C3D1E] hover:bg-[#7A5230] text-white font-bold text-sm px-5 py-2.5 rounded-xl">Simpan</button>
    <a href="/admin/activities" class="bg-[#D4B896] hover:bg-[#caa87d] text-[#3B2507] font-bold text-sm px-5 py-2.5 rounded-xl">Batal</a>
  </div>
</form>
