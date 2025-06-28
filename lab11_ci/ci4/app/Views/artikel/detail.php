<?= $this->include('template/header'); ?>

<article class="detail-konten">
    <h2>
        <?= $artikel['judul']; ?>
    </h2>

    <p class="kategori">
        <strong>Kategori:</strong> <?= esc($artikel['nama_kategori']); ?>
    </p>

    <img src="<?= base_url('/gambar/' . $artikel['gambar']); ?>" alt="<?= $artikel['judul']; ?>" class="gambar">

    <p class="isi">
        <?= $artikel['isi']; ?>
    </p>
</article>

<?= $this->include('template/footer'); ?>