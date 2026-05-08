<!-- Page Header with Back Button -->
<div class="bg-brown-dark rounded-2xl p-6 mb-5 flex items-center gap-4">
  <button onclick="history.back()" class="w-12 h-12 rounded-full bg-white/15 hover:bg-white/25 flex items-center justify-center text-white transition-colors flex-shrink-0">
    <img src="/assets/icons/back-arrow.svg" alt="Back" class="w-8 h-8">
  </button>
  <img src="/assets/icons/list.svg" alt="Detail" class="w-12 h-12">
  <div>
    <h1 class="text-xl font-bold text-white">Detail Kegiatan</h1>
    <p class="text-sm text-white mt-0.5">Informasi lengkap mengenai kegiatan sosial</p>
  </div>
</div>

<!-- Activity Summary Card -->
<div class="bg-brown-card border border-brown-border rounded-2xl overflow-hidden mb-5">
  <div class="flex gap-0">
    <div class="w-44 h-36 bg-brown-light flex-shrink-0 flex items-center justify-center m-4 rounded-xl overflow-hidden">
      <img src="<?= $activity['thumbnail'] ?>" alt="<?= ($activity['activity']) ?>" class="w-full h-full object-cover"/>
    </div>
    <div class="flex flex-col justify-center gap-2 py-4 pr-4">
      <span class="inline-block bg-yellow text-brown-dark text-xs font-bold px-3 py-1 rounded-full w-fit">Bakti Sosial</span>
      <h2 class="text-base font-bold text-white leading-snug"><?= ($activity['activity']) ?></h2>
      <div class="flex flex-col gap-1">
        <span class="text-xs text-[#D4B896]">📅 <strong class="text-white">Tanggal:</strong> <?= date('d F Y', strtotime($activity['date'])) ?></span>
        <span class="text-xs text-[#D4B896]">🕐 <strong class="text-white">Rentang Waktu:</strong> <?= ($activity['time']) ?></span>
        <span class="text-xs text-[#D4B896]">📍 <strong class="text-white">Tempat/Lokasi:</strong> <?= ($activity['location']) ?></span>
      </div>
    </div>
  </div>
</div>

<!-- Detail Content Card -->
<div class="bg-brown-card border border-brown-border rounded-2xl p-6 mb-5">

  <div class="mb-5">
    <h3 class="text-base font-bold text-yellow mb-2">Deskripsi Kegiatan</h3>
    <p class="text-sm text-[#D4B896] leading-relaxed"><?= ($activity['description']) ?></p>
  </div>

  <div class="border-t border-white/10 mb-5"></div>

  <div class="mb-5">
    <h3 class="text-base font-bold text-yellow mb-2">Tujuan Kegiatan</h3>
    <ul class="flex flex-col gap-1.5">
      <?php foreach (explode("\n", $activity['goal']) as $goal): ?>
        <?php if (trim($goal)): ?>
          <li class="flex items-start gap-2 text-sm text-[#D4B896]">
            <span class="text-yellow mt-0.5">•</span>
            <?= (trim($goal)) ?>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>

  <div class="border-t border-white/10 mb-5"></div>

  <div class="mb-5">
    <h3 class="text-base font-bold text-yellow mb-2">Rangkaian Acara</h3>
    <ul class="flex flex-col gap-1.5">
      <?php foreach (explode("\n", $activity['event']) as $event): ?>
        <?php if (trim($event)): ?>
          <li class="flex items-start gap-2 text-sm text-[#D4B896]">
            <span class="text-yellow mt-0.5">•</span>
            <?= (trim($event)) ?>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>

  <div class="border-t border-white/10 mb-5"></div>

  <div>
    <h3 class="text-base font-bold text-yellow mb-2">Jumlah Peserta</h3>
    <p class="text-sm text-[#D4B896]"><?= ($activity['quota']) ?> peserta</p>
  </div>

</div>

<!-- Dokumentasi -->
<div class="mb-6">
  <h3 class="text-base font-bold text-[#3B2507] mb-3">Dokumentasi:</h3>
  <div class="grid grid-cols-4 gap-3">
    <?php
      $docs = [
        $activity['documentation-1'],
        $activity['documentation-2'],
        $activity['documentation-3'],
        $activity['documentation-4'],
      ];
      foreach ($docs as $doc):
    ?>
    <div class="aspect-square rounded-xl bg-brown-light overflow-hidden">
      <img src="<?= $doc?>" alt="Dokumentasi" class="w-full h-full object-cover" onerror="this.outerHTML='<div class=\'w-full h-full bg-[#C9B99A] rounded-xl\'></div>'" />
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Register Button -->
<button class="w-full py-3.5 bg-yellow hover:bg-yellow-hover text-black text-base font-bold rounded-xl transition-colors active:scale-95 mb-2">
  <?php if (isset($_SESSION['user_id'])): ?>
  <?php
    $regModel = new \App\Models\Registration();
    $isRegistered = $regModel->isRegistered($_SESSION['user_id'], $activity['id']);
  ?>
  <?php if ($isRegistered): ?>
    <form method="POST" action="/activities/<?= $activity['id'] ?>/unregister">
      <button type="submit"
              class="w-full py-3.5 bg-red-400 hover:bg-red-500 text-white text-base font-bold rounded-xl transition-colors active:scale-95 mb-2">
        Batalkan Pendaftaran
      </button>
    </form>
  <?php else: ?>
    <form method="POST" action="/activities/<?= $activity['id'] ?>/register">
      <button type="submit"
              class="w-full py-3.5 bg-yellow hover:bg-yellow-hover text-black text-base font-bold rounded-xl transition-colors active:scale-95 mb-2">
        Daftar Sekarang
      </button>
    </form>
  <?php endif; ?>
  <?php else: ?>
  <a href="/login"
      class="block w-full py-3.5 bg-yellow hover:bg-yellow-hover text-black text-base font-bold rounded-xl transition-colors text-center mb-2">
    Login untuk Mendaftar
  </a>
  <?php endif; ?>
</button>