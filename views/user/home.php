<?php 
$baseURL = "http://localhost/delina_beauty/public/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Glad2Glow</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">

<!-- ================= HEADER ================= -->
<header class="fixed top-0 inset-x-0 z-50 bg-white shadow">
  <nav class="flex items-center justify-between h-16 px-4 lg:px-10 ">

    <!-- LOGO -->
    <a href="<?= $baseURL ?>index.php?page=home">
      <img src="../public/images/logo_delina.png" class="h-16">
    </a>

    <!-- MENU DESKTOP -->
    <div class="hidden lg:flex gap-16">
      <a href="<?= $baseURL ?>index.php?page=home" class="hover:bg-pink-500 px-4 py-2 rounded-full hover:text-white transition">Home</a>
      <a href="<?= $baseURL ?>index.php?page=about" class="hover:bg-pink-500 px-4 py-2 rounded-full hover:text-white transition">About</a>
      <a href="<?= $baseURL ?>index.php?page=products" class="hover:bg-pink-500 px-4 py-2 rounded-full hover:text-white transition">Product</a>
      <a href="<?= $baseURL ?>index.php?page=contact_user" class="hover:bg-pink-500 px-4 py-2 rounded-full hover:text-white transition">Contact</a>
    </div>

    <!-- RIGHT DESKTOP -->
    <?php if(!isset($_SESSION['user_id'])): ?>
      <div class="hidden lg:flex gap-4">
        <a href="<?= $baseURL ?>index.php?page=login">Login</a>
        <a href="<?= $baseURL ?>index.php?page=register">Sign Up</a>
      </div>
    <?php else: ?>
      <div class="hidden lg:flex gap-4 items-center">
        <a href="<?= $baseURL ?>index.php?page=cart">
          <img src="../public/images/cart.png" class="w-5">
        </a>
        <a href="<?= $baseURL ?>index.php?page=logout" class="text-red-500">Logout</a>
      </div>
    <?php endif; ?>

    <!-- HAMBURGER (MOBILE) -->
    <button id="mobileMenuOpen" class="lg:hidden">
      <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
        <path d="M3 6h18M3 12h18M3 18h18" stroke-linecap="round"/>
      </svg>
    </button>

  </nav>
</header>

<!-- ================= MOBILE MENU ================= -->
<div id="mobileMenu" class="fixed inset-0 bg-white z-50 hidden p-6">

  <button id="mobileMenuClose" class="mb-6">
    ✕
  </button>

  <div class="space-y-4 text-lg">
    <a href="<?= $baseURL ?>index.php?page=home">Home</a>
    <a href="<?= $baseURL ?>index.php?page=about">About</a>
    <a href="<?= $baseURL ?>index.php?page=products">Product</a>
    <a href="<?= $baseURL ?>index.php?page=contact_user">Contact</a>
  </div>

  <div class="mt-6 border-t pt-4">
    <?php if(!isset($_SESSION['user_id'])): ?>
      <a href="<?= $baseURL ?>index.php?page=login" class="block">Login</a>
      <a href="<?= $baseURL ?>index.php?page=register" class="block">Sign Up</a>
    <?php else: ?>
      <a href="<?= $baseURL ?>index.php?page=logout" class="block text-red-500">Logout</a>
    <?php endif; ?>
  </div>

</div>

<!-- ================= HERO ================= -->
<div class="mt-16 h-[450px] bg-cover bg-center flex items-center justify-center"
     style="background-image:url('../public/images/foto_header.jpg')">
  <div class="text-white text-center">
    <h1 class="text-4xl md:text-6xl font-bold">Glow Better with Glad2Glow</h1>
    <p class="mt-5">Wujudkan Kulit Cerah Impianmu</p>
    <div class="mt-8">
        <a href="<?= $baseURL ?>index.php?page=products"
        class="inline-block px-8 py-3 bg-white text-gray-900 font-semibold rounded-full
        hover:bg-pink-500 hover:text-white transition">
        Temukan Sekarang →
    </a>
</div>
</div>
</div>

<!-- ================= SCRIPT ================= -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const open = document.getElementById("mobileMenuOpen");
  const close = document.getElementById("mobileMenuClose");
  const menu = document.getElementById("mobileMenu");

  open.onclick = () => menu.classList.remove("hidden");
  close.onclick = () => menu.classList.add("hidden");
});
</script>

</body>
</html>
        <!-- LIST BEST PRODUCT -->
        <div class="mt-20">
            <h1 class="text-5xl font-light text-pink-400 tracking-wide drop-shadow-sm">🌸 Best Product 🌸</h1>
            <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 sm:py-20 lg:max-w-7xl lg:px-8">
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                <a href="#" class="group">
                    <img src= "../public/images/moisturizer_pomegranate.jpeg" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8" />
                    <h3 class="mt-4 text-sm text-gray-700">Glad2Glow Pomegranate 5% Niacinamide Brightening Moisturizer </h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 32.000</p>
                </a>
                <a href="#" class="group">
                    <img src="../public/images/cleanser_bluberry.jpeg" alt=" " class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8" />
                    <h3 class="mt-4 text-sm text-gray-700">Glad2Glow Blueberry Ceramide Low pH Gel Cleanser</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 39.000</p>
                </a>
                <a href="#" class="group">
                    <img src="../public/images/cleanser_amino.jpg" alt=" " class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8" />
                    <h3 class="mt-4 text-sm text-gray-700">Glad2Glow Milk Amino Acids Gentle Cleanser 80g</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 40.120</p>
                </a>
                <a href="#" class="group">
                    <img src="../public/images/peeling.jpeg" alt=" " class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8" />
                    <h3 class="mt-4 text-sm text-gray-700">Glad2Glow Peeling Solution AHA BHA PHA Intensive</h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">Rp 40.560</p>
                </a>
                </a>
            </div>
            </div>
            </div>
        </div>
    <hr>

    <!-- komponen daily routine skincare -->
    <style>
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
        <!-- komponen utamanya -->
    <section class="max-w-4xl mx-auto px-4 py-8">
    
        <h2 class="text-center text-3xl font-bold text-pink-600 mb-8">
            Glad2Glow Daily Routine
        </h2>

        <div class="grid md:grid-cols-2 gap-6">

            <!-- Morning Routine -->
            <div class="bg-pink-50 p-6 rounded-2xl shadow-md border border-pink-200 animate-fadeIn">
                <h3 class="text-xl font-semibold text-pink-700 mb-4 flex items-center gap-2">
                    🌅 Morning Routine
                </h3>

                <ul class="space-y-3 text-gray-700 text-sm">
                    <li>✨ <b>Gentle Cleanser</b> — membersihkan minyak setelah tidur</li>
                    <li>🌸 <b>Hydrating Toner</b> — melembapkan kulit</li>
                    <li>💗 <b>Glow Serum</b> — mencerahkan wajah</li>
                    <li>🧴 <b>Moisturizer</b> — menjaga hidrasi</li>
                    <li>☀️ <b>Sunscreen</b> — wajib untuk proteksi UV</li>
                </ul>
            </div>
            <!-- Night Routine -->
            <div class="bg-pink-50 p-6 rounded-2xl shadow-md border border-pink-200 animate-fadeIn animation-delay-200">
                <h3 class="text-xl font-semibold text-pink-700 mb-4 flex items-center gap-2">
                    🌙 Night Routine
                </h3>
                <ul class="space-y-3 text-gray-700 text-sm">
                    <li>🧼 <b>Cleansing Oil</b> — hapus makeup & sunscreen</li>
                    <li>✨ <b>Facial Cleanser</b> — cuci muka sampai bersih</li>
                    <li>🍃 <b>Exfoliating Toner</b> (2–3x/minggu)</li>
                    <li>💗 <b>Repair Serum</b> — memperbaiki skin barrier</li>
                    <li>🧴 <b>Night Moisturizer</b> — mengunci kelembapan</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- FOOTER DELINA BEAUTY -->
    <footer class="bg-pink-100 text-gray-700 mt-12 py-10 px-6 border-t border-pink-200">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Brand -->
            <div>
                <h2 class="text-2xl font-bold text-pink-600">Delina Beauty</h2>
                <p class="mt-3 text-sm text-gray-600 leading-relaxed">
                    Temukan skincare terbaik untuk kulit sehat, glowing, dan percaya diri ✨
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-3 text-gray-800">Menu</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="<?= $baseURL ?>index.php?page=home" class="hover:text-pink-500">Home</a></li>
                    <li><a href="<?= $baseURL ?>index.php?page=products" class="hover:text-pink-500">Produk</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-lg font-semibold mb-3 text-gray-800">Kontak</h3>
                <ul class="text-sm space-y-2">
                    <li>Email: <a href="mailto:delinabeauty@gmail.com" class="hover:text-pink-500">delinabeauty@gmail.com</a></li>
                    <li>WhatsApp: <a href="#" class="hover:text-pink-500">0823-7855-9918</a></li>
                    <li>Instagram: <a href="#" class="hover:text-pink-500">@delinabeauty.id</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="text-black font-semibold mb-4">Support</h3>
                <ul class="space-y-2 text-black">
                    <li><a href="#" class="hover:text-indigo-600">FAQ</a></li>
                    <li><a href="#" class="hover:text-indigo-600">Check Order</a></li>
                    <li><a href="<?= $baseURL ?>index.php?page=testimoni" class="hover:text-indigo-600">Testimoni</a></li>
                </ul>
            </div>
            
            <!-- Company -->
            <div>
                <h3 class="text-black font-semibold mb-4">Company</h3>
                <ul class="space-y-2 text-black">
                    <li><a href="<?= $baseURL ?>index.php?page=about" class="hover:text-indigo-600">About</a></li>
                    <li><a href="#" class="hover:text-indigo-600">Carrier</a></li>
                </ul>
            </div>
            
            <!-- Legal -->
            <div>
                <h3 class="text-lg font-semibold mb-3 text-gray-800">Legal</h3>
                <ul class="text-sm space-y-2">
                    <li><a href="#" class="hover:text-indigo-600">Terms of service</a></li>
                    <li><a href="#" class="hover:text-indigo-600">Privacy policy</a></li>
                    <li><a href="#" class="hover:text-indigo-600">License</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom -->
        <div class="border-t border-pink-200 mt-10 pt-5 text-center text-sm text-gray-600">
            © 2025 Delina Beauty — Glow with Confidence ✨
        </div>
    </footer>
</body>
</html>