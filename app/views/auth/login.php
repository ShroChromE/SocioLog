<!DOCTYPE html>
<html lang="id" class="h-screen overflow-hidden">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Login</title>

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
    body { font-family: 'Plus Jakarta Sans', sans-serif; }

    /* prevent zoom on ctrl+scroll */
    body { touch-action: none; }

    .col-wrap {
      flex: 1;
      overflow: hidden;
      height: 100vh; /* full viewport height, no clipping */
    }

    .scroll-col {
      display: flex;
      flex-direction: column;
      gap: 14px;
      padding: 7px 0; /* half of gap so loop is truly seamless */
    }

    /* seamless: animate exactly half the total height */
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
        box-shadow: 0 0 0 100px #FFF6D0 inset !important;
        -webkit-text-fill-color: #75573A !important;
    }

    input:-moz-autofill {
        background-color: #FFF6D0 !important;
    }
  </style>
</head>

<body class="bg-yellow-light flex" style="height:100vh; overflow:hidden;">

  <!-- ── LEFT: 3 Scrolling Columns ── -->
  <div class="flex gap-3 flex-shrink-0" style="width: 48vw; padding: 0 12px; overflow:hidden;">

    <!-- Column 1: DOWN -->
    <div class="col-wrap">
      <div class="scroll-col scroll-down">
        <?php for ($i = 0; $i < 10; $i++): ?>
          <div class="sq">🖼</div>
        <?php endfor; ?>
        <!-- duplicate for seamless loop -->
        <?php for ($i = 0; $i < 10; $i++): ?>
          <div class="sq">🖼</div>
        <?php endfor; ?>
      </div>
    </div>

    <!-- Column 2: UP -->
    <div class="col-wrap">
      <div class="scroll-col scroll-up">
        <?php for ($i = 0; $i < 10; $i++): ?>
          <div class="sq">🖼</div>
        <?php endfor; ?>
        <?php for ($i = 0; $i < 10; $i++): ?>
          <div class="sq">🖼</div>
        <?php endfor; ?>
      </div>
    </div>

    <!-- Column 3: DOWN -->
    <div class="col-wrap">
      <div class="scroll-col scroll-down">
        <?php for ($i = 0; $i < 10; $i++): ?>
          <div class="sq">🖼</div>
        <?php endfor; ?>
        <?php for ($i = 0; $i < 10; $i++): ?>
          <div class="sq">🖼</div>
        <?php endfor; ?>
      </div>
    </div>

  </div>

  <!-- ── RIGHT: Login Card ── -->
<div class="flex-1 flex items-center justify-center">
  <div class="w-full" style="max-width: 38rem; padding: 0 0.25rem">

    <!-- Logo Placeholder -->
    <div class="flex justify-center mb-6">
      <div class="rounded-2xl bg-yellow-100 border-2 border-brown-mid flex items-center justify-center shadow-md"
           style="width: 6rem; height: 6rem; font-size: 3rem;">
        "S"
      </div>
    </div>

    <!-- Card -->
    <div class="bg-yellow-200 border-2 border-brown-mid rounded-2xl shadow-lg"
         style="padding: 3rem 3rem;">

      <h1 class="font-extrabold text-brown-mid leading-tight mb-8"
          style="font-size: 2.25rem; text-shadow: 2px 2px 0px rgba(90,50,10,0.2)">
        It's Great Having<br>You Back
      </h1>

      <form method="POST" action="/login">

        <div class="mb-5">
          <label class="block font-bold text-brown-mid mb-2" style="font-size: 1.1rem;">E-Mail</label>
          <input type="text" name="login" class="w-full bg-yellow-100 border border-brown-mid rounded-xl text-brown-mid outline-none focus:ring-2 focus:ring-brown-mid/40" style="font-size: 1rem; padding: 0.85rem 1rem;" />
        </div>

        <div class="mb-5">
          <label class="block font-bold text-brown-mid mb-2" style="font-size: 1.1rem;">Password</label>
          <div class="relative">
            <input id="passwordInput" type="password" name="password" placeholder="Enter password"
                   class="w-full bg-yellow-100 border border-brown-mid rounded-xl text-brown-mid placeholder-brown-mid/60 outline-none focus:ring-2 focus:ring-brown-mid/40"
                   style="font-size: 1rem; padding: 0.85rem 3rem 0.85rem 1rem;" />
            <button type="button" onclick="togglePassword()"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-brown-mid/70 hover:text-brown-mid"
                    style="font-size: 1.25rem;">
              👁
            </button>
          </div>
        </div>

        <div class="flex items-center justify-between mb-8 text-brown-mid" style="font-size: 0.95rem;">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" class="rounded border-brown-mid accent-brown-mid"
                   style="width: 1rem; height: 1rem;" />
            Remember me
          </label>
          <a href="#" class="hover:underline">Forgot password?</a>
        </div>

        <button type="submit"
                class="w-full bg-yellow-100 border border-brown-mid text-brown-mid font-bold rounded-xl hover:bg-yellow-300 transition-colors active:scale-95"
                style="padding: 1rem; font-size: 1.1rem;">
          Sign in
        </button>

        <!-- Divider -->
          <div class="flex items-center gap-3 my-4">
            <div class="flex-1 border-t border-brown-mid/40"></div>
            <span class="text-brown-mid/60 font-semibold text-sm">OR</span>
            <div class="flex-1 border-t border-brown-mid/40"></div>
          </div>

          <!-- Sign Up Link -->
          <p class="text-center text-brown-mid" style="font-size: 0.95rem;">
            Don't have an account?
            <a href="/register" class="font-bold underline hover:text-brown-dark transition-colors">Sign Up here</a>
          </p>


      </form>
    </div>
  </div>
</div>

  <script>
    function togglePassword() {
      const input = document.getElementById('passwordInput');
      input.type = input.type === 'password' ? 'text' : 'password';
    }

    // prevent ctrl+scroll zoom
    window.addEventListener('wheel', e => { if (e.ctrlKey) e.preventDefault(); }, { passive: false });
    // prevent ctrl+plus/minus zoom
    window.addEventListener('keydown', e => {
      if (e.ctrlKey && ['+', '-', '=', '_', '0'].includes(e.key)) e.preventDefault();
    });
  </script>

</body>
</html>