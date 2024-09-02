<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fraktur;
use App\Models\Barang;
use Illuminate\Support\Str;
use PDF;

class FrakturController extends Controller
{
    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Please login to add items to the cart'], 401);
        }

        $user_id = Auth::id();
        $barang_id = $request->input('barang_id');
        $quantity = $request->input('quantity', 1);

        if (!$barang_id) {
            return response()->json(['message' => 'Barang ID is required'], 400);
        }

        $barang = Barang::find($barang_id);

        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        if ($barang->jumlah_barang < $quantity) {
            return response()->json(['message' => 'Stok tidak mencukupi'], 400);
        }

        $fraktur = Fraktur::where('user_id', $user_id)->where('barang_id', $barang_id)->first();

        if ($fraktur) {
            $fraktur->quantity += $quantity;
            $fraktur->save();
        } else {
            Fraktur::create([
                'user_id' => $user_id,
                'barang_id' => $barang_id,
                'quantity' => $quantity,
            ]);
        }

        return response()->json(['message' => 'Item added to cart']);
    }

    public function showCart(){
        $frakturs = Fraktur::where('user_id', Auth::id())->with('barang')->get();

        return view('user.fraktur', compact('frakturs'));
    }
    public function getCartContent(){
        $frakturs = Fraktur::where('user_id', Auth::id())->with('barang')->get();
        return view('user.cart-content', compact('frakturs'));
    }
    
    public function update(Request $request){
        $itemId = $request->input('id');
        $quantity = $request->input('quantity');
        
        $item = Fraktur::find($itemId);

        if ($item) {
            $item->quantity = $quantity;
            $item->save();
        }

        return response()->json([
            'html' => view('user.cart-content', ['frakturs' => Fraktur::all()])->render()
        ]);
    }

    public function remove(Request $request){
        $itemId = $request->input('id');

        $item = Fraktur::find($itemId);
        if ($item) {
            $item->delete();
        }

        return response()->json([
            'html' => view('user.cart-content', ['frakturs' => Fraktur::all()])->render()
        ]);
    }

    public function printPDF(Request $request){
        $request->validate([
            'address' => 'required|string|min:10|max:100',
            'postalCode' => 'required|digits:5',
        ], [
            'address.required' => 'Alamat Pengiriman wajib diisi.',
            'address.string' => 'Alamat Pengiriman harus berupa teks.',
            'address.min' => 'Alamat Pengiriman minimal harus 10 karakter.',
            'address.max' => 'Alamat Pengiriman maksimal 100 karakter.',
            'postalCode.required' => 'Kode Pos wajib diisi.',
            'postalCode.digits' => 'Kode Pos harus terdiri dari 5 digit.',
        ]);
        
        $user = auth()->user();
        $address = $request->input('address');
        $postalCode = $request->input('postalCode');

        $invoiceNumber = 'INV-' . strtoupper(Str::random(10));

        $alamat = $request->input('address');
        $kodePos = $request->input('postalCode');
        $frakturs = Fraktur::where('user_id', $user->id)->get();

        if ($frakturs->isEmpty()) {
            return back()->withErrors(['msg' => 'Tidak ada barang di keranjang untuk dicetak.']);
        }

        $pdf = PDF::loadView('user.cartPDF', compact('user', 'frakturs', 'invoiceNumber', 'alamat', 'kodePos'));

        return $pdf->download('invoice_' . $invoiceNumber . '.pdf');
    }


}
