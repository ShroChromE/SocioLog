<!-- Page Header -->
<div class="bg-brown-dark rounded-2xl p-6 mb-5 flex items-center gap-4">
  <span class="text-3xl">📋</span>
  <div>
    <h1 class="text-xl font-bold text-white">Daftar Kegiatan Sosial</h1>
    <p class="text-sm text-white mt-0.5">Temukan dan daftar kegiatan sosial yang sesuai dengan minat Anda</p>
  </div>
</div>

<!-- Search & Filter -->
<div class="flex gap-3 mb-6">
  <div class="flex-1 flex items-center bg-[#F9F0DC] rounded-xl px-4 gap-2.5 border border-black">
    <span class="text-sm text-[#999]">🔍</span>
    <input id="searchInput" type="text" placeholder="Cari Kegiatan ..."
           class="flex-1 bg-transparent border-none outline-none text-sm text-brown-dark placeholder-[#b0956d] py-3" />
  </div>
  <select id="categoryFilter"
          class="bg-[#F9F0DC] border border-black rounded-xl px-4 py-3 text-sm text-brown-dark outline-none cursor-pointer min-w-[170px]">
    <option value="">Semua Kategori</option>
    <option value="Bakti Sosial">Bakti Sosial</option>
    <option value="Pendidikan">Pendidikan</option>
    <option value="Lingkungan">Lingkungan</option>
    <option value="Kesehatan">Kesehatan</option>
  </select>
</div>

<!-- Cards Grid -->
<div id="cardsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

  <?php foreach ($activities as $activity): ?>
  <div class="card bg-brown-card border border-brown-border rounded-xl overflow-hidden flex flex-col hover:-translate-y-1 hover:shadow-2xl transition-all duration-200">
    <div class="relative h-40 overflow-hidden bg-brown-img">
      <img src="<?= ($activity['thumbnail']) ?>" alt="<?= ($activity['activity']) ?>" class="w-full h-full object-cover" />
    </div>
    <div class="p-4 flex flex-col gap-2 flex-1">
      <h3 class="text-sm font-semibold text-white leading-snug"><?= ($activity['activity']) ?></h3>
      <div class="flex flex-col gap-1">
        <div class="text-xs text-white">📅 <?= date('d F Y', strtotime($activity['date'])) ?></div>
        <div class="text-xs text-white">🕐 <?= ($activity['time']) ?></div>
        <div class="text-xs text-white">📍 <?= ($activity['location']) ?></div>
      </div>
      <a href="/activities/<?= $activity['id'] ?>" class="mt-auto w-full py-2.5 bg-yellow hover:bg-yellow-hover text-black text-sm font-bold rounded-lg transition-colors active:scale-95 text-center">
        Lihat Detail
      </a>
    </div>
  </div>
  <?php endforeach; ?>

</div>

<!-- Empty State -->
<?php if (empty($activities)): ?>
<div class="text-center py-16 text-[#75573A]">
  <div class="text-4xl block mb-3">🔍</div>
  <p class="text-base">Tidak ada kegiatan yang ditemukan.</p>
</div>
<?php endif; ?>

<script src="/js/daftar-kegiatan-sosial.js"></script>