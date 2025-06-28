<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;


class Artikel extends BaseController
{
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new \App\Models\ArtikelModel();
        $artikel = $model->getArtikelDenganKategori(true);
        $pager = \Config\Services::pager();

        return view('artikel/index', compact('artikel', 'title', 'pager'));
    }

    public function kategori($slugKategori)
    {
        $title = 'Artikel ' . ucfirst($slugKategori);
        $model = new ArtikelModel();
        $artikel = $model->getArtikelDenganKategori(false, $slugKategori);

        $pager = \Config\Services::pager();

        return view('artikel/index', [
            'title' => $title,
            'artikel' => $artikel,
            'pager' => $pager
        ]);
    }

    public function view($slug)
    {
        $model = new \App\Models\ArtikelModel();

        // Gunakan getArtikelDenganKategori() untuk ambil info kategori juga
        $artikel = $model->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->where('slug', $slug)
            ->first();

        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $title = $artikel['judul'];
        return view('artikel/detail', compact('artikel', 'title'));
    }

    // ini kode sebelum praktikum 9
    // public function admin_index()
    // {
    //     $title = 'Daftar Artikel (Admin)';
    //     $model = new ArtikelModel();

    //     $q = $this->request->getVar('q') ?? '';
    //     $kategori_id = $this->request->getVar('kategori_id') ?? '';
    //     $page = $this->request->getVar('page') ?? 1;

    //     $builder = $model->table('artikel')
    //         ->select('artikel.*, kategori.nama_kategori')
    //         ->join('kategori', 'kategori.id_kategori = artikel.id_kategori');

    //     if ($q != '') {
    //         $builder->like('artikel.judul', $q);
    //     }
    //     if ($kategori_id != '') {
    //         $builder->where('artikel.id_kategori', $kategori_id);
    //     }

    //     $artikel = $builder->paginate(10, 'default', $page);
    //     $pager = $model->pager;

    //     $data = [
    //         'title' => $title,
    //         'q' => $q,
    //         'kategori_id' => $kategori_id,
    //         'artikel' => $artikel,
    //         'pager' => $pager
    //     ];

    //     if ($this->request->isAJAX()) {
    //         return $this->response->setJSON($data);
    //     } else {
    //         $kategoriModel = new KategoriModel();
    //         $data['kategori'] = $kategoriModel->findAll();
    //         return view('artikel/admin_index', $data);
    //     }
    // }

    // ini kode ketika praktikum 9
    public function admin_index()
    {
        $title = 'Daftar Artikel (Admin)';
        $model = new ArtikelModel();

        $q = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';
        $sort = $this->request->getVar('sort') ?? '';
        $page = $this->request->getVar('page') ?? 1;

        $builder = $model->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori');

        if ($q != '') {
            $builder->like('artikel.judul', $q);
        }

        if ($kategori_id != '') {
            $builder->where('artikel.id_kategori', $kategori_id);
        }

        // Sorting logic
        if ($sort == 'judul_asc') {
            $builder->orderBy('artikel.judul', 'asc');
        } elseif ($sort == 'judul_desc') {
            $builder->orderBy('artikel.judul', 'desc');
        } else {
            $builder->orderBy('artikel.id', 'desc'); // Default: terbaru
        }

        $artikel = $builder->paginate(10, 'default', $page);
        $pager = $model->pager;

        $data = [
            'title'       => $title,
            'q'           => $q,
            'kategori_id' => $kategori_id,
            'sort'        => $sort,
            'artikel'     => $artikel,
            'pager'       => $pager
        ];

        if ($this->request->isAJAX()) {
            return $this->response->setJSON($data);
        } else {
            $kategoriModel = new KategoriModel();
            $data['kategori'] = $kategoriModel->findAll();
            return view('artikel/admin_index', $data);
        }
    }

    // public function admin_index()
    // {
    //     $title = 'Daftar Artikel (Admin)';
    //     $model = new ArtikelModel();
    //     $q = $this->request->getVar('q') ?? '';
    //     $kategori_id = $this->request->getVar('kategori_id') ?? '';
    //     $page = $this->request->getVar('page') ?? 1;

    //     $builder = $model->table('artikel')
    //         ->select('artikel.*, kategori.nama_kategori')
    //         ->join('kategori', 'kategori.id_kategori = artikel.id_kategori');

    //     if ($q != '') {
    //         $builder->like('artikel.judul', $q);
    //     }

    //     if ($kategori_id != '') {
    //         $builder->where('artikel.id_kategori', $kategori_id);
    //     }

    //     $artikel = $builder->paginate(10, 'default', $page);
    //     $pager = $model->pager;

    //     $data = [
    //         'title'       => $title,
    //         'q'           => $q,
    //         'kategori_id' => $kategori_id,
    //         'artikel'     => $artikel,
    //         'pager'       => $pager
    //     ];

    //     if ($this->request->isAJAX()) {
    //         // Return data dalam bentuk JSON
    //         return $this->response->setJSON($data);
    //     } else {
    //         // Tampilkan view biasa
    //         $kategoriModel = new KategoriModel();
    //         $data['kategori'] = $kategoriModel->findAll();
    //         return view('artikel/admin_index', $data);
    //     }
    // }

    // public function admin_index()
    // {
    //     $title = 'Daftar Artikel (Admin)';
    //     $model = new ArtikelModel();
    //     $q = $this->request->getVar('q') ?? '';
    //     $kategori_id = $this->request->getVar('kategori_id') ?? '';
    //     $page = $this->request->getVar('page') ?? 1;

    //     $builder = $model->table('artikel')
    //         ->select('artikel.*, kategori.nama_kategori')
    //         ->join('kategori', 'kategori.id_kategori = artikel.id_kategori');

    //     if ($q != '') {
    //         $builder->like('artikel.judul', $q);
    //     }

    //     if ($kategori_id != '') {
    //         $builder->where('artikel.id_kategori', $kategori_id);
    //     }

    //     $artikel = $builder->paginate(10, 'default', $page);
    //     $pager = $model->pager;

    //     if ($this->request->isAJAX()) {
    //         return $this->response->setJSON([
    //             'artikel' => json_decode(json_encode($artikel), true),
    //             'pager'   => [
    //                 'links' => json_decode(json_encode($pager->links()), true),
    //             ],
    //             'q' => $q,
    //             'kategori_id' => $kategori_id
    //         ]);
    //     } else {
    //         $kategoriModel = new KategoriModel();
    //         return view('artikel/admin_index', [
    //             'title'       => $title,
    //             'q'           => $q,
    //             'kategori_id' => $kategori_id,
    //             'artikel'     => $artikel,
    //             'pager'       => $pager,
    //             'kategori'    => $kategoriModel->findAll()
    //         ]);
    //     }
    // }

    public function add()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'isi' => 'required', // Tambah validasi untuk isi
            'id_kategori' => 'required|is_natural_no_zero' // Ganti kategori dengan id_kategori
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $file = $this->request->getFile('gambar');
            $namaFile = $file->getName();
            if ($file->isValid() && !$file->hasMoved()) {
                $file->move(ROOTPATH . 'public/gambar');
            }

            $artikel = new ArtikelModel();
            $artikel->insert([
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul')),
                'id_kategori' => $this->request->getPost('id_kategori'), // Ganti kategori dengan id_kategori
                'gambar' => $namaFile
            ]);
            return redirect()->to('admin/artikel')->with('success', 'Artikel berhasil ditambahkan'); // Tambah pesan sukses
        }

        $kategoriModel = new \App\Models\KategoriModel();
        $kategori = $kategoriModel->findAll();

        return view('artikel/form_add', [
            'title'    => 'Tambah Artikel',
            'kategori' => $kategori,
            'validation' => $validation // jika validasi digunakan

        ]);
    }

    public function edit($id)
    {
        $artikel = new \App\Models\ArtikelModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'id_kategori' => 'required' // Tambah validasi kategori
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $artikel->update($id, [
                'judul'        => $this->request->getPost('judul'),
                'isi'          => $this->request->getPost('isi'),
                'id_kategori'  => $this->request->getPost('id_kategori') // Simpan kategori ID
            ]);
            return redirect()->to('admin/artikel'); // Redirect ke halaman admin
        }

        // Ambil data lama
        $data = $artikel->where('id', $id)->first();
        $title = "Edit Artikel";

        $kategoriModel = new \App\Models\KategoriModel();
        $kategori = $kategoriModel->findAll();

        return view('artikel/form_edit', compact('title', 'data', 'kategori'));
    }

    public function delete($id)
    {
        $artikel = new ArtikelModel();
        $artikel->delete($id);
        return redirect('admin/artikel');
    }
}
