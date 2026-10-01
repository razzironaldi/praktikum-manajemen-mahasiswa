# PANDUAN INSTALASI LENGKAP
## Sistem Manajemen Data Mahasiswa

### Informasi
- **Nama**: Razzi Ronaldi
- **NPM**: 25781020
- **Kelas**: MI 3 A

---

## LANGKAH-LANGKAH INSTALASI

### 1. Persiapan
Pastikan sudah terinstall:
- PHP >= 8.2
- Composer
- Node.js & NPM
- Git

### 2. Install Laravel Breeze

Buka terminal di folder project, kemudian jalankan:

```bash
composer require laravel/breeze --dev
```

Tunggu hingga selesai, kemudian jalankan:

```bash
php artisan breeze:install blade
```

Ketika muncul pertanyaan:
- **Which Breeze stack would you like to install?** → Pilih: `blade`
- **Would you like dark mode support?** → Pilih: `no` (atau `yes` jika ingin)
- **Which testing framework do you prefer?** → Pilih: `PHPUnit` (atau `Pest`)

### 3. Install NPM Dependencies

```bash
npm install
```

Tunggu hingga selesai, kemudian build assets:

```bash
npm run build
```

### 4. Verifikasi File .env

Pastikan file `.env` sudah ada dan berisi konfigurasi database SQLite:

```env
DB_CONNECTION=sqlite
```

File database SQLite sudah dibuat otomatis di `database/database.sqlite`

### 5. Jalankan Migration

```bash
php artisan migrate:fresh
```

Perintah ini akan membuat tabel:
- users (dengan kolom role)
- mahasiswas
- cache
- jobs
- dll (tabel default Laravel)

### 6. Jalankan Seeder

```bash
php artisan db:seed
```

Atau jalankan migration dan seeder sekaligus:

```bash
php artisan migrate:fresh --seed
```

Seeder akan membuat:
- **2 akun user**:
  - Admin: admin@example.com / password
  - User: user@example.com / password
- **5 data mahasiswa** (termasuk data Razzi Ronaldi)

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi akan berjalan di: **http://localhost:8000**

---

## TESTING APLIKASI

### A. Test sebagai ADMIN

1. Buka browser: http://localhost:8000
2. Klik "Login"
3. Login dengan:
   - Email: `admin@example.com`
   - Password: `password`
4. Akan redirect ke Dashboard
5. Klik "Lihat Data Mahasiswa"
6. **Test Create**: Klik "Tambah Mahasiswa" → Isi form → Simpan
7. **Test Update**: Klik "Edit" pada salah satu data → Ubah → Simpan
8. **Test Delete**: Klik "Hapus" pada salah satu data → Confirm
9. **Test View**: Klik salah satu NIM/Nama untuk melihat detail
10. Logout

### B. Test sebagai USER

1. Login dengan:
   - Email: `user@example.com`
   - Password: `password`
2. Akan redirect ke Dashboard (notice: ada info "Anda login sebagai User")
3. Klik "Lihat Data Mahasiswa"
4. **Notice**: Tidak ada tombol "Tambah Mahasiswa"
5. **Notice**: Tidak ada tombol "Edit" dan "Hapus" pada data
6. **Test Akses Langsung**: Buka URL berikut di browser:
   - `http://localhost:8000/mahasiswa/create` → Akan muncul **403 Forbidden**
   - `http://localhost:8000/mahasiswa/1/edit` → Akan muncul **403 Forbidden**
7. Logout

---

## TABEL HASIL PENGUJIAN

| No | Skenario | Admin | User | Hasil yang Diharapkan |
|----|----------|-------|------|-----------------------|
| 1 | Login | ✅ Berhasil | ✅ Berhasil | Redirect ke dashboard |
| 2 | Membuka dashboard | ✅ Berhasil | ✅ Berhasil | Tampil dashboard sesuai role |
| 3 | Melihat data mahasiswa | ✅ Berhasil | ✅ Berhasil | Tampil daftar mahasiswa |
| 4 | Menambah mahasiswa | ✅ Berhasil | ❌ 403 Error | Admin bisa, User ditolak |
| 5 | Mengubah mahasiswa | ✅ Berhasil | ❌ 403 Error | Admin bisa, User ditolak |
| 6 | Menghapus mahasiswa | ✅ Berhasil | ❌ 403 Error | Admin bisa, User ditolak |
| 7 | Mengakses URL Admin secara langsung | ✅ Berhasil | ❌ 403 Error | Admin bisa, User ditolak |
| 8 | Logout | ✅ Berhasil | ✅ Berhasil | Kembali ke halaman login |

---

## SCREENSHOT YANG PERLU DIAMBIL

Untuk pengumpulan tugas, ambil screenshot:

### 1. Middleware Code
- File: `app/Http/Middleware/CheckRole.php`
- Screenshot seluruh kode

### 2. Halaman Login
- URL: http://localhost:8000/login
- Screenshot form login

### 3. Dashboard Admin
- Login sebagai admin
- Screenshot dashboard dengan info role "Admin"

### 4. Dashboard User  
- Login sebagai user
- Screenshot dashboard dengan info role "User"

### 5. Daftar Mahasiswa (Admin)
- Login sebagai admin
- Screenshot halaman `/mahasiswa` dengan tombol "Tambah", "Edit", "Hapus"

### 6. Daftar Mahasiswa (User)
- Login sebagai user
- Screenshot halaman `/mahasiswa` tanpa tombol "Tambah", "Edit", "Hapus"

### 7. Form Tambah Mahasiswa (Admin)
- Login sebagai admin
- Screenshot halaman `/mahasiswa/create`

### 8. Form Edit Mahasiswa (Admin)
- Login sebagai admin
- Screenshot halaman `/mahasiswa/{id}/edit`

### 9. Error 403 - Create (User)
- Login sebagai user
- Akses langsung: http://localhost:8000/mahasiswa/create
- Screenshot error 403 Forbidden

### 10. Error 403 - Edit (User)
- Login sebagai user
- Akses langsung: http://localhost:8000/mahasiswa/1/edit
- Screenshot error 403 Forbidden

### 11. Routes Configuration
- File: `routes/web.php`
- Screenshot konfigurasi routes dengan middleware

### 12. Bootstrap App Configuration
- File: `bootstrap/app.php`
- Screenshot registrasi middleware

---

## STRUKTUR FILE PROJECT

```
praktikum-manajemen-mahasiswa/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── MahasiswaController.php ✅
│   │   └── Middleware/
│   │       └── CheckRole.php ✅
│   └── Models/
│       └── Mahasiswa.php ✅
├── bootstrap/
│   └── app.php ✅ (updated)
├── database/
│   ├── migrations/
│   │   ├── 2024_01_02_000000_add_role_to_users_table.php ✅
│   │   └── 2024_01_02_000001_create_mahasiswas_table.php ✅
│   └── seeders/
│       ├── DatabaseSeeder.php ✅ (updated)
│       ├── UserSeeder.php ✅
│       └── MahasiswaSeeder.php ✅
├── resources/
│   └── views/
│       ├── dashboard.blade.php ✅
│       └── mahasiswa/
│           ├── index.blade.php ✅
│           ├── create.blade.php ✅
│           ├── edit.blade.php ✅
│           └── show.blade.php ✅
├── routes/
│   └── web.php ✅ (updated)
└── README.md ✅
```

---

## TROUBLESHOOTING

### Error: "Class 'Laravel\Breeze\BreezeServiceProvider' not found"
**Solusi**:
```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
```

### Error: "npm: command not found"
**Solusi**: Install Node.js dari https://nodejs.org/

### Error: "SQLSTATE[HY000]: General error: 1 no such table: users"
**Solusi**:
```bash
php artisan migrate:fresh --seed
```

### Tombol Edit/Delete tidak muncul untuk Admin
**Solusi**: 
- Pastikan sudah login dengan akun admin (admin@example.com)
- Cek di dashboard apakah role = "Admin"
- Clear browser cache dan refresh

### Error 500 saat akses halaman
**Solusi**:
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

---

## PERINTAH CEPAT (Quick Commands)

### Install dan Setup dari Awal
```bash
# 1. Install Breeze
composer require laravel/breeze --dev
php artisan breeze:install blade

# 2. Install NPM
npm install && npm run build

# 3. Setup Database
php artisan migrate:fresh --seed

# 4. Run Server
php artisan serve
```

### Reset Database
```bash
php artisan migrate:fresh --seed
```

### Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

---

## AKUN TESTING

### Admin
```
Email: admin@example.com
Password: password
Role: admin
```

### User
```
Email: user@example.com
Password: password
Role: user
```

---

## INFORMASI TAMBAHAN

### Port sudah digunakan?
Jika port 8000 sudah digunakan, gunakan port lain:
```bash
php artisan serve --port=8001
```

### Membuat akun baru via Register
1. Buka: http://localhost:8000/register
2. Isi form registrasi
3. **Default role**: user (tidak bisa memilih admin saat register)
4. Untuk membuat admin, ubah manual di database atau via seeder

### Mengubah Role User
```bash
php artisan tinker
```

Kemudian:
```php
$user = User::where('email', 'email@example.com')->first();
$user->role = 'admin';
$user->save();
```

---

## KONTAK

Jika ada pertanyaan atau kendala:
- **Nama**: Razzi Ronaldi
- **NPM**: 25781020
- **Kelas**: MI 3 A

---

**Selamat Mengerjakan! 🚀**
