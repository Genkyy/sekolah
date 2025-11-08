<?php include 'layout/header.php'; ?>

<?php
// ============================
// 🎓 GALERI SMA PERTIWI LOGIC
// ============================

// Data Dummy Dokumentasi
$dokumentasi = [
  "Januari 2025" => [
    ["tanggal" => "5 Januari 2025", "judul" => "Upacara Awal Semester", "deskripsi" => "Pembukaan semester genap dengan upacara bendera.", "foto" => "assets/images/upacara.jpeg"],
    ["tanggal" => "20 Januari 2025", "judul" => "Lomba Kebersihan Kelas", "deskripsi" => "Kegiatan tahunan untuk meningkatkan kepedulian siswa.", "foto" => "assets/images/kebersihan.jpg"],
    ["tanggal" => "22 Januari 2025", "judul" => "Rapat Guru", "deskripsi" => "Koordinasi guru dalam mempersiapkan ujian semester.", "foto" => "assets/images/rapat.jpeg"],
    ["tanggal" => "25 Januari 2025", "judul" => "Penyuluhan Narkoba", "deskripsi" => "Penyuluhan tentang bahaya narkoba bagi siswa SMA Pertiwi.", "foto" => "assets/images/download.jpeg"]
  ],
  "Februari 2025" => [
    ["tanggal" => "14 Februari 2025", "judul" => "Pentas Seni", "deskripsi" => "Ajang kreativitas siswa SMA Pertiwi.", "foto" => "assets/images/pentas.jpg"]
  ],
  "Maret 2025" => [
    ["tanggal" => "2 Maret 2025", "judul" => "Try Out Ujian Nasional", "deskripsi" => "Persiapan siswa kelas XII menghadapi ujian nasional.", "foto" => "assets/images/tryout.jpeg"]
  ],
  "April 2025" => [
    ["tanggal" => "10 April 2025", "judul" => "Perkemahan Pramuka", "deskripsi" => "Kegiatan outdoor siswa kelas X.", "foto" => "assets/images/kemah.jpg"]
  ],
  "Mei 2025" => [
    ["tanggal" => "17 Mei 2025", "judul" => "Ujian Semester Genap", "deskripsi" => "Pelaksanaan ujian akhir semester genap.", "foto" => "assets/images/ujian.jpg"]
  ],
  "Juni 2025" => [
    ["tanggal" => "2 Juni 2025", "judul" => "Libur Kenaikan Kelas", "deskripsi" => "Awal liburan setelah ujian semester selesai.", "foto" => "assets/images/libur.jpeg"]
  ]
];

// ============================
// FILTER TAHUN & BULAN
// ============================
$filterTahun = $_GET['tahun'] ?? '2025';
$filterBulan = $_GET['bulan'] ?? '';

// Ambil data hanya jika cocok dengan tahun yang ada
$dokumentasiTahunIni = array_filter($dokumentasi, fn($k) => str_contains($k, $filterTahun), ARRAY_FILTER_USE_KEY);

// Jika tidak ada bulan untuk tahun itu → tampilkan kosong
if (empty($dokumentasiTahunIni)) {
  $filtered = [];
} else {
  $filtered = [];
  foreach ($dokumentasiTahunIni as $bulan => $events) {
    if ($filterBulan && stripos($bulan, $filterBulan) === false) continue;
    $filtered[$bulan] = $events;
  }
}

// Jika user filter tahun yang tak ada → kosong
if (empty($filtered) && empty($dokumentasiTahunIni)) {
  $filtered = [];
}

// ============================
// PAGINATION
// ============================
$bulanList = array_keys($filtered);
$totalBulan = count($bulanList);
$perPage = 3;
$totalPage = max(1, ceil($totalBulan / $perPage));
$page = max(1, min((int)($_GET['page'] ?? 1), $totalPage));
$start = ($page - 1) * $perPage;
$bulanPage = array_slice($bulanList, $start, $perPage);
?>

<!-- ===========================
     HERO
=========================== -->
<section class="dokumentasi-hero">
  <div class="overlay"></div>
  <div class="hero-content">
    <h1>Galeri Kegiatan <span><?= htmlspecialchars($filterTahun) ?></span></h1>
    <p>Kumpulan kegiatan SMA Pertiwi sepanjang tahun.</p>
  </div>
</section>

<!-- ===========================
     FILTER
=========================== -->
<section class="filter-section container">
  <form method="GET" class="filter-form">
    <select name="tahun">
      <?php for ($t = 2024; $t <= 2026; $t++): ?>
        <option value="<?= $t ?>" <?= $filterTahun == $t ? 'selected' : '' ?>><?= $t ?></option>
      <?php endfor; ?>
    </select>

    <select name="bulan">
      <option value="">Semua Bulan</option>
      <?php foreach (array_keys($dokumentasi) as $bulan): ?>
        <?php $nama = explode(' ', $bulan)[0]; ?>
        <option value="<?= $nama ?>" <?= $filterBulan == $nama ? 'selected' : '' ?>><?= $nama ?></option>
      <?php endforeach; ?>
    </select>

    <button type="submit">Tampilkan</button>
  </form>
</section>

<!-- ===========================
     DOKUMENTASI
=========================== -->
<section class="dokumentasi-section">
  <div class="container">
    <?php if (empty($filtered)): ?>
      <p class="no-data">Tidak ada dokumentasi untuk tahun ini.</p>
    <?php else: ?>
      <?php foreach ($bulanPage as $bulan): ?>
        <div class="dokumentasi-bulan">
          <h2><?= htmlspecialchars($bulan); ?></h2>
          <div class="dokumentasi-grid">
            <?php
            $fotoList = $filtered[$bulan];
            $fotoAwal = array_slice($fotoList, 0, 3);
            $sisaFoto = count($fotoList) - 3;
            foreach ($fotoAwal as $ev): ?>
              <div class="dokumentasi-card">
                <img src="<?= htmlspecialchars($ev['foto']); ?>" alt="<?= htmlspecialchars($ev['judul']); ?>" class="lightbox-trigger">
                <div class="dokumentasi-content">
                  <span class="tanggal"><?= htmlspecialchars($ev['tanggal']); ?></span>
                  <h3><?= htmlspecialchars($ev['judul']); ?></h3>
                  <p><?= htmlspecialchars($ev['deskripsi']); ?></p>
                </div>
              </div>
            <?php endforeach; ?>

            <?php if ($sisaFoto > 0): ?>
              <div class="lihat-semua" onclick="toggleFoto(this)">
                <span>Lihat Semua Foto (<?= count($fotoList) ?>)</span>
              </div>
              <div class="foto-tersembunyi" style="display:none;">
                <?php foreach (array_slice($fotoList, 3) as $ev): ?>
                  <div class="dokumentasi-card">
                    <img src="<?= htmlspecialchars($ev['foto']); ?>" alt="<?= htmlspecialchars($ev['judul']); ?>" class="lightbox-trigger">
                    <div class="dokumentasi-content">
                      <span class="tanggal"><?= htmlspecialchars($ev['tanggal']); ?></span>
                      <h3><?= htmlspecialchars($ev['judul']); ?></h3>
                      <p><?= htmlspecialchars($ev['deskripsi']); ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>

      <!-- PAGINATION -->
      <div class="pagination">
        <?php if ($page > 1): ?>
          <a href="?page=<?= $page - 1 ?>&tahun=<?= $filterTahun ?>&bulan=<?= $filterBulan ?>">&laquo; Sebelumnya</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPage; $i++): ?>
          <a href="?page=<?= $i ?>&tahun=<?= $filterTahun ?>&bulan=<?= $filterBulan ?>" class="<?= $i == $page ? 'active' : '' ?>">
            <?= $i ?>
          </a>
        <?php endfor; ?>

        <?php if ($page < $totalPage): ?>
          <a href="?page=<?= $page + 1 ?>&tahun=<?= $filterTahun ?>&bulan=<?= $filterBulan ?>">Berikutnya &raquo;</a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- ===========================
     LIGHTBOX
=========================== -->
<div id="lightbox">
  <img id="lightbox-img" src="" alt="Preview Gambar">
</div>

<script>
function toggleFoto(button) {
  const hiddenPhotos = button.nextElementSibling;
  const span = button.querySelector('span');
  if (hiddenPhotos.style.display === "none") {
    hiddenPhotos.style.display = "grid";
    span.innerText = "Sembunyikan Foto";
  } else {
    hiddenPhotos.style.display = "none";
    const total = hiddenPhotos.querySelectorAll('.dokumentasi-card').length + 3;
    span.innerText = "Lihat Semua Foto (" + total + ")";
  }
}

document.querySelectorAll('.lightbox-trigger').forEach(img => {
  img.addEventListener('click', () => {
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    lightboxImg.src = img.src;
    lightbox.style.display = 'flex';
  });
});
document.getElementById('lightbox').addEventListener('click', e => {
  if (e.target.id === 'lightbox') e.target.style.display = 'none';
});
</script>

<?php include 'layout/footer.php'; ?>
