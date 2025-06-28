<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'judul',
        'isi',
        'status',
        'slug',
        'gambar',
        'id_kategori'
    ];
    public function getArtikelDenganKategori() // kode utama
    {
        return $this->db->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori')
            ->get()
            ->getResultArray();
    }
    // public function getArtikelDenganKategori()
    // {
    //     return $this->select('artikel.*, kategori.nama_kategori')
    //         ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
    //         ->where('artikel.status', 'published')
    //         ->orderBy('artikel.created_at', 'DESC')
    //         ->findAll();
    // }
}
