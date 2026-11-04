<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Harga;
use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $location = Lokasi::all();

        return view('page-main.main', compact('location'));
    }

    public function visimisi(){
        return view('page-submain.visi');
    }

    public function legalitas(){
        return view('page-submain.legalitas');
    }

    public function harga(){
        $raw = Harga::get()->groupBy('jenis');

        $data = (object) [
            'B40' => $raw[1] ?? [],
            'HSFO' => $raw[2] ?? [],
            'LSFO' => $raw[3] ?? [],
        ];

        return view('page-submain.harga', compact('data'));
    }

    public function galery(){
        $data = Galeri::all();

        return view('page-submain.galeryFull', compact('data'));
    }

    public function contact(){
        $user = User::find(1);

        return view('page-submain.kontak', compact('user'));
    }
}
