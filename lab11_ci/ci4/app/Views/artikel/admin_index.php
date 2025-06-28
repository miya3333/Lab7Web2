<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?= $this->include('template/admin_header'); ?>

    <div class="judul-admin">
        <h2 class="sub-admin"><?= $title; ?></h2>

        <!-- Form Search -->
        <div class="row mb-3">
            <div class="col-md-6">
                <form id="search-form" class="form-inline">
                    <input type="text" name="q" id="search-box" value="<?= esc($q); ?>" placeholder="Cari judul artikel"
                        class="form-control mr-2">

                    <select name="kategori_id" id="category-filter" class="form-control mr-2">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k['id_kategori']; ?>"
                                <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                                <?= esc($k['nama_kategori']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="sort" id="sort-filter" class="form-control mr-2">
                        <option value="">Urutkan</option>
                        <option value="judul_asc" <?= $sort == 'judul_asc' ? 'selected' : ''; ?>>Judul A-Z</option>
                        <option value="judul_desc" <?= $sort == 'judul_desc' ? 'selected' : ''; ?>>Judul Z-A</option>
                    </select>

                    <input type="submit" value="Cari" class="btn btn-primary">
                </form>
            </div>
        </div>

        <!-- Spinner -->
        <div id="loading" style="display: none; text-align:center; margin: 20px 0;">
            <div class="spinner-border text-primary" role="status"></div>
            <p style="margin-top:10px;">Memuat data...</p>
        </div>

        <!-- Artikel Table dan Pagination -->
        <div id="article-container" style="margin-top: 20px;"></div>
        <div id="pagination-container" style="margin-top: 20px;"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const BASE_URL = '<?= base_url(); ?>';

        $(document).ready(function() {
            const articleContainer = $('#article-container');
            const paginationContainer = $('#pagination-container');
            const searchForm = $('#search-form');
            const searchBox = $('#search-box');
            const categoryFilter = $('#category-filter');
            const sortFilter = $('#sort-filter');
            const loadingIndicator = $('#loading');

            const fetchData = (url, showLoading = true) => {
                const q = searchBox.val();
                const kategori_id = categoryFilter.val();
                const sort = sortFilter.val();

                if (showLoading) loadingIndicator.show();

                $.ajax({
                    url: `${url}&q=${q}&kategori_id=${kategori_id}&sort=${sort}`,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(data) {
                        renderArticles(data.artikel);
                        renderPagination(data.pager, data.q, data.kategori_id, data.sort);
                    },
                    error: function() {
                        articleContainer.html('<p class="text-danger">Gagal memuat data.</p>');
                    },
                    complete: function() {
                        if (showLoading) loadingIndicator.hide();
                    }
                });
            };

            const renderArticles = (articles) => {
                let html = '<table class="table">';
                html +=
                    '<thead><tr><th>ID</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr></thead><tbody>';

                if (articles.length > 0) {
                    articles.forEach(article => {
                        html += `
                        <tr>
                            <td>${article.id}</td>
                            <td>
                                <b>${article.judul}</b>
                                <p><small>${article.isi.substring(0, 50)}...</small></p>
                            </td>
                            <td>${article.nama_kategori}</td>
                            <td>${article.status ?? '-'}</td>
                            <td>
                                <a class="btn btn-sm btn-info" href="${BASE_URL}admin/artikel/edit/${article.id}">Ubah</a>
                                <a class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data?');" href="${BASE_URL}admin/artikel/delete/${article.id}">Hapus</a>
                            </td>
                        </tr>
                    `;
                    });
                } else {
                    html += '<tr><td colspan="5">Tidak ada data.</td></tr>';
                }

                html += '</tbody></table>';
                articleContainer.html(html);
            };

            const renderPagination = (pager, q, kategori_id, sort) => {
                if (!pager || !pager.links) return;

                let html = '<nav><ul class="pagination">';
                pager.links.forEach(link => {
                    const url = link.url ?
                        `${link.url}&q=${q}&kategori_id=${kategori_id}&sort=${sort}` : '#';
                    html += `<li class="page-item ${link.active ? 'active' : ''}">
                            <a class="page-link" href="${url}">${link.title}</a>
                         </li>`;
                });
                html += '</ul></nav>';
                paginationContainer.html(html);
            };

            searchForm.on('submit', function(e) {
                e.preventDefault();
                const q = searchBox.val();
                const kategori_id = categoryFilter.val();
                const sort = sortFilter.val();
                fetchData(`${BASE_URL}admin/artikel?q=${q}&kategori_id=${kategori_id}&sort=${sort}`);
            });

            categoryFilter.on('change', () => searchForm.trigger('submit'));
            sortFilter.on('change', () => searchForm.trigger('submit'));

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');
                if (url && url !== '#') fetchData(url);
            });

            // Load awal
            fetchData(`${BASE_URL}admin/artikel?page=1`, false);
        });
    </script>

    <?= $this->include('template/admin_footer'); ?>

</body>

</html>