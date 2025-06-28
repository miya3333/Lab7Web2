<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home', [
            'title'   => 'Beranda',
            'content' => 'Selamat datang di halaman utama.'
        ]);
    }
}