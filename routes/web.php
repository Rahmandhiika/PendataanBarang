<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrakturController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('user.catalog');

Route::get('/catalog', [UserController::class, 'index'])->name('user.catalog');
Route::post('/addfraktur', [FrakturController::class, 'addToCart'])->name('fraktur.tambah');
Route::get('/fraktur/content', [FrakturController::class, 'getCartContent'])->name('fraktur.content');
Route::post('/fraktur/update', [FrakturController::class, 'update'])->name('fraktur.update');
Route::post('/fraktur/remove', [FrakturController::class, 'remove'])->name('fraktur.remove');
Route::get('/cart/print', [FrakturController::class, 'printPDF'])->name('cart.print');

Route::get('/admin/daftarbarang', [BarangController::class, 'index'])->middleware('admin')->name('barangs.index');
Route::post('/admin/daftarbarang', [BarangController::class, 'store'])->name('barangs.store');
Route::post('/admin/daftarbarang/{id}/update', [BarangController::class, 'update'])->name('barang.update');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::delete('/admin/daftarbarang/{id}/delete', [BarangController::class, 'destroy'])->name('barang.destroy');

Route::middleware('auth')->group(function () {

});


 require __DIR__.'/auth.php';
