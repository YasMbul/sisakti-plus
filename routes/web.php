
<?php
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SkpController;
use App\Http\Controllers\SkpDetailController;
use App\Http\Controllers\UnsurController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

// Route::view('/', 'welcome')->name('home');

Route::resource('faculties', FacultyController::class);
Route::resource('majors', MajorController::class);
Route::resource('semesters', SemesterController::class);
Route::resource('unsurs', UnsurController::class);
Route::resource('skp-details', SkpDetailController::class);
Route::resource('skps', SkpController::class);
Route::resource('files', FileController::class);
Route::resource('users', UserController::class);

Route::controller(AuthController::class)->group(function () {
   Route::get('/login', 'index')->name('login');
   Route::post('/login', 'login')->name('login.auth');

   Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});

// Route Admin
Route::middleware(['auth', 'role:admin'])
   ->prefix('admin')
   ->name('admin.')
   ->group(function () {
      Route::get('/', \App\Livewire\Admin\Dashboard::class)->name('home');
      Route::get('/kelola-akun', \App\Livewire\Admin\KelolaAkun\Index::class)->name('kelola-akun');
      Route::get('/kelola-akun/create', \App\Livewire\Admin\KelolaAkun\Create::class)->name(
         'kelola-akun.create',
      );
      Route::get('/verifikasi-skp', \App\Livewire\Admin\VerifikasiSkp\Index::class)->name(
         'verifikasi-skp',
      );
      Route::get('/verifikasi-skp/{id}/show', \App\Livewire\Admin\VerifikasiSkp\Show::class)->name(
         'verifikasi-skp.show',
      );
   });

// Route Mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
   Route::get('/', \App\Livewire\Mahasiswa\Dashboard::class)->name('home');
   Route::view('/panduan', 'livewire.mahasiswa.panduan-skp')->name('mahasiswa.panduan');
   Route::get('/upload-sertifikat/{id?}', \App\Livewire\Mahasiswa\Create::class)->name(
      'mahasiswa.upload',
   );
   Route::get('/daftar-sertifikat', \App\Livewire\Mahasiswa\Daftar::class)->name(
      'mahasiswa.daftar',
   );
   Route::get(
      '/daftar-sertifikat/{id}/edit',
      \App\Livewire\Mahasiswa\DaftarSertifikat\Edit::class,
   )->name('daftar-sertifikat.edit');
});

Route::view('/login-view', 'login');
Route::view('/tes', 'tes')->name('tes');

