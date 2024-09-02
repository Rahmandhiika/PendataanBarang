<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class UserController extends Controller
{
    public function index() {
        $barangs = Barang::with('kategori')->get();
        return view('user.dashboard', compact('barangs'));
    }

}
