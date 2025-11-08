<?php include 'layout/header.php'; ?>

<main class="container">
  <section class="artikel-section">
    <div class="artikel-header">
      <h2>Berita Terbaru Di <span class="highlight">SMA Pertiwi</span></h2>
      <p>Kumpulan berita terbaru dan informasi menarik tentang kegiatan di SMA Pertiwi.</p>
    </div>

    <div class="artikel-grid">
      <?php
      // Data artikel
      $artikels = [
        [
          "tanggal" => "13 Februari 2025",
          "judul" => "Pendaftaran SMA Pertiwi Telah Dibuka !",
          "penulis" => "Admin SMA Pertiwi",
          "gambar" => "assets/images/penerimaan.jpeg"
        ],
        [
          "tanggal" => "14 Februari 2025",
          "judul" => "Kegiatan Belajar Mengajar Semester Genap",
          "penulis" => "Admin SMA Pertiwi",
          "gambar" => "assets/images/iterasi.jpeg"
        ],
        [
          "tanggal" => "16 Februari 2025",
          "judul" => "SMA Pertiwi Raih Prestasi Tingkat Nasional",
          "penulis" => "Admin SMA Pertiwi",
          "gambar" => "assets/images/prestasi.jpeg"
        ],
        [
          "tanggal" => "17 Februari 2025",
          "judul" => "SMA Pertiwi Adakan Seminar Teknologi",
          "penulis" => "Admin SMA Pertiwi",
          "gambar" => "assets/images/penerimaan.jpeg"
        ],
        [
          "tanggal" => "18 Februari 2025",
          "judul" => "Peresmian Gedung Baru SMA Pertiwi",
          "penulis" => "Admin SMA Pertiwi",
          "gambar" => "assets/images/penerimaan.jpeg"
        ],
        [
          "tanggal" => "19 Februari 2025",
          "judul" => "Siswa SMA Pertiwi Juara Olimpiade Matematika",
          "penulis" => "Admin SMA Pertiwi",
          "gambar" => "assets/images/penerimaan.jpeg"
        ],
      ];

      foreach ($artikels as $i => $a): ?>
        <div class="artikel-card <?= $i >= 3 ? 'hidden-article' : '' ?>">
          <img src="<?= $a['gambar'] ?>" alt="<?= $a['judul'] ?>">
          <div class="artikel-content">
            <span class="artikel-tag">Berita</span>
            <span class="artikel-date"><?= $a['tanggal'] ?></span>
            <h3><?= $a['judul'] ?></h3>
            <p class="artikel-excerpt">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod,
              nunc vel tincidunt fermentum, nibh eros posuere dui...
            </p>
            <a href="isiartikel.php">Baca Selengkapnya →</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Tombol Lihat Semua -->
    <div class="lihat-semua">
      <button id="btnLihatSemua">Lihat Semua Artikel</button>
    </div>
  </section>
</main>

<?php include 'layout/footer.php'; ?>

<!-- Script -->
<script>
document.getElementById('btnLihatSemua').addEventListener('click', function() {
  document.querySelectorAll('.hidden-article').forEach(card => {
    card.style.display = 'block';
  });
  this.style.display = 'none';
});
</script>
