<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class BarangController extends Controller
{
    public function index() {
        $barangs = Barang::all();
        $kategoris = Kategori::all();
        return view('admin.daftarbarang', compact('barangs', 'kategoris'));
    }
    public function catalog() {
        $barangs = Barang::all();
        return view('user.dashboard', compact('barangs'));
    }

    public function create() {
        $kategoris = Kategori::all();
        return view('admin.barang.create', compact('kategoris'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_barang' => 'required|min:5|max:80',
            'harga_barang' => 'required|integer',
            'jumlah_barang' => 'required|integer',
            'kategori_id' => 'required',
            'foto_barang' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->jumlah_barang = $request->jumlah_barang;
        $barang->kategori_id = $request->kategori_id;
    
        if($request->hasFile('foto_barang')) {
            $fileName = time().'_'.$request->foto_barang->getClientOriginalName();
            $filePath = $request->file('foto_barang')->storeAs('public/uploads', $fileName);
            $barang->foto_barang = 'uploads/' . $fileName;
        }
    
        $barang->save();
    
        return response()->json(['success' => true]);    
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga_barang' => 'required|numeric',
            'jumlah_barang' => 'required|integer',
            'kategori_id' => 'required|integer|exists:kategoris,id',
        ]);
        $barang = Barang::findOrFail($id);

        $barang->update([
            'nama_barang' => $request->input('nama_barang'),
            'harga_barang' => $request->input('harga_barang'),
            'jumlah_barang' => $request->input('jumlah_barang'),
            'kategori_id' => $request->input('kategori_id'),
        ]);

        if ($request->hasFile('foto_barang')) {
            $file = $request->file('foto_barang');
            $path = $file->store('img', 'public');
            $barang->foto_barang = $path;
        }
        $barang->save();


        return response()->json(['success' => true]);    
    }


    public function __construct(){
        $this->middleware('admin');
    }


    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        $barang->delete();

        return redirect()->back()->with('success', 'Barang berhasil dihapus.');
    }


}
