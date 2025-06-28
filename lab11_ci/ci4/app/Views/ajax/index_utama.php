<?= $this->include('template/admin_header'); ?>

<h2 class="sub-judul">Daftar Artikel (AJAX)</h2>
<hr>

<!--  Form Tambah/Edit Artikel -->
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
                <option value="1">Umum</option>
                <option value="2">Teknologi</option>
            </select>
        </div>

        <button type="submit" class="btn-primary" id="submitBtn">Tambah</button>
    </form>
</div>

<br>

<!--  Tabel Artikel -->
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

<!--  jQuery -->
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
                        html += '<a href="#" class="btn btn-primary btn-edit" data-id="' + row
                            .id + '">Edit</a> ';
                        html += '<a href="#" class="btn btn-danger btn-delete" data-id="' + row
                            .id + '">Hapus</a>';
                        html += '</td></tr>';
                    });
                    $('#artikelTable tbody').html(html);
                }
            });
        }

        loadData();

        //  Tambah/Update
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
                        alert('Gagal menyimpan data');
                    }
                }
            });
        });

        //  Edit
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

        //  Hapus
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