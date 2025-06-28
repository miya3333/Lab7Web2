<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'My Website' ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>

<body>
    <?php
    $model = new \App\Models\ArtikelModel();
    $artikel = $model->select('artikel.*, kategori.nama_kategori')
        ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
        ->where('status', 'published')
        ->orderBy('created_at', 'DESC')
        ->limit(5)
        ->find();
    ?>
    <div class="widget-box">
        <h3 class="title">Artikel Terkini</h3>
        <ul>
            <?php foreach ($artikel as $row): ?>
                <li>
                    <a href="<?= base_url('/artikel/' . $row['slug']) ?>"><?= $row['judul'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>