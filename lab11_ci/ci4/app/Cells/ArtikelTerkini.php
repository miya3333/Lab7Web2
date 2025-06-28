<?php

namespace App\Cells;

use App\Models\ArtikelModel;

class ArtikelTerkini
{
    public function tampil($kategori = null)
    {
        $model = new ArtikelModel();

        if (!empty($kategori) && is_array($kategori)) {
            $model->whereIn('kategori', $kategori);
        } elseif (!empty($kategori)) {
            $model->where('kategori', $kategori);
        }

        $artikel = $model->orderBy('created_at', 'DESC')->findAll(5);

        return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}
