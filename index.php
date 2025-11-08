<?php include __DIR__ . '/layout/header.php'; ?>

<section class="hero">
  <div class="hero-overlay"></div>
  <div class="container hero-content">
    <div class="hero-text">
      <p>SEKOLAH MENENGAH ATAS</p>
      <h2>SMA PERTIWI MEDAN</h2>
      <p>“Kesuksesan bukan hanya tentang mimpi, tapi tentang keberanian untuk berjuang dan berdoa mewujudkannya.”</p>
    </div>
    <div class="hero-image">
      <img src="/sekolah/assets/images/siswa.png" alt="Siswa SMA Pertiwi Medan">
    </div>
  </div>
</section>

<!-- Ikon Cepat -->
<section class="quick-links">
  <div class="container quick-grid">

    <a href="sambutan.php" class="card">
      <img src="/sekolah/assets/icon/sambutan.svg" alt="">
      <p>Sambutan</p>
    </a>

    <a href="visimisi.php" class="card">
      <img src="/sekolah/assets/icon/visi.svg" alt="">
      <p>Visi & Misi</p>
    </a>
    <a href="spmb.php" class="card">
      <img src="/sekolah/assets/icon/hasil.svg" alt="">
      <p>Hasil SPMB</p>
    </a>

    <a href="ekskul.php" class="card">
      <img src="/sekolah/assets/icon/eskul.svg" alt="">
      <p>Ekskul</p>
    </a>
    <a href="fasilitas.php" class="card">
      <img src="/sekolah/assets/icon/fasilitas.svg" alt="">
      <p>Fasilitas</p>
    </a>

    <a href="galeri.php" class="card">
      <img src="/sekolah/assets/icon/galeri.svg" alt="">
      <p>Galeri</p>
    </a>  
  </div>
</section>

<!-- Tentang Kami -->
<section class="tentang">
  <div class="container tentang-wrapper">
    <div class="tentang-text">
      <h2>Tentang Kami</h2>
      <div class="line"></div>
      <p>
        SMA Pertiwi Medan adalah lembaga pendidikan menengah atas yang dikelola langsung oleh Pemerintah Kota Medan. Dengan visi menjadi sekolah unggulan yang berkarakter, kreatif, dan berdaya saing, SMA Pertiwi Medan berkomitmen untuk mencetak generasi muda yang cerdas, berakhlak mulia, serta siap menghadapi perkembangan zaman.
      </p>
      <a href="profil.php" class="btn-primary">Lihat Selengkapnya</a>
    </div>

    <div class="tentang-image">
      <div class="image-frame">
        <img src="/sekolah/assets/images/guru.jpg" alt="Foto SMA Pertiwi Medan">
      </div>
      <div class="image-decor"></div>
    </div>
  </div>
</section>

<!-- (Bagian berita dan SPMB tetap sama seperti sebelumnya) -->


<!-- berita.php -->
<section class="news-section">
  <div class="container">
    <div class="section-header">
      <h2>Berita Terbaru</h2>
      <p>Informasi penting, pengumuman, dan artikel dari sekolah.</p>
    </div>

    <div class="filter-buttons">
      <button class="active" onclick="filterNews('semua')">Semua</button>
      <button onclick="filterNews('pengumuman')">Pengumuman</button>
      <button onclick="filterNews('berita')">Berita</button>
      <button onclick="filterNews('artikel')">Artikel</button>
    </div>

    <div class="news-grid">
      <?php
      $articles = [
        [
          'type' => 'pengumuman',
          'title' => 'Jadwal Ujian Tengah Semester Kelas X',
          'description' => 'Pengumuman penting: Ujian Tengah Semester untuk kelas X akan dilaksanakan pada 20-24 Mei. Mohon siswa mempersiapkan diri dan membawa kebutuhan yang diperlukan.',
          'date' => '2025-05-10',
          'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=60',
          'url' => '#'
        ],
        [
          'type' => 'berita',
          'title' => 'Siswa SMA Meraih Juara Olimpiade Komputer Tingkat Provinsi',
          'description' => 'Tim sekolah berhasil meraih medali emas pada Olimpiade Komputer Provinsi. Prestasi ini menjadi bukti kualitas pembinaan ekstrakurikuler TIK di sekolah.',
          'date' => '2025-04-28',
          'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=60',
          'url' => '#'
        ],
        [
          'type' => 'artikel',
          'title' => 'Tips Belajar Efektif untuk Menghadapi Ujian Nasional',
          'description' => 'Belajar efektif membutuhkan strategi yang tepat: membuat jadwal belajar, istirahat yang cukup, teknik membaca cepat, dan latihan soal.',
          'date' => '2025-03-12',
          'image' => 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?auto=format&fit=crop&w=800&q=60',
          'url' => '#'
        ]
      ];

      foreach ($articles as $item): ?>
        <div class="news-card" data-type="<?= $item['type']; ?>">
          <div class="news-image">
            <img src="<?= $item['image']; ?>" alt="<?= $item['title']; ?>">
            <span class="badge <?= $item['type']; ?>"><?= ucfirst($item['type']); ?></span>
          </div>
          <div class="news-content">
            <h3><?= $item['title']; ?></h3>
            <p><?= substr($item['description'], 0, 120); ?>...</p>
            <div class="news-footer">
              <small><?= date('d M Y', strtotime($item['date'])); ?></small>
              <a href="<?= $item['url']; ?>" class="read-more">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="view-all">
      <a href="artikel.php">Lihat Semua Berita</a>
    </div>
  </div>
</section>

<script>
  function filterNews(type) {
    const cards = document.querySelectorAll('.news-card');
    const buttons = document.querySelectorAll('.filter-buttons button');

    buttons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');

    cards.forEach(card => {
      card.style.display = (type === 'semua' || card.dataset.type === type) ? 'block' : 'none';
    });
  }
</script>

<?php include __DIR__ . '/layout/footer.php'; ?>
