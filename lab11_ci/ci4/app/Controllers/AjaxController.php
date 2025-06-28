<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ArtikelModel;

class AjaxController extends Controller
{
    public function index()
    {
        $title = 'Daftar Artikel (AJAX)';
        return view('ajax/index', compact('title'));
    }

    public function getData()
    {
        $model = new ArtikelModel();
        $data = $model->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->findAll();

        return $this->response->setJSON($data);
    }

    public function tambah()
    {
        $model = new ArtikelModel();

        $data = [
            'judul'       => $this->request->getPost('judul'),
            'isi'         => $this->request->getPost('isi'),
            'slug'        => url_title($this->request->getPost('judul'), '-', true),
            'id_kategori' => $this->request->getPost('id_kategori')
        ];

        if ($model->insert($data)) {
            return $this->response->setJSON(['status' => 'OK']);
        } else {
            return $this->response->setJSON([
                'status' => 'ERROR',
                'message' => $model->errors()
            ]);
        }
    }

    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);

        return $this->response->setJSON(['status' => 'OK']);
    }

    public function getArtikel($id)
    {
        $model = new ArtikelModel();
        $data = $model->find($id);
        return $this->response->setJSON($data);
    }

    // public function update($id)
    // {
    //     $model = new ArtikelModel();
    //     $id = $this->request->getPost('id');

    //     $data = [
    //         'judul'       => $this->request->getPost('judul'),
    //         'isi'         => $this->request->getPost('isi'),
    //         'id_kategori' => $this->request->getPost('id_kategori')
    //     ];

    //     if ($model->update($id, $data)) {
    //         return $this->response->setJSON(['status' => 'OK']);
    //     } else {
    //         return $this->response->setJSON([
    //             'status' => 'ERROR',
    //             'message' => $model->errors()
    //         ]);
    //     }
    // }

    // public function update($id)
    // {
    //     $model = new ArtikelModel();

    //     $data = [
    //         'judul'       => $this->request->getPost('judul'),
    //         'isi'         => $this->request->getPost('isi'),
    //         'id_kategori' => $this->request->getPost('id_kategori')
    //     ];

    //     if ($model->update($id, $data)) {
    //         return $this->response->setJSON(['status' => 'OK']);
    //     } else {
    //         return $this->response->setJSON([
    //             'status' => 'ERROR',
    //             'message' => $model->errors()
    //         ]);
    //     }
    // }

    public function update($id)
    {
        $model = new ArtikelModel();

        $data = $this->request->getJSON(true); // <--- kalau kirim JSON

        if ($model->update($id, $data)) {
            return $this->response->setJSON(['status' => 'OK']);
        } else {
            return $this->response->setJSON([
                'status' => 'ERROR',
                'message' => $model->errors()
            ]);
        }
    }
}
