<?php


use App\Models\Keranjang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WhislistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardUnitController;
use App\Http\Controllers\DashboardProdukController;
use App\Http\Controllers\TransaksiDetailController;
use App\Http\Controllers\DashboardKategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view(
//         'home',
//         [
//             'title' => 'Home | Fahri',
//             'navbar' => 'muh._.fahri'
//         ]
//     );
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['middleware' => ['auth', 'admin:2']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/dashboard/produk', DashboardProdukController::class)->names('dashboardProduk');
    Route::resource('/dashboard/kategori', DashboardKategoriController::class)->names('dashboardKategori')->except('show');
    Route::resource('/dashboard/unit', DashboardUnitController::class)->names('dashboardUnit')->except('show');
});

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang')->middleware('auth');
Route::post('/store', [KeranjangController::class, 'store'])->name('add-to-cart');
Route::post('/keranjang/status', [KeranjangController::class, 'status'])->middleware('auth');
Route::post('/keranjang/update-quantity', [KeranjangController::class, 'updateQuantity']);
Route::get('/keranjang/get-count', [KeranjangController::class, 'getKeranjangCount'])->middleware('auth');
Route::get('/keranjang/totalHarga', [KeranjangController::class, 'getHarga'])->middleware('auth');
Route::post('/keranjang/hold', [KeranjangController::class, 'hold']);
Route::post('/keranjang/unhold', [KeranjangController::class, 'unhold']);
Route::get('/keranjang/hold-item/', [KeranjangController::class, 'holdItem'])->middleware('auth');
Route::get('/keranjang/check-cart', [KeranjangController::class, 'checkCart'])->middleware('auth');
Route::post('/keranjang/drop-produk/{id}', [KeranjangController::class, 'dropProduk'])->middleware('auth');

Route::get('/transaksi', [TransaksiController::class, 'index'])->middleware('auth');
Route::get('/transaksi/{id}', [TransaksiController::class, 'detail'])->middleware('auth');

// export pdf
Route::get('/downloadpdf/{id}', [TransaksiController::class, 'downloadpdf'])->middleware('auth');

// send email
Route::get('/getmail/{id}', [EmailController::class, 'index'])->middleware('auth');
Route::post('/sendmail/{id}', [EmailController::class, 'index']);


Route::get('/favorit', [WhislistController::class, 'index'])->middleware('auth');
Route::post('/favorit-add', [WhislistController::class, 'store']);
Route::post('/favorit-delete/{id}', [WhislistController::class, 'destroy']);
Route::post('/favorit/store', [WhislistController::class, 'favoritStore']);

// export excel
Route::post('/transaksi/report-excel', [TransaksiController::class, 'exportExcel']);
