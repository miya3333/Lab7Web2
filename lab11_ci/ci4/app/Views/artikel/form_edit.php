<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>

<body>

    <?= $this->include('template/admin_header'); ?>

    <div class="form-edit">

        <h2><?= esc($title); ?></h2>

        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <p>
                <label for="judul">Judul</label><br>
                <input type="text" name="judul" id="judul" value="<?= esc($artikel['judul'] ?? $data['judul']); ?>"
                    required>
            </p>
            <p>
                <label for="isi">Isi</label><br>
                <textarea name="isi" id="isi" cols="50"
                    rows="10"><?= esc($artikel['isi'] ?? $data['isi']); ?></textarea>
            </p>
            <p>
                <label for="id_kategori">Kategori</label><br>
                <select name="id_kategori" id="id_kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $k):
                        $selected_id = $artikel['id_kategori'] ?? $data['id_kategori'] ?? null;
                    ?>
                        <option value="<?= esc($k['id_kategori']); ?>"
                            <?= ($selected_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                            <?= esc($k['nama_kategori']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="gambar">Ganti Gambar (opsional)</label><br>
                <input type="file" name="gambar" id="gambar" accept="image/*">
            </p>
            <?php if (!empty($artikel['gambar'])): ?>
                <p>
                    <label>Gambar Saat Ini:</label><br>
                    <img src="<?= base_url('/gambar/' . $artikel['gambar']); ?>" alt="gambar artikel"
                        style="max-width: 200px;">
                </p>
            <?php endif; ?>
            <p><input type="submit" value="Kirim" class="btn btn-large"></p>
        </form>

    </div>

    <?= $this->include('template/admin_footer'); ?>

</body>

</html>