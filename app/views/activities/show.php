<?php require_once '../app/models/Registration.php'; ?>
<?php if (!empty($_GET['msg'])): ?>
  <?php $msgs = [
    'registered'         => ['bg-green-100 border-green-400 text-green-700',  'Berhasil mendaftar kegiatan!'],
    'already_registered' => ['bg-yellow-100 border-yellow-400 text-yellow-700', 'Kamu sudah terdaftar di kegiatan ini.'],
    'unregistered'       => ['bg-blue-100 border-blue-400 text-blue-700',      'Pendaftaran berhasil dibatalkan.'],
    'failed'             => ['bg-red-100 border-red-400 text-red-700',         'Gagal mendaftar, coba lagi.'],
    'penuh'              => ['bg-red-100 border-red-400 text-red-700',         'Maaf, kuota kegiatan ini sudah penuh.'],
  ]; ?>
  <?php if (isset($msgs[$_GET['msg']])): ?>
    <div class="mb-4 px-4 py-3 border rounded-xl text-sm <?= $msgs[$_GET['msg']][0] ?>">
      <?= $msgs[$_GET['msg']][1] ?>
    </div>
  <?php endif; ?>
<?php endif; ?>

<!-- Page Header with Back Button -->
<div class="bg-brown-dark rounded-2xl p-6 mb-5 flex items-center gap-4">
  <button onclick="history.back()" class="w-12 h-12 rounded-full bg-white/15 hover:bg-white/25 flex items-center justify-center text-white transition-colors flex-shrink-0">
    <img src="/assets/icons/back-arrow.svg" alt="Back" class="w-8 h-8">
  </button>
  <img src="/assets/icons/list-active.svg" alt="Detail" class="w-12 h-12">
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
        <span class="text-xs text-[#D4B896]"><img src="/assets/icons/calendar.svg" alt="Date" class="w-4 h-4 inline mr-1"> <strong class="text-white">Tanggal:</strong> <?= date('d F Y', strtotime($activity['date'])) ?></span>
        <span class="text-xs text-[#D4B896]"><img src="/assets/icons/clock.svg" alt="Time" class="w-4 h-4 inline mr-1"> <strong class="text-white">Rentang Waktu:</strong> <?= ($activity['time']) ?></span>
        <span class="text-xs text-[#D4B896]"><img src="/assets/icons/location.svg" alt="Location" class="w-4 h-4 inline mr-1"> <strong class="text-white">Tempat/Lokasi:</strong> <?= ($activity['location']) ?></span>
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
    <p class="text-sm text-[#D4B896]">
      Sisa kuota: <?= $activity['sisa'] ?> dari <?= $activity['quota'] ?> peserta
    </p>
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
<?php if (isset($_SESSION['user_id'])): ?>
  <?php
    $regModel     = new \App\Models\Registration();
    $isRegistered = $regModel->isRegistered($_SESSION['user_id'], $activity['id']);
  ?>
  <?php if ($isRegistered): ?>
    <form method="POST" action="/activities/<?= $activity['id'] ?>/unregister">
      <button type="submit"
              class="w-full py-3.5 bg-red-400 hover:bg-red-500 text-white text-base font-bold rounded-xl transition-colors active:scale-95 mb-2">
        Batalkan Pendaftaran
      </button>
    </form>
  <?php elseif ($activity['penuh']): ?>
    <button disabled
            class="w-full py-3.5 bg-gray-300 text-gray-500 text-base font-bold rounded-xl cursor-not-allowed mb-2">
      Kuota Penuh
    </button>
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