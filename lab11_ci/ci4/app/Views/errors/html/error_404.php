<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>404 Halaman Tidak Ditemukan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        h1 {
            font-size: 50px;
        }

        body {
            font: 20px Helvetica, sans-serif;
            color: #333;
        }

        article {
            display: block;
            text-align: left;
            max-width: 650px;
            margin: 0 auto;
        }

        a {
            color: #dc8100;
            text-decoration: none;
        }

        a:hover {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <article>
        <h1>404 - Halaman Tidak Ditemukan</h1>
        <div>
            <?php if (isset($message) && ENVIRONMENT !== 'production'): ?>
                <p><?= nl2br(esc($message)) ?></p>
            <?php else: ?>
                <p>Maaf, halaman yang Anda cari tidak dapat ditemukan.</p>
            <?php endif; ?>
            <p><a href="<?= base_url() ?>">Kembali ke halaman utama</a></p>
        </div>
    </article>
</body>

</html>