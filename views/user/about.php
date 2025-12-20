<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Glad2Glow</title>
  <link rel="stylesheet" href="../public/css/about.css">
</head>
<style>
  :root {
    --pink: #FFC8DD;
    --mint: #CDECE5;
    --beige: #FF6EE;
    --gray: #f6f7fb;
  }
  * {
    box-sizing: border-box;
  }
  body {
    margin: 0;
    font-family: system-ui, sans-serif;
    background: var(--gray);
    color: #333;
  }
  .page {
    width: 100%;
  }
  .hero {
    background: white;
    padding: 80px 20px;
  }
  .hero-container {
    max-width: 1200px;
    margin: auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    align-items: center;
  }
  .hero-text h1 {
    font-size: 40px;
    margin: 20px 0;
  }
  .hero-text p {
    color: #666;
  }
  .badge {
    display: inline-block;
    padding: 5px 15px;
    border-radius: 20px;
    background: var(--mint);
    font-size: 15px;
  }
  .hero-actions {
    margin-top: 20px;
    display: flex;
    gap: 20px;
  }
  .btn-primary {
    background: var (--pink);
    padding: 12px 25px;
    border-radius: 15px;
    text-decoration: none;
    color: #000;
    font-weight: 600;
}
.link-muted {
  color: #8606;
  text-decoration: none;
}
.link tags {
  margin-top: 20px;
  display: flex;
  gap: 10px;
}
.hero-tags span {
  background: white;
  padding: 5px 12px;
  border-radius: 20px;
  font-size: 12px;
  box-shadow: 0 2px 6px rgba(0,0,0,.05); 
}
.hero img{
  text-align: center;
}
.hero-image img{
  width: 250px;
}
.section {
  padding: 80px 20px;
}
.section-grid{
  max-width: 1200px;
  margin: auto;
  display: grid;
  grid-column: 2fr 1fr-columns 2fr 1fr;
}
.card-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
  margin-top: 20px;
}
.card-grid.three {
  grid-template-columns: repeat(3,1fr);
}
.card {
  background: white;
  padding: 20px;
  border-radius: 15px;
}
.card.highlight {
  box-shadow: 0 6px 20px rgba(0,0,0,.08)
}
.card.highlight {
  box-shadow: 0 6px 20px rgba(0,0,0,.08);
}

.card-mint{background: var(--version); }
.card.pink{background : var(--pink); }
.card.black{background : var(--coding); }

@media (max-width: 900px) {
  .hero-container, section-grid{
    grid-template-columns: 1fr;
  }
}


</style>
<body>
<?php include '../views/layout/header.php'; ?>

<main class="page">

  <!-- HERO -->
  <section class="hero">
    <div class="hero-container">

      <div class="hero-text">
        <span class="badge">New • Clean & Fun</span>
        <h1>Glad2Glow — Simple skincare, joyful results</h1>
        <p>
          Perawatan kulit yang minimalis namun playful. Formulasi lembut,
          efektif, dan mudah dimasukkan ke rutinitas harian.
        </p>

        <div class="hero-actions">
          <a href="../views/user/product.php" class="btn-primary">Shop Now</a>
          <a href="#community" class="link-muted">Join #Glad2GlowFam</a>
        </div>

        <div class="hero-tags">
          <span>Dermatology-friendly</span>
          <span>Non-comedogenic</span>
          <span>No Parabens</span>
        </div>
      </div>

      <div class="hero-image">
        <img src="../public/images/serum_best_seller.webp" alt="Glad2Glow">
        <p>Glow Serum — Bestseller</p>
      </div>

    </div>
  </section>

  <!-- WHO WE ARE -->
  <section class="section">
    <div class="section-grid">
      <div>
        <h2>Who We Are</h2>
        <p>
          Glad2Glow hadir dari ide sederhana: merawat kulit tidak harus kompleks.
        </p>

        <div class="card-grid">
          <div class="card">
            <h3>Mudah & Efektif</h3>
            <p>Produk kami cocok untuk semua rutinitas.</p>
          </div>
          <div class="card">
            <h3>Aesthetic & Playful</h3>
            <p>Desain pastel yang clean dan fun.</p>
          </div>
        </div>
      </div>

      <aside class="card highlight">
        <h3>Quick Facts</h3>
        <ul>
          <li>✨ Berdiri: 2022</li>
          <li>🌿 Clean formulas</li>
          <li>💬 #Glad2GlowFam</li>
          <li>♻️ Eco packaging</li>
        </ul>
      </aside>
    </div>
  </section>

  <!-- MISSION -->
  <section class="section alt">
    <div class="section-grid">
      <div>
        <h2>Our Mission</h2>
        <p>
          Membuat skincare yang mudah dipakai, lembut, dan efektif.
        </p>

        <div class="card-grid three">
          <div class="card mint">
            <h3>Easy</h3>
            <p>Tanpa langkah ribet.</p>
          </div>
          <div class="card pink">
            <h3>Gentle</h3>
            <p>Aman untuk kulit sensitif.</p>
          </div>
          <div class="card beige">
            <h3>Affordable</h3>
            <p>Harga bersahabat.</p>
          </div>
        </div>
      </div>

      <div class="card">
        <h3>Glow Philosophy</h3>
        <p>
          Kebiasaan kecil menghasilkan perubahan besar.
        </p>
      </div>
    </div>
  </section>

</main>
</body>
</html>
