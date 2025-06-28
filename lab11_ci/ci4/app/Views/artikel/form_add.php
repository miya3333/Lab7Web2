<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>

<body>

    <?= $this->include('template/admin_header'); ?>

    <div class="form-add">
        <h2><?= esc($title); ?></h2>

        <form action="" method="post" enctype="multipart/form-data">
            <p>
                <label for="judul">Judul</label><br>
                <input type="text" name="judul" id="judul" required>
            </p>
            <p>
                <label for="isi">Isi</label><br>
                <textarea name="isi" id="isi" cols="50" rows="10"></textarea>
            </p>
            <p>
                <label for="id_kategori">Kategori</label><br>
                <select name="id_kategori" id="id_kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $k): ?>
                    <option value="<?= esc($k['id_kategori']); ?>"><?= esc($k['nama_kategori']); ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="gambar">Upload Gambar</label>
                <br>
                <input type="file" name="gambar" id="gambar">
                <!-- <input type="file" name="gambar" id="gambar" accept="image/*"> -->
            </p>
            <p>
                <input type="submit" value="Kirim" class="btn btn-large">
            </p>
        </form>
    </div>

    <?= $this->include('template/admin_footer'); ?>

</body>

</html>