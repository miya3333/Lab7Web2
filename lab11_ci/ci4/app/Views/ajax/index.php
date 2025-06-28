<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>

<body>
    <?= $this->include('template/admin_header'); ?>

    <!-- <h2 class="sub-judul">Daftar Artikel (AJAX)</h2>
<hr>

<div class="form-container">
    <h3 class="form-title-inside" id="formTitle">Tambah Artikel</h3>

    <form id="form-artikel">
        <input type="hidden" name="id" id="artikel_id">

        <div class="form-group">
            <label for="judul">Judul Artikel</label>
            <input type="text" name="judul" id="judul" required>
        </div>

        <div class="form-group">
            <label for="isi">Isi Artikel</label>
            <textarea name="isi" id="isi" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select name="id_kategori" id="id_kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="101">Umum</option>
                <option value="102">Teknologi</option>
            </select>
        </div>

        <button type="submit" class="btn-primary" id="submitBtn">Tambah</button>
    </form>
</div>

<br>

<table class="table" id="artikelTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table> -->

    <!-- ini teks edit biar ga perlu ribet edit css wkwk -->
    <h2 class="sub-judul">Daftar Artikel (AJAX)</h2>
    <hr>

    <!-- Form Tambah/Edit Artikel -->
    <article class="entry konten-artikel">
        <div class="judul-kategori">
            <h3 class="form-title-inside" id="formTitle">Tambah Artikel</h3>
        </div>

        <form id="form-artikel" class="isi-konten" style="flex-direction: column;">
            <input type="hidden" name="id" id="artikel_id">

            <div class="form-group">
                <label for="judul">Judul Artikel</label>
                <input type="text" name="judul" id="judul" required>
            </div>

            <div class="form-group">
                <label for="isi">Isi Artikel</label>
                <textarea name="isi" id="isi" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="id_kategori">Kategori</label>
                <select name="id_kategori" id="id_kategori" required class="kategori">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="102">Umum</option>
                    <option value="101">Teknologi</option>
                </select>
            </div>

            <button type="submit" class="btn-primary" id="submitBtn">Tambah</button>
        </form>
    </article>

    <br>

    <!--  Tabel Artikel -->
    <article class="konten-artikel">
        <div class="judul-kategori">
            <h3>Data Artikel</h3>
        </div>
        <div class="isi-konten" style="flex-direction: column;">
            <table class="table" id="artikelTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </article>


    <script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            function loadData() {
                $('#artikelTable tbody').html('<tr><td colspan="4">Loading...</td></tr>');
                $.ajax({
                    url: "<?= base_url('ajax/getData') ?>",
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        let html = '';
                        data.forEach(function(row) {
                            html += '<tr>';
                            html += '<td>' + row.id + '</td>';
                            html += '<td>' + row.judul + '</td>';
                            html += '<td>' + (row.nama_kategori ?? '-') + '</td>';
                            html += '<td>';
                            html += '<a href="#" class="btn btn-primary btn-edit" data-id="' +
                                row
                                .id + '">Edit</a> ';
                            html += '<a href="#" class="btn btn-danger btn-delete" data-id="' +
                                row
                                .id + '">Hapus</a>';
                            html += '</td></tr>';
                        });
                        $('#artikelTable tbody').html(html);
                    }
                });
            }

            loadData();

            $('#form-artikel').on('submit', function(e) {
                e.preventDefault();
                const id = $('#artikel_id').val();
                const url = id ? "<?= base_url('ajax/update') ?>" : "<?= base_url('ajax/tambah') ?>";

                $.ajax({
                    url: url,
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(res) {
                        if (res.status === 'OK') {
                            $('#form-artikel')[0].reset();
                            $('#artikel_id').val('');
                            $('#submitBtn').text('Tambah');
                            $('#formTitle').text('Tambah Artikel');
                            loadData();
                        } else {
                            alert('Gagal menyimpan data: ' + JSON.stringify(res.message));
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX ERROR:", status, error);
                        console.error("Response Text:", xhr.responseText);
                        alert('Terjadi kesalahan saat mengirim data.');
                    }
                });
            });

            $(document).on('click', '.btn-edit', function() {
                const id = $(this).data('id');
                $.get("<?= base_url('ajax/getArtikel/') ?>" + id, function(data) {
                    $('#artikel_id').val(data.id);
                    $('#judul').val(data.judul);
                    $('#isi').val(data.isi);
                    $('#id_kategori').val(data.id_kategori);
                    $('#submitBtn').text('Update');
                    $('#formTitle').text('Edit Artikel');
                });
            });

            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                if (confirm('Yakin ingin menghapus artikel ini?')) {
                    $.ajax({
                        url: "<?= base_url('ajax/delete/') ?>" + id,
                        method: "DELETE",
                        success: function() {
                            loadData();
                        }
                    });
                }
            });
        });
    </script>

    <?= $this->include('template/admin_footer'); ?>

</body>

</html>