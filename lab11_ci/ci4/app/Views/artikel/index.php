<?= $this->include('template/header'); ?>

<?php if ($artikel): foreach ($artikel as $row): ?>
<article class="entry konten-artikel">
    <div class="judul-kategori">
        <h2>
            <a href="<?= base_url('/artikel/' . $row['slug']); ?>">
                <?= esc($row['judul']); ?>
            </a>
        </h2>

        <?php if (!empty($row['nama_kategori'])): ?>
        <p class="kategori"><strong>Kategori:</strong> <?= esc($row['nama_kategori']); ?></p>
        <?php endif; ?>
    </div>

    <div class="isi-konten">
        <?php if (!empty($row['gambar'])): ?>
        <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" alt="<?= esc($row['judul']); ?>"
            style="max-width: 300px; height: auto;">
        <?php endif; ?>

        <p class="konten"><?= esc(substr($row['isi'], 0, 200)); ?>...</p>
    </div>

    <a href="<?= base_url('/artikel/' . $row['slug']); ?>" class="selengkapnya">
        Baca Selengkapnya...
    </a>
</article>

<!-- <hr class="divider" /> -->

<?php endforeach;
else: ?>
<article class="entry">
    <h2>Belum ada data.</h2>
</article>
<?php endif; ?>

<?= $this->include('template/footer'); ?>