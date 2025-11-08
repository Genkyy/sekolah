  <?php include 'layout/header.php'; ?>

  <section class="fasilitas-container">
    <div class="fasilitas-header">
      <h1>Fasilitas <span>SMA Pertiwi Medan</span></h1>
      <p>Kami menyediakan berbagai fasilitas pendukung pembelajaran yang nyaman, lengkap, dan modern untuk mendukung kegiatan akademik maupun non-akademik siswa.</p>
    </div>

    <!-- FASILITAS AKADEMIK -->
    <div class="fasilitas-kategori" data-category="akademik">
      <h2><i class="fas fa-chalkboard"></i> Fasilitas Akademik</h2>
      <div class="fasilitas-img-box">
        <img src="assets/images/lapangan.jpg" alt="Fasilitas Akademik" class="fasilitas-img" id="img-akademik">
      </div>
      <div class="fasilitas-grid">
                <div class="fasilitas-card" data-img="assets/images/kelas5.jpg">Ruang Kelas X E1</div>
        <div class="fasilitas-card" data-img="assets/images/kelas6.jpg">Ruang Kelas X E2</div>
        <div class="fasilitas-card" data-img="assets/images/kelas7.jpg">Ruang Kelas XII IS</div>
        <div class="fasilitas-card" data-img="assets/images/lapangan.jpg">Ruang Kelas XI Ki Hajar Dewantara</div>
        <div class="fasilitas-card" data-img="assets/images/kebersihan.jpg">Ruang Kelas XI Ibnu Sina</div>
        <div class="fasilitas-card" data-img="assets/images/libur.jpeg">Ruang Kelas XI Archimedes</div>
        <div class="fasilitas-card" data-img="assets/images/kelas4.jpg">Ruang Kelas XI Auguste Comte</div>
        <div class="fasilitas-card" data-img="assets/images/aula.jpg">Aula Sekolah</div>
      </div>
    </div>

    <!-- LABORATORIUM -->
    <div class="fasilitas-kategori" data-category="lab">
      <h2><i class="fas fa-flask"></i> Laboratorium & Penunjang</h2>
      <div class="fasilitas-img-box">
        <img src="assets/images/labtik.jpg" alt="Laboratorium Sekolah" class="fasilitas-img" id="img-lab">
      </div>
      <div class="fasilitas-grid">
        <div class="fasilitas-card" data-img="assets/images/labtik.jpg">Lab. TIK</div>
        <div class="fasilitas-card" data-img="assets/images/labbahasa.jpg">Lab. Bahasa</div>
        <div class="fasilitas-card" data-img="assets/images/labkimia.jpg">Lab. Kimia/Biologi</div>
        <div class="fasilitas-card" data-img="assets/images/labfisika.jpg">Lab. Fisika</div>
        <div class="fasilitas-card" data-img="assets/images/labmusik.jpg">Lab. Musik</div>
        <div class="fasilitas-card" data-img="assets/images/perpus.jpeg">Perpustakaan</div>
      </div>
    </div>

    <!-- ADMINISTRASI -->
    <div class="fasilitas-kategori" data-category="admin">
      <h2><i class="fas fa-briefcase"></i> Ruang Administrasi & Tenaga Pendidik</h2>
      <div class="fasilitas-img-box">
        <img src="assets/images/kantor.jpg" alt="Administrasi Sekolah" class="fasilitas-img" id="img-admin">
      </div>
      <div class="fasilitas-grid">
        <div class="fasilitas-card" data-img="assets/images/kantor.jpg">Kantor</div>
        <div class="fasilitas-card" data-img="assets/images/kepsek.jpg">Ruang Kepala Sekolah</div>
        <div class="fasilitas-card" data-img="assets/images/tu.jpg">Ruang TU</div>
        <div class="fasilitas-card" data-img="assets/images/guru.jpg">Ruang Guru</div>
        <div class="fasilitas-card" data-img="assets/images/wakilkepsek.jpg">Ruang Wakil Kepala Sekolah</div>
        <div class="fasilitas-card" data-img="assets/images/bk.jpg">Ruang BK</div>
        <div class="fasilitas-card" data-img="assets/images/osis.jpg">Ruang OSIS</div>
        <div class="fasilitas-card" data-img="assets/images/galeri.jpg">Ruang Galeri</div>
        <div class="fasilitas-card" data-img="assets/images/koperasi.jpg">Ruang Koperasi</div>
      </div>
    </div>

    <!-- FASILITAS UMUM -->
    <div class="fasilitas-kategori" data-category="umum">
      <h2><i class="fas fa-building"></i> Fasilitas Umum</h2>
      <div class="fasilitas-img-box">
        <img src="assets/images/musholla.jpg" alt="Fasilitas Umum" class="fasilitas-img" id="img-umum">
      </div>
      <div class="fasilitas-grid">
        <div class="fasilitas-card" data-img="assets/images/musholla.jpg">Musholla</div>
        <div class="fasilitas-card" data-img="assets/images/uks.jpg">UKS</div>
        <div class="fasilitas-card" data-img="assets/images/gudang.jpg">Gudang Lantai 1 & 2</div>
        <div class="fasilitas-card" data-img="assets/images/toiletkepsek.jpg">Toilet Kepala Sekolah</div>
        <div class="fasilitas-card" data-img="assets/images/toiletsiswa.jpg">Toilet Siswa & Guru Lantai 1-2</div>
      </div>
    </div>
  </section>

  <script>
    document.querySelectorAll('.fasilitas-kategori').forEach(kategori => {
      const imgTag = kategori.querySelector('.fasilitas-img');
      kategori.querySelectorAll('.fasilitas-card').forEach(card => {
        card.addEventListener('click', () => {
          const newImg = card.getAttribute('data-img');
          if (newImg) {
            imgTag.classList.add('fade-out');
            setTimeout(() => {
              imgTag.src = newImg;
              imgTag.classList.remove('fade-out');
            }, 300);
          }
        });
      });
    });
  </script>

  <?php include 'layout/footer.php'; ?>
