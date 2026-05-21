<!DOCTYPE html>
<html lang="id" class="h-screen overflow-hidden">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Kegiatan Sosial</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brown: {
              dark:    '#75573A',
              mid:     '#7A5230',
              light:   '#D9D9D9',
              card:    '#75573A',
              border:  '#8B5E3C',
              sidebar: '#FFE15E',
              main:    '#FFF6D0',
              page:    '#ffffff',
              img:     '#75573A',
            },
            yellow: {
              DEFAULT: '#F5C842',
              hover:   '#E0B530',
            },
            cream: '#ffffff',
            muted: '#ffffff',
          },
          fontFamily: {
            jakarta: ['"Plus Jakarta Sans"', 'sans-serif'],
          },
        }
      }
    }
  </script>

  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: transparent; }
    ::-webkit-scrollbar-thumb { background: #7A5230; border-radius: 4px; }
  </style>
</head>

<body class="bg-brown-page text-cream flex h-screen overflow-hidden">

  <!-- ── SIDEBAR ── -->
  <aside class="w-52 bg-brown-sidebar flex flex-col py-5 flex-shrink-0 border-r border-black/10">

    <!-- Profile -->
    <div class="flex items-center gap-2.5 px-4 pb-4 border-b border-black/10 mb-3">
      <?php
        $profilePic = $_SESSION['user_picture'] ?? null;
        if (!$profilePic) {
          $picPath = '../public/assets/profiles/profile-user' . ($_SESSION['user_id'] ?? 0) . '.webp';
          if (file_exists($picPath)) {
            $profilePic = '/assets/profiles/profile-user' . ($_SESSION['user_id'] ?? 0) . '.webp';
          }
        }
      ?>
      <div class="w-10 h-10 rounded-full overflow-hidden bg-brown-light flex-shrink-0 flex items-center justify-center">
        <?php if ($profilePic): ?>
          <img src="<?= htmlspecialchars($profilePic) ?>" alt="Profile" class="w-full h-full object-cover">
        <?php else: ?>
          <img src="/assets/icons/profile-placeholder.svg" alt="Profile" class="w-6 h-6">
        <?php endif; ?>
      </div>
      <div class="overflow-hidden">
        <p class="text-sm font-bold text-[#3B2507] truncate"><?= htmlspecialchars($_SESSION['user_name'] ?? 'Guest') ?></p>
        <p class="text-xs text-[#75573A] truncate">SMK Kristen Immanuel</p>
      </div>
    </div>

    <!-- Nav -->
    <?php $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>
    <nav class="flex flex-col gap-0.5 px-2.5">

      <a href="/" class="nav-item flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-sm transition-colors
        <?= $currentUri === '/' ? 'font-bold bg-brown-dark text-[#FFE15E]' : 'font-medium text-[#75573A] hover:bg-black/5 hover:text-[#3B2507]' ?>">
        <img src="/assets/icons/<?= $currentUri === '/' ? 'dashboard-active.svg' : 'dashboard.svg' ?>" alt="Dashboard" class="w-8 h-8">
        Halaman Login
      </a>

      <a href="/activities" class="nav-item flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-sm transition-colors
        <?= $currentUri === '/activities' ? 'font-bold bg-brown-dark text-[#FFE15E]' : 'font-medium text-[#75573A] hover:bg-black/5 hover:text-[#3B2507]' ?>">
        <img src="/assets/icons/<?= $currentUri === '/activities' ? 'list-active.svg' : 'list.svg' ?>" alt="List" class="w-8 h-8">
        Daftar Kegiatan
      </a>

      <a href="/profile" class="nav-item flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-sm transition-colors
        <?= $currentUri === '/profile' ? 'font-bold bg-brown-dark text-[#FFE15E]' : 'font-medium text-[#75573A] hover:bg-black/5 hover:text-[#3B2507]' ?>">
        <img src="/assets/icons/<?= $currentUri === '/profile' ? 'profile-active.svg' : 'profile.svg' ?>" alt="Profil" class="w-8 h-8">
        Profil
      </a>
    </nav>
  </aside>

  <!-- ── PAGE CONTENT ── -->
  <main class="flex-1 bg-brown-main overflow-y-auto p-7">
    <?php require_once $content; ?>
  </main>

</body>
</html>