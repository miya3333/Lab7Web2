<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>

<body>

    <?= $this->include('template/admin_header'); ?>

    <div class="judul-admin">
        <h2 class="sub-admin"><?= $title; ?></h2>

        <div class="row mb-3">
            <div class="col-md-6">
                <form method="get" class="form-inline">
                    <input type="text" name="q" value="<?= esc($q); ?>" placeholder="Cari judul artikel"
                        class="form-control mr-2">
                    <select name="kategori_id" class="form-control mr-2">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= esc($k['id_kategori']); ?>"
                                <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                                <?= esc($k['nama_kategori']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" value="Cari" class="btn btn-primary">
                </form>
            </div>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($artikel && count($artikel) > 0): ?>
                    <?php foreach ($artikel as $row): ?>
                        <tr>
                            <td><?= esc(is_object($row) ? $row->id : $row['id']); ?></td>
                            <td>
                                <b><?= esc(is_object($row) ? $row->judul : $row['judul']); ?></b>
                                <p><small><?= esc(substr(is_object($row) ? $row->isi : $row['isi'], 0, 50)); ?></small></p>
                            </td>
                            <td><?= esc(is_object($row) ? $row->nama_kategori : $row['nama_kategori'] ?? '-'); ?></td>
                            <td><?= esc(is_object($row) ? $row->status : $row['status']); ?></td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                    href="<?= base_url('/admin/artikel/edit/' . (is_object($row) ? $row->id : $row['id'])); ?>">Ubah</a>
                                <a class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data?');"
                                    href="<?= base_url('/admin/artikel/delete/' . (is_object($row) ? $row->id : $row['id'])); ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Tidak ada data.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?= $pager->only(['q', 'kategori_id'])->links(); ?>

    </div>

    <?= $this->include('template/admin_footer'); ?>

</body>

</html>