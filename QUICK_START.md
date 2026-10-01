# QUICK START COMMANDS
## Copy-Paste Commands untuk Instalasi Cepat

**Nama**: Razzi Ronaldi  
**NPM**: 25781020  
**Kelas**: MI 3 A

---

## 📋 COMMAND INSTALASI

Salin dan jalankan command berikut satu per satu di terminal:

### 1. Masuk ke Direktori Project
```bash
cd "tugas Razzi Ronaldi Kelas Mi 3 A Npm 25781020/praktikum-manajemen-mahasiswa"
```

### 2. Install Laravel Breeze
```bash
composer require laravel/breeze --dev
```

### 3. Setup Breeze (Blade Stack)
```bash
php artisan breeze:install blade
```

**Pilihan saat prompt:**
- Which Breeze stack? → **blade**
- Dark mode support? → **no**
- Testing framework? → **PHPUnit**

### 4. Install NPM Dependencies
```bash
npm install
```

### 5. Build Assets
```bash
npm run build
```

### 6. Jalankan Migration & Seeder
```bash
php artisan migrate:fresh --seed
```

### 7. Start Development Server
```bash
php artisan serve
```

### 8. Buka Browser
```
http://localhost:8000
```

---

## 🔑 AKUN LOGIN

### Admin
```
Email: admin@example.com
Password: password
```

### User
```
Email: user@example.com
Password: password
```

---

## 🧪 TESTING COMMANDS

### Test Login Admin
1. Buka: http://localhost:8000/login
2. Login dengan admin@example.com / password
3. Cek dashboard → ada info "Admin"
4. Buka: http://localhost:8000/mahasiswa
5. Ada tombol "Tambah Mahasiswa" ✅

### Test Login User
1. Logout dari admin
2. Login dengan user@example.com / password
3. Cek dashboard → ada info "User"
4. Buka: http://localhost:8000/mahasiswa
5. TIDAK ada tombol "Tambah Mahasiswa" ✅

### Test Akses Ditolak (User)
Masih login sebagai User, buka URL berikut di browser:

```
http://localhost:8000/mahasiswa/create
```
**Expected**: Error 403 Forbidden ✅

```
http://localhost:8000/mahasiswa/1/edit
```
**Expected**: Error 403 Forbidden ✅

---

## 🔄 RESET DATABASE (Jika Perlu)

Jika ingin reset database ke kondisi awal:

```bash
php artisan migrate:fresh --seed
```

---

## 🧹 CLEAR CACHE (Jika Ada Error)

Jika mengalami error cache:

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

---

## 🔧 TROUBLESHOOTING COMMANDS

### Error: Port 8000 already in use
```bash
php artisan serve --port=8001
```

### Error: npm command not found
Install Node.js: https://nodejs.org/

### Error: composer command not found
Install Composer: https://getcomposer.org/

### Cek versi PHP
```bash
php -v
```
Minimum: PHP 8.2

### Cek versi Composer
```bash
composer --version
```

### Cek versi Node
```bash
node -v
npm -v
```

---

## 📦 OPTIONAL: Install dengan One-Liner

**WARNING**: Hanya gunakan jika yakin semua prasyarat sudah terpenuhi!

```bash
cd "tugas Razzi Ronaldi Kelas Mi 3 A Npm 25781020/praktikum-manajemen-mahasiswa" && composer require laravel/breeze --dev && php artisan breeze:install blade --no-interaction && npm install && npm run build && php artisan migrate:fresh --seed && php artisan serve
```

---

## 🎯 VERIFICATION CHECKLIST

Setelah instalasi, verifikasi:

- [ ] Server running di http://localhost:8000
- [ ] Bisa buka halaman login
- [ ] Bisa login sebagai admin
- [ ] Bisa login sebagai user
- [ ] Admin bisa CRUD mahasiswa
- [ ] User ditolak (403) saat akses admin routes
- [ ] Dashboard menampilkan role dengan benar

---

## 📸 SCREENSHOT URLS

Setelah instalasi, ambil screenshot dari URL berikut:

### Login & Dashboard
```
http://localhost:8000/login
http://localhost:8000/dashboard (Admin)
http://localhost:8000/dashboard (User)
```

### Data Mahasiswa
```
http://localhost:8000/mahasiswa (Admin)
http://localhost:8000/mahasiswa (User)
http://localhost:8000/mahasiswa/create (Admin)
http://localhost:8000/mahasiswa/1/edit (Admin)
```

### Error Pages
```
http://localhost:8000/mahasiswa/create (User - 403)
http://localhost:8000/mahasiswa/1/edit (User - 403)
```

### Code Screenshots
- File: `app/Http/Middleware/CheckRole.php`
- File: `routes/web.php`
- File: `bootstrap/app.php`

---

## 📁 FILE STRUCTURE

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
├── README.md ✅
├── INSTALASI.md ✅
├── JAWABAN_ANALISIS.md ✅
├── SUMMARY.md ✅
└── QUICK_START.md ✅ (this file)
```

---

## 🚀 QUICK DEMO

Setelah instalasi selesai:

1. **Login Admin** → Create mahasiswa baru → Berhasil ✅
2. **Logout** → Login User → Coba create → 403 Error ✅
3. **Screenshot** semua hasil → Siap dikumpulkan ✅

---

## 📊 EXPECTED OUTPUT

### Migration Output
```
INFO  Preparing database.

  Creating migration table ................................. 20ms DONE

INFO  Running migrations.

  0001_01_01_000000_create_users_table ..................... 99ms DONE
  0001_01_01_000001_create_cache_table ..................... 70ms DONE
  0001_01_01_000002_create_jobs_table ...................... 84ms DONE
  2024_01_02_000000_add_role_to_users_table ................ 15ms DONE
  2024_01_02_000001_create_mahasiswas_table ................ 18ms DONE
```

### Seeder Output
```
INFO  Seeding database.

  Database\Seeders\UserSeeder .............................. RUNNING
  Database\Seeders\UserSeeder .............................. DONE
  Database\Seeders\MahasiswaSeeder ......................... RUNNING
  Database\Seeders\MahasiswaSeeder ......................... DONE
```

### Server Output
```
INFO  Server running on [http://127.0.0.1:8000].

Press Ctrl+C to stop the server
```

---

## ⚡ FASTER WORKFLOW

### Terminal 1: Server
```bash
cd "tugas Razzi Ronaldi Kelas Mi 3 A Npm 25781020/praktikum-manajemen-mahasiswa"
php artisan serve
```

### Terminal 2: Watch Assets (Optional)
```bash
cd "tugas Razzi Ronaldi Kelas Mi 3 A Npm 25781020/praktikum-manajemen-mahasiswa"
npm run dev
```

Dengan `npm run dev`, perubahan CSS/JS akan auto-reload.

---

## 🎓 LEARNING COMMANDS

### Lihat Routes
```bash
php artisan route:list
```

### Lihat Routes Mahasiswa
```bash
php artisan route:list --name=mahasiswa
```

### Tinker (Laravel Console)
```bash
php artisan tinker
```

Kemudian:
```php
// Lihat semua mahasiswa
Mahasiswa::all();

// Lihat semua users
User::all();

// Lihat user admin
User::where('role', 'admin')->first();
```

### Buat User Baru via Tinker
```php
User::create([
    'name' => 'Test User',
    'email' => 'test@example.com',
    'password' => Hash::make('password'),
    'role' => 'user'
]);
```

---

## 🔐 SECURITY CHECK

Setelah instalasi, verifikasi security:

### Test 1: User tidak bisa akses admin route
```bash
# Login sebagai user
# Buka browser console (F12)
# Paste:
fetch('/mahasiswa/create', {
  method: 'GET',
  headers: {
    'Accept': 'text/html'
  }
}).then(r => console.log(r.status))

# Expected: 403
```

### Test 2: CSRF Protection
```bash
# Coba POST tanpa CSRF token
curl -X POST http://localhost:8000/mahasiswa \
  -d "nim=12345&nama=Test"

# Expected: 419 (CSRF token mismatch)
```

---

## 📖 DOCUMENTATION LINKS

- **README.md**: Overview & Quick Start
- **INSTALASI.md**: Detailed Installation Guide
- **JAWABAN_ANALISIS.md**: Comprehensive Analysis (8 questions)
- **SUMMARY.md**: Project Summary
- **QUICK_START.md**: This file

---

## ✅ FINAL CHECKLIST

Sebelum pengumpulan:

- [ ] Instalasi selesai tanpa error
- [ ] Server berjalan normal
- [ ] Login admin berhasil
- [ ] Login user berhasil
- [ ] CRUD mahasiswa (admin) berhasil
- [ ] User ditolak akses admin routes (403)
- [ ] Screenshot lengkap (12 screenshots)
- [ ] Tabel pengujian diisi
- [ ] Push ke GitHub
- [ ] Link GitHub ready

---

## 🎯 ESTIMASI WAKTU

- **Instalasi**: 10-15 menit
- **Testing**: 15-20 menit
- **Screenshot**: 10 menit
- **Push GitHub**: 5 menit
- **Total**: ~45-60 menit

---

## 💡 PRO TIPS

1. **Buka 2 browser berbeda** untuk test admin dan user bersamaan
   - Chrome → Admin
   - Firefox → User

2. **Gunakan incognito/private window** untuk test tanpa cache

3. **Simpan screenshot dengan nama jelas**:
   - `01-middleware-code.png`
   - `02-routes-config.png`
   - `03-login-page.png`
   - dst...

4. **Copy error messages** kalau ada error untuk debugging

5. **Commit incremental** saat push ke GitHub:
   ```bash
   git add .
   git commit -m "Add migrations and models"
   git add .
   git commit -m "Add controllers and routes"
   git add .
   git commit -m "Add views and seeders"
   git push
   ```

---

## 🆘 NEED HELP?

Jika ada error:
1. Cek file `INSTALASI.md` → Troubleshooting section
2. Cek Laravel logs: `storage/logs/laravel.log`
3. Clear cache: `php artisan cache:clear`
4. Re-run migration: `php artisan migrate:fresh --seed`

---

**Selamat Mengerjakan! 🎉**

File dibuat: 1 Oktober 2026
Oleh: Razzi Ronaldi (NPM 25781020)
