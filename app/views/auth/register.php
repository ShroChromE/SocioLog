<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Register — SocioLog</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brown: { dark: '#75573A', mid: '#7A5230' },
            yellow: { DEFAULT: '#F5C842', hover: '#E0B530', light: '#FFF6D0', cream: '#FFEEA0' },
          },
          fontFamily: { jakarta: ['"Plus Jakarta Sans"', 'sans-serif'] },
        }
      }
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    * { box-sizing: border-box; }
    html, body { margin: 0; padding: 0; height: 100%; }
    body { font-family: 'Plus Jakarta Sans', sans-serif; touch-action: none; overflow: hidden; }

    .col-wrap { flex: 1; overflow: hidden; height: 100vh; }

    .scroll-col {
      display: flex;
      flex-direction: column;
      gap: 14px;
      padding: 7px 0;
    }

    .scroll-up   { animation: scrollUp 20s linear infinite; }
    .scroll-down { animation: scrollDown 20s linear infinite; }

    @keyframes scrollUp {
      from { transform: translateY(0); }
      to   { transform: translateY(-50%); }
    }
    @keyframes scrollDown {
      from { transform: translateY(-50%); }
      to   { transform: translateY(0); }
    }

    .sq {
      width: 100%;
      aspect-ratio: 1 / 1;
      background: #F5C842;
      border: 2.5px solid #7A5230;
      border-radius: 20px;
      flex-shrink: 0;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      color: rgba(90,50,10,0.25);
      font-size: 2rem;
    }

    .sq img { width: 100%; height: 100%; object-fit: cover; }

    input:-webkit-autofill, input:-webkit-autofill:focus {
      -webkit-box-shadow: 0 0 0 100px #FFF6D0 inset !important;
      -webkit-text-fill-color: #75573A !important;
    }

    @media (max-width: 767px) {
      html, body { overflow-y: auto; height: auto; }
    }
  </style>
</head>

<body class="bg-yellow-light flex" style="min-height:100vh;">

  <!-- ── LEFT: Register Card ── -->
  <div class="flex-1 flex items-center justify-center px-4 py-8 md:py-0">
    <div class="w-full" style="max-width: 38rem;">

      <!-- Logo -->
      <div class="flex justify-center mb-6">
        <img src="/assets/logo-full.png" alt="SocioLog Logo" class="w-32 md:w-40">  
      </div>

      <!-- Card -->
      <div class="bg-yellow-200 border-2 border-brown-mid rounded-2xl shadow-lg px-6 py-8 md:px-12 md:py-10">

        <h1 class="font-extrabold text-brown-mid leading-tight mb-6 text-2xl md:text-4xl"
            style="text-shadow: 2px 2px 0px rgba(90,50,10,0.2)">
          Welcome to<br>SocioLog
        </h1>

        <?php if (!empty($error)): ?>
          <div class="mb-5 px-4 py-3 bg-red-100 border border-red-400 text-red-700 rounded-xl text-sm">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>

        <form method="POST" action="/register">

          <!-- Email -->
          <div class="mb-4">
            <label class="block font-bold text-brown-mid mb-2 text-base md:text-lg">Email</label>
            <input type="email" name="email" placeholder="Enter Email"
                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                   class="w-full bg-yellow-light border border-brown-mid rounded-xl text-brown-mid placeholder-brown-mid/60 outline-none focus:ring-2 focus:ring-brown-mid/40 text-sm md:text-base"
                   style="padding: 0.75rem 1rem;" />
          </div>

          <!-- Username -->
          <div class="mb-4">
            <label class="block font-bold text-brown-mid mb-2 text-base md:text-lg">Username</label>
            <input type="text" name="name" placeholder="Enter Username"
                   value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                   class="w-full bg-yellow-light border border-brown-mid rounded-xl text-brown-mid placeholder-brown-mid/60 outline-none focus:ring-2 focus:ring-brown-mid/40 text-sm md:text-base"
                   style="padding: 0.75rem 1rem;" />
          </div>

          <!-- Password -->
          <div class="mb-6">
            <label class="block font-bold text-brown-mid mb-2 text-base md:text-lg">Password</label>
            <div class="relative">
              <input id="passwordInput" type="password" name="password" placeholder="Enter Password"
                     class="w-full bg-yellow-light border border-brown-mid rounded-xl text-brown-mid placeholder-brown-mid/60 outline-none focus:ring-2 focus:ring-brown-mid/40 text-sm md:text-base"
                     style="padding: 0.75rem 3rem 0.75rem 1rem;" />
              <button type="button" onclick="togglePassword()"
                      class="absolute right-3 top-1/2 -translate-y-1/2 text-brown-mid/70 hover:text-brown-mid text-lg">
                👁
              </button>
            </div>
          </div>

          <!-- Sign Up Button -->
          <button type="submit"
                  class="w-full bg-yellow-100 border border-brown-mid text-brown-mid font-bold rounded-xl hover:bg-yellow-300 transition-colors active:scale-95 mb-4 text-base md:text-lg"
                  style="padding: 0.85rem;">
            Sign Up
          </button>

          <!-- Divider -->
          <div class="flex items-center gap-3 mb-4">
            <div class="flex-1 border-t border-brown-mid/40"></div>
            <span class="text-brown-mid/60 font-semibold text-sm">OR</span>
            <div class="flex-1 border-t border-brown-mid/40"></div>
          </div>

          <!-- Sign In Link -->
          <p class="text-center text-brown-mid text-sm md:text-base">
            Already have an account?
            <a href="/login" class="font-bold underline hover:text-brown-dark transition-colors">Sign In here</a>
          </p>

        </form>
      </div>
    </div>
  </div>

  <!-- ── RIGHT: 3 Scrolling Columns (hidden on mobile) ── -->
  <div class="hidden md:flex gap-3 flex-shrink-0" style="width: 45vw; padding: 0 12px; overflow:hidden; height:100vh;">

    <!-- Column 1: DOWN -->
    <div class="col-wrap">
      <div class="scroll-col scroll-down">
        <?php for ($i = 0; $i < 10; $i++): ?>
          <div class="sq">🖼️</div>
        <?php endfor; ?>
        <?php for ($i = 0; $i < 10; $i++): ?>
          <div class="sq">🖼️</div>
        <?php endfor; ?>
      </div>
    </div>

    <!-- Column 2: UP -->
    <div class="col-wrap">
      <div class="scroll-col scroll-up">
        <?php for ($i = 0; $i < 10; $i++): ?>
          <div class="sq">🖼️</div>
        <?php endfor; ?>
        <?php for ($i = 0; $i < 10; $i++): ?>
          <div class="sq">🖼️</div>
        <?php endfor; ?>
      </div>
    </div>

    <!-- Column 3: DOWN -->
    <div class="col-wrap">
      <div class="scroll-col scroll-down">
        <?php for ($i = 0; $i < 10; $i++): ?>
          <div class="sq">🖼️</div>
        <?php endfor; ?>
        <?php for ($i = 0; $i < 10; $i++): ?>
          <div class="sq">🖼️</div>
        <?php endfor; ?>
      </div>
    </div>

  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById('passwordInput');
      input.type = input.type === 'password' ? 'text' : 'password';
    }
  </script>

</body>
</html>