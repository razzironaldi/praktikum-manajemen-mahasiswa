# Sistem Manajemen Data Mahasiswa Berbasis Role

Aplikasi web untuk mengelola data mahasiswa dengan sistem autentikasi dan otorisasi berbasis role (Admin dan User).

## Informasi Mahasiswa

- **Nama**: Razzi Ronaldi
- **Kelas**: MI 3 A
- **NPM**: 25781020

## Deskripsi

Aplikasi ini adalah sistem manajemen data mahasiswa yang memiliki dua jenis pengguna:
- **Admin**: Dapat melihat, menambah, mengubah, dan menghapus data mahasiswa
- **User**: Hanya dapat melihat data mahasiswa

## Fitur

1. **Autentikasi**
   - Register
   - Login
   - Logout
   - Dashboard

2. **Role-Based Access Control**
   - Admin memiliki akses penuh
   - User memiliki akses read-only
   - Middleware untuk membatasi akses

3. **CRUD Mahasiswa** (Admin Only)
   - Create: Menambah data mahasiswa baru
   - Read: Melihat daftar dan detail mahasiswa
   - Update: Mengubah data mahasiswa
   - Delete: Menghapus data mahasiswa

4. **Data Mahasiswa**
   - NIM (unique)
   - Nama
   - Program Studi
   - Email (unique)
   - Angkatan

## Teknologi

- **Framework**: Laravel 13.x
- **Authentication**: Laravel Breeze
- **Database**: SQLite
- **Frontend**: Blade Templates + Tailwind CSS

## Instalasi

### 1. Install Dependencies

```bash
composer install
```

### 2. Install Laravel Breeze

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
```

Pilih opsi:
- Breeze stack: **Blade**
- Dark mode support: **No** (atau Yes sesuai preferensi)
- Testing: **PHPUnit** (atau Pest sesuai preferensi)

### 3. Install NPM Dependencies

```bash
npm install
npm run build
```

### 4. Setup Environment

File `.env` sudah ada, pastikan konfigurasi database:

```env
DB_CONNECTION=sqlite
```

### 5. Jalankan Migration dan Seeder

```bash
php artisan migrate:fresh --seed
```

Perintah ini akan:
- Membuat tabel users (dengan kolom role)
- Membuat tabel mahasiswas
- Membuat 2 akun user (admin dan user)
- Membuat 5 data mahasiswa contoh

### 6. Jalankan Aplikasi

```bash
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

## Akun Testing

### Admin
- **Email**: admin@example.com
- **Password**: password
- **Role**: admin
- **Akses**: Full access (CRUD mahasiswa)

### User
- **Email**: user@example.com
- **Password**: password
- **Role**: user
- **Akses**: Read-only (hanya melihat data)

## Struktur File Penting

### Migration
- `database/migrations/2024_01_02_000000_add_role_to_users_table.php` - Menambah kolom role
- `database/migrations/2024_01_02_000001_create_mahasiswas_table.php` - Tabel mahasiswa

### Model
- `app/Models/Mahasiswa.php` - Model mahasiswa

### Controller
- `app/Http/Controllers/MahasiswaController.php` - CRUD mahasiswa

### Middleware
- `app/Http/Middleware/CheckRole.php` - Middleware untuk cek role

### Views
- `resources/views/dashboard.blade.php` - Dashboard
- `resources/views/mahasiswa/index.blade.php` - Daftar mahasiswa
- `resources/views/mahasiswa/create.blade.php` - Form tambah mahasiswa
- `resources/views/mahasiswa/edit.blade.php` - Form edit mahasiswa
- `resources/views/mahasiswa/show.blade.php` - Detail mahasiswa

### Seeder
- `database/seeders/UserSeeder.php` - Data user
- `database/seeders/MahasiswaSeeder.php` - Data mahasiswa

## Routes

### Public Routes
- `GET /` - Welcome page
- `GET /login` - Login page
- `POST /login` - Login process
- `GET /register` - Register page
- `POST /register` - Register process

### Authenticated Routes
- `GET /dashboard` - Dashboard (Admin & User)
- `GET /mahasiswa` - Daftar mahasiswa (Admin & User)
- `GET /mahasiswa/{id}` - Detail mahasiswa (Admin & User)

### Admin Only Routes
- `GET /mahasiswa/create` - Form tambah mahasiswa
- `POST /mahasiswa` - Simpan mahasiswa baru
- `GET /mahasiswa/{id}/edit` - Form edit mahasiswa
- `PUT /mahasiswa/{id}` - Update mahasiswa
- `DELETE /mahasiswa/{id}` - Hapus mahasiswa

## Mekanisme Keamanan

### 1. Middleware `auth`
Memastikan pengguna sudah login sebelum mengakses route tertentu.

### 2. Middleware `role:admin`
Memastikan hanya admin yang bisa mengakses fitur CRUD mahasiswa.

### 3. Controller Level Check
Setiap method di `MahasiswaController` juga melakukan pengecekan role untuk double security.

### 4. View Level Check
Tombol Edit dan Hapus hanya ditampilkan untuk admin, tetapi tetap dilindungi di backend.

## Testing Skenario

### Sebagai Admin
1. Login dengan akun admin
2. Akses dashboard - ✅ Berhasil
3. Lihat daftar mahasiswa - ✅ Berhasil
4. Tambah mahasiswa baru - ✅ Berhasil
5. Edit data mahasiswa - ✅ Berhasil
6. Hapus data mahasiswa - ✅ Berhasil
7. Logout - ✅ Berhasil

### Sebagai User
1. Login dengan akun user
2. Akses dashboard - ✅ Berhasil
3. Lihat daftar mahasiswa - ✅ Berhasil
4. Coba akses URL `/mahasiswa/create` - ❌ Ditolak (403 Forbidden)
5. Coba akses URL `/mahasiswa/1/edit` - ❌ Ditolak (403 Forbidden)
6. Coba akses URL `/mahasiswa/1` (view) - ✅ Berhasil
7. Logout - ✅ Berhasil

## Pertanyaan Analisis

### 1. Mengapa autentikasi diperlukan sebelum pengguna mengakses halaman tertentu?
Autentikasi diperlukan untuk:
- Memverifikasi identitas pengguna
- Melindungi data sensitif dari akses tidak sah
- Memastikan hanya pengguna terdaftar yang bisa mengakses sistem
- Mencegah akses anonim ke fitur yang memerlukan identitas pengguna

### 2. Apa perbedaan antara authentication dan authorization?
- **Authentication**: Proses memverifikasi identitas pengguna (siapa Anda?)
  - Contoh: Login dengan email dan password
- **Authorization**: Proses menentukan hak akses pengguna (apa yang boleh Anda lakukan?)
  - Contoh: Memeriksa apakah user memiliki role 'admin' untuk mengakses fitur tertentu

### 3. Mengapa pembatasan role sebaiknya dilakukan menggunakan middleware?
- **Centralized Logic**: Logika otorisasi terpusat di satu tempat
- **Reusable**: Middleware dapat digunakan di banyak route
- **Clean Code**: Controller tetap fokus pada logika bisnis
- **Security**: Validasi dilakukan sebelum request mencapai controller
- **Maintainable**: Mudah dimodifikasi dan di-maintain

### 4. Apa yang terjadi jika User mencoba mengakses URL halaman Admin secara langsung?
User akan mendapat error **403 Forbidden**. Middleware `CheckRole` akan:
1. Mengecek apakah user sudah login
2. Mengecek role user
3. Jika role bukan 'admin', akan memanggil `abort(403)`
4. Laravel menampilkan halaman error 403

### 5. Apa risiko jika aplikasi hanya menyembunyikan tombol Edit dan Delete tanpa pembatasan route?
**Risiko besar**:
- **Security Breach**: User yang paham teknologi bisa mengakses URL langsung
- **Data Manipulation**: User bisa menambah, mengubah, atau menghapus data
- **Privilege Escalation**: User bisa melakukan aksi yang seharusnya hanya untuk admin
- **Audit Trail**: Sulit melacak siapa yang melakukan perubahan tidak sah
- **Data Integrity**: Data bisa rusak karena manipulasi tidak terkontrol

### 6. Jelaskan alur request User ke halaman Admin
1. **User mengirim request** ke `/mahasiswa/create`
2. **Router** menerima request dan meneruskan ke middleware
3. **Middleware `auth`** mengecek apakah user sudah login
   - Jika belum login: redirect ke `/login`
   - Jika sudah login: lanjut ke middleware berikutnya
4. **Middleware `role:admin`** mengecek role user
   - Ambil data user dari session/token
   - Cek apakah `user->role === 'admin'`
   - Jika BUKAN admin: `abort(403)` - proses berhenti di sini
   - Jika admin: lanjut ke controller
5. **Controller** `MahasiswaController@create` dieksekusi
   - Melakukan double-check role (defense in depth)
   - Return view `mahasiswa.create`
6. **Response** dikirim kembali ke user

Untuk User biasa, proses berhenti di langkah 4 dengan response **403 Forbidden**.

### 7. Jelaskan hubungan route, middleware, controller, model, dan view pada CRUD mahasiswa

```
Request → Route → Middleware → Controller → Model → Database
                                    ↓
                                  View → Response
```

**Detail alur**:
1. **Route** (`web.php`): Mendefinisikan URL dan mapping ke controller
2. **Middleware** (`auth`, `role:admin`): Memvalidasi autentikasi dan otorisasi
3. **Controller** (`MahasiswaController`): Mengatur logika bisnis
4. **Model** (`Mahasiswa`): Berinteraksi dengan database (Eloquent ORM)
5. **View** (`.blade.php`): Menampilkan data ke user

**Contoh CREATE**:
- Route: `POST /mahasiswa` → middleware `auth`, `role:admin` → `MahasiswaController@store`
- Controller validasi input → Model `Mahasiswa::create()` → Database INSERT
- Controller redirect ke `mahasiswa.index` dengan pesan sukses

### 8. Jika ada role baru "operator", bagian apa yang perlu diubah?

**Perubahan yang diperlukan**:

1. **Migration** - Ubah enum role di `add_role_to_users_table.php`:
```php
$table->enum('role', ['admin', 'user', 'operator'])->default('user');
```

2. **Middleware** - Bisa tetap menggunakan `CheckRole`, atau buat middleware baru `CheckOperator`

3. **Routes** - Tambah route group untuk operator:
```php
Route::middleware(['role:operator'])->group(function () {
    // Define operator-specific routes
});
```

4. **Controller** - Update logic pengecekan role di controller:
```php
if (!in_array(auth()->user()->role, ['admin', 'operator'])) {
    abort(403);
}
```

5. **Views** - Update conditional display:
```php
@if(in_array(Auth::user()->role, ['admin', 'operator']))
    <!-- Show edit/delete buttons -->
@endif
```

6. **Seeder** - Tambah data user dengan role operator

7. **Documentation** - Update README dan dokumentasi

**Hak Akses Operator** (contoh):
- Bisa CRUD mahasiswa (seperti admin)
- Tidak bisa mengelola users (beda dengan admin)
- Atau sesuai kebutuhan bisnis

## Troubleshooting

### Error: Class 'Laravel\Breeze\BreezeServiceProvider' not found
```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
```

### Error: npm not found
Install Node.js terlebih dahulu dari https://nodejs.org/

### Error: SQLSTATE[HY000]: General error: 1 no such table
```bash
php artisan migrate:fresh --seed
```

### Tombol Edit/Delete tidak muncul untuk admin
Pastikan seeder sudah dijalankan dan login dengan akun admin yang benar.

## Screenshot

Untuk dokumentasi pengumpulan, ambil screenshot:
1. Halaman Login
2. Dashboard Admin
3. Dashboard User
4. Daftar Mahasiswa (Admin view)
5. Daftar Mahasiswa (User view)
6. Form Tambah Mahasiswa
7. Form Edit Mahasiswa
8. Error 403 ketika User akses URL admin
9. Middleware CheckRole code
10. Routes configuration

## License

Educational Project - Praktikum Laravel

## Author

Razzi Ronaldi - NPM 25781020 - Kelas MI 3 A
