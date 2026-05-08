<!DOCTYPE html>
<html lang="id" class="h-screen overflow-hidden">
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
    html, body { margin: 0; padding: 0; overflow: hidden; height: 100%; }
    body { font-family: 'Plus Jakarta Sans', sans-serif; touch-action: none; }

    .col-wrap {
      flex: 1;
      overflow: hidden;
      height: 100vh;
    }

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
  </style>
</head>

<body class="bg-yellow-light flex" style="height:100vh; overflow:hidden;">

  <!-- ── LEFT: Register Card ── -->
  <div class="flex-1 flex items-center justify-center" style="overflow-y: auto;">
    <div class="w-full" style="max-width: 38rem; padding: 1.5rem 0.25rem;">

      <!-- Logo -->
      <div class="flex justify-center mb-6">
        <div class="rounded-2xl bg-yellow-DEFAULT border-2 border-brown-mid flex items-center justify-center shadow-md"
             style="width: 6rem; height: 6rem; font-size: 3rem;">
          🏫
        </div>
      </div>

      <!-- Card -->
      <div class="bg-yellow-DEFAULT border-2 border-brown-mid rounded-2xl shadow-lg"
           style="padding: 2.5rem 3rem;">

        <h1 class="font-extrabold text-brown-mid leading-tight mb-8"
            style="font-size: 2.25rem; text-shadow: 2px 2px 0px rgba(90,50,10,0.2)">
          Welcome to<br>SocioLog
        </h1>

        <form method="POST" action="/register">

          <!-- Email -->
          <div class="mb-5">
            <label class="block font-bold text-brown-mid mb-2" style="font-size: 1.1rem;">Email</label>
            <input type="email" name="email" placeholder="Enter Email"
                   class="w-full bg-yellow-light border border-brown-mid rounded-xl text-brown-mid placeholder-brown-mid/60 outline-none focus:ring-2 focus:ring-brown-mid/40"
                   style="font-size: 1rem; padding: 0.85rem 1rem;" />
          </div>

          <!-- Username -->
          <div class="mb-5">
            <label class="block font-bold text-brown-mid mb-2" style="font-size: 1.1rem;">Username</label>
            <input type="text" name="username" placeholder="Enter Username"
                   class="w-full bg-yellow-light border border-brown-mid rounded-xl text-brown-mid placeholder-brown-mid/60 outline-none focus:ring-2 focus:ring-brown-mid/40"
                   style="font-size: 1rem; padding: 0.85rem 1rem;" />
          </div>

          <!-- Password -->
          <div class="mb-8">
            <label class="block font-bold text-brown-mid mb-2" style="font-size: 1.1rem;">Password</label>
            <div class="relative">
              <input id="passwordInput" type="password" name="password" placeholder="Enter Password"
                     class="w-full bg-yellow-light border border-brown-mid rounded-xl text-brown-mid placeholder-brown-mid/60 outline-none focus:ring-2 focus:ring-brown-mid/40"
                     style="font-size: 1rem; padding: 0.85rem 3rem 0.85rem 1rem;" />
              <button type="button" onclick="togglePassword()"
                      class="absolute right-3 top-1/2 -translate-y-1/2 text-brown-mid/70 hover:text-brown-mid"
                      style="font-size: 1.25rem;">
                👁️
              </button>
            </div>
          </div>

          <!-- Sign Up Button -->
          <button type="submit"
                  class="w-full bg-yellow-light border border-brown-mid text-brown-mid font-bold rounded-xl hover:bg-yellow-cream transition-colors active:scale-95 mb-4"
                  style="padding: 1rem; font-size: 1.1rem;">
            Sign Up
          </button>

          <!-- Divider -->
          <div class="flex items-center gap-3 mb-4">
            <div class="flex-1 border-t border-brown-mid/40"></div>
            <span class="text-brown-mid/60 font-semibold text-sm">OR</span>
            <div class="flex-1 border-t border-brown-mid/40"></div>
          </div>

          <!-- Sign Up with Google -->
          <button type="button"
                  class="w-full bg-yellow-light border border-brown-mid text-brown-mid font-bold rounded-xl hover:bg-yellow-cream transition-colors active:scale-95 flex items-center justify-center gap-2 mb-6"
                  style="padding: 1rem; font-size: 1.1rem;">
            <svg width="20" height="20" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M47.532 24.552c0-1.636-.132-3.196-.388-4.68H24.48v9.02h12.984c-.572 2.98-2.248 5.508-4.764 7.196v5.996h7.704c4.508-4.148 7.128-10.264 7.128-17.532z" fill="#4285F4"/>
              <path d="M24.48 48c6.48 0 11.924-2.148 15.9-5.816l-7.704-5.996c-2.148 1.44-4.896 2.292-8.196 2.292-6.3 0-11.636-4.252-13.54-9.964H3.02v6.188C6.98 42.98 15.168 48 24.48 48z" fill="#34A853"/>
              <path d="M10.94 28.516A14.44 14.44 0 0 1 10.02 24c0-1.572.276-3.1.92-4.516V13.296H3.02A23.98 23.98 0 0 0 .48 24c0 3.872.932 7.532 2.54 10.704l7.92-6.188z" fill="#FBBC05"/>
              <path d="M24.48 9.532c3.552 0 6.74 1.22 9.252 3.624l6.904-6.904C36.396 2.38 30.956 0 24.48 0 15.168 0 6.98 5.02 3.02 13.296l7.92 6.188c1.904-5.712 7.24-9.952 13.54-9.952z" fill="#EA4335"/>
            </svg>
            Sign Up with Google
          </button>

          <!-- Sign In Link -->
          <p class="text-center text-brown-mid" style="font-size: 0.95rem;">
            Already have an account?
            <a href="/login" class="font-bold underline hover:text-brown-dark transition-colors">Sign In here</a>
          </p>

        </form>
      </div>
    </div>
  </div>

  <!-- ── RIGHT: 3 Scrolling Columns ── -->
  <div class="flex gap-3 flex-shrink-0" style="width: 48vw; padding: 0 12px; overflow:hidden;">

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

    window.addEventListener('wheel', e => { if (e.ctrlKey) e.preventDefault(); }, { passive: false });
    window.addEventListener('keydown', e => {
      if (e.ctrlKey && ['+', '-', '=', '_', '0'].includes(e.key)) e.preventDefault();
    });
  </script>

</body>
</html>