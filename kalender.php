<?php include 'layout/header.php'; ?>

<?php
$tahun = 2025;

// Nama hari (mulai Senin biar lebih umum dipakai di sekolah)
$namaHari = ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"];

// Event manual (contoh acak)
$events = [
  "2025-01-01" => [["judul" => "Tahun Baru", "kategori" => "Libur"]],
  "2025-02-14" => [["judul" => "Class Meeting", "kategori" => "Acara"]],
  "2025-05-17" => [["judul" => "Ujian Semester Genap", "kategori" => "Ujian"]],
  "2025-06-02" => [["judul" => "Libur Kenaikan Kelas", "kategori" => "Libur"]],
  "2025-08-17" => [["judul" => "Upacara HUT RI", "kategori" => "Acara"]],
  "2025-11-25" => [["judul" => "Hari Guru", "kategori" => "Acara"]],
];
?>

<!-- Hero Kalender -->
<section class="kalender-hero">
  <div class="overlay"></div>
  <div class="hero-content">
    <h1>Kalender <span>Pendidikan <?= $tahun; ?></span></h1>
    <p>Informasi libur, ujian, dan kegiatan sekolah sepanjang tahun.</p>
  </div>
</section>

<!-- Kalender -->
<section class="kalender-section">
  <div class="container">
    <div class="kalender-header">
      <h2>Kalender Tahun <span><?= $tahun; ?></span></h2>
      <p>Berikut jadwal penting SMA Pertiwi Medan selama <?= $tahun; ?>.</p>
    </div>

    <div class="kalender-grid">
      <?php 
      // Loop bulan
      for ($bulan = 1; $bulan <= 12; $bulan++):
        $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $namaBulan = date("F", mktime(0,0,0,$bulan,1,$tahun));
        $firstDayWeek = (date("N", strtotime("$tahun-$bulan-01")) % 7); 
        // Sen = 1 → jadi kolom pertama
      ?>
      <div class="kalender-bulan">
        <h3><?= $namaBulan; ?></h3>
        <div class="kalender-grid-bulan">
          <?php foreach ($namaHari as $nh): ?>
            <div class="nama-hari"><?= $nh; ?></div>
          <?php endforeach; ?>

          <?php
          // Sel kosong sebelum tanggal 1
          for ($blank = 0; $blank < $firstDayWeek; $blank++): ?>
            <div class="hari kosong"></div>
          <?php endfor; ?>

          <?php for ($hari = 1; $hari <= $jumlahHari; $hari++):
            $tanggal = sprintf("%04d-%02d-%02d", $tahun, $bulan, $hari);
            $kelasEvent = "";
            if (isset($events[$tanggal])) {
              foreach ($events[$tanggal] as $ev) {
                $kategori = strtolower($ev['kategori']);
                if ($kategori === "libur") $kelasEvent = "libur";
                if ($kategori === "ujian") $kelasEvent = "ujian";
                if ($kategori === "acara") $kelasEvent = "acara";
              }
            }
          ?>
            <div class="hari <?= $kelasEvent ?>">
              <span><?= $hari; ?></span>
              <?php if (isset($events[$tanggal])): ?>
                <div class="event-popup">
                  <?php foreach ($events[$tanggal] as $ev): ?>
                    <p><strong><?= $ev['judul']; ?></strong><br><?= $ev['kategori']; ?></p>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endfor; ?>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- Keterangan Kalender -->
<div class="kalender-legend">
  <h4>Keterangan:</h4>
  <ul>
    <li><span class="box libur"></span> Libur</li>
    <li><span class="box ujian"></span> Ujian</li>
    <li><span class="box acara"></span> Acara Sekolah</li>
    <li><span class="box biasa"></span> Hari Biasa</li>
  </ul>
</div>

<?php include 'layout/footer.php'; ?>
