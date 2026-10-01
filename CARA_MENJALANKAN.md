# CARA MENJALANKAN APLIKASI

## Langkah 1: Jalankan Migration Database
Buka terminal/command prompt di folder project, lalu jalankan:
```bash
php artisan migrate
```

Jika sudah pernah migrate sebelumnya dan ingin reset ulang:
```bash
php artisan migrate:fresh
```

## Langkah 2: Jalankan Seeder (Isi Data Awal)
```bash
php artisan db:seed
```

Ini akan membuat:
- **User Admin**: admin@example.com / password
- **User Biasa**: user@example.com / password
- **5 Data Mahasiswa** (termasuk Razzi Ronaldi NPM 25781020)

## Langkah 3: Jalankan Development Server
```bash
php artisan serve
```

## Langkah 4: Buka Browser
Akses: **http://127.0.0.1:8000**

## Langkah 5: Login
Dari halaman welcome, klik tombol **Log in** di pojok kanan atas

### Login sebagai Admin (Full Access):
- Email: **admin@example.com**
- Password: **password**

### Login sebagai User (Read Only):
- Email: **user@example.com**
- Password: **password**

---

## FITUR YANG TERSEDIA

### Untuk Admin:
✅ Lihat Dashboard dengan statistik
✅ Lihat Daftar Mahasiswa
✅ Tambah Mahasiswa Baru
✅ Edit Data Mahasiswa
✅ Hapus Data Mahasiswa
✅ Lihat Detail Mahasiswa

### Untuk User Biasa:
✅ Lihat Dashboard (read-only info)
✅ Lihat Daftar Mahasiswa
✅ Lihat Detail Mahasiswa
❌ Tidak bisa Tambah/Edit/Hapus

---

## NAVIGASI

**Menu Utama:**
1. **Dashboard** - Halaman utama dengan informasi akses
2. **Data Mahasiswa** - Daftar semua mahasiswa

**Dropdown Profile (kanan atas):**
- Profile - Edit profil user
- Log Out - Keluar dari aplikasi

---

## TESTING FITUR ROLE-BASED ACCESS

### Test 1: Login sebagai Admin
1. Login dengan admin@example.com
2. Pergi ke Data Mahasiswa
3. Cek tombol **Tambah Mahasiswa** tersedia ✅
4. Pada setiap row ada tombol **Edit** dan **Hapus** ✅

### Test 2: Login sebagai User
1. Logout dari admin
2. Login dengan user@example.com
3. Pergi ke Data Mahasiswa
4. Cek tombol **Tambah Mahasiswa** TIDAK ADA ❌
5. Pada setiap row TIDAK ADA tombol Edit/Hapus ❌
6. Hanya bisa melihat data

### Test 3: Coba Akses Paksa (Security Test)
1. Login sebagai user biasa
2. Coba akses langsung: http://127.0.0.1:8000/mahasiswa/create
3. Harus muncul error **403 Forbidden** ✅
4. Ini membuktikan middleware bekerja dengan baik

---

## TROUBLESHOOTING

### Problem: Error "Route [mahasiswa.index] not defined"
**Solution:** Pastikan sudah menjalankan `php artisan route:clear`

### Problem: Error "Class 'App\Models\Mahasiswa' not found"
**Solution:** Jalankan `composer dump-autoload`

### Problem: Error "SQLSTATE connection refused"
**Solution:** Cek file `.env`, pastikan DB_CONNECTION=sqlite

### Problem: Halaman blank/putih
**Solution:** 
1. Cek console browser (F12) untuk error JavaScript
2. Pastikan sudah menjalankan `npm install && npm run build`

### Problem: CSS tidak muncul
**Solution:** 
1. Jalankan `npm install`
2. Jalankan `npm run build`
3. Restart `php artisan serve`

---

## STRUKTUR FILE PENTING

```
praktikum-manajemen-mahasiswa/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── MahasiswaController.php
│   │   └── Middleware/
│   │       └── CheckRole.php
│   └── Models/
│       ├── User.php (dengan kolom role)
│       └── Mahasiswa.php
├── database/
│   ├── migrations/
│   │   ├── xxxx_add_role_to_users_table.php
│   │   └── xxxx_create_mahasiswas_table.php
│   └── seeders/
│       ├── UserSeeder.php
│       └── MahasiswaSeeder.php
├── resources/views/
│   ├── dashboard.blade.php
│   ├── mahasiswa/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   ├── edit.blade.php
│   │   └── show.blade.php
│   └── layouts/
│       └── navigation.blade.php
└── routes/
    └── web.php
```

---

## SCREENSHOT YANG HARUS DIAMBIL (untuk Dokumentasi)

1. **Halaman Welcome** dengan tombol Login/Register
2. **Halaman Login**
3. **Dashboard Admin** - tampilan lengkap
4. **Dashboard User** - tampilan read-only
5. **Daftar Mahasiswa (Admin)** - dengan tombol Tambah/Edit/Hapus
6. **Daftar Mahasiswa (User)** - tanpa tombol aksi
7. **Form Tambah Mahasiswa**
8. **Form Edit Mahasiswa**
9. **Detail Mahasiswa**
10. **Error 403** - saat user biasa coba akses create
11. **Validasi Error** - isi form dengan data salah
12. **Success Message** - setelah berhasil tambah/edit/hapus

---

## DATA MAHASISWA YANG SUDAH DI-SEED

1. **Razzi Ronaldi** - NPM: 25781020, Prodi: MI, Angkatan: 2025
2. Budi Santoso - NPM: 12345678, Prodi: Sistem Informasi, Angkatan: 2023
3. Siti Aminah - NPM: 23456789, Prodi: Teknik Informatika, Angkatan: 2024
4. Ahmad Fauzi - NPM: 34567890, Prodi: Manajemen Informatika, Angkatan: 2025
5. Dewi Lestari - NPM: 45678901, Prodi: Sistem Informasi, Angkatan: 2023

---

## FITUR UI MODERN YANG SUDAH DITERAPKAN

✨ **Gradient Backgrounds** - Biru, hijau, ungu, merah, kuning
🎨 **Icon Decorations** - Setiap elemen ada iconnya
💫 **Shadow Effects** - Hover animations yang smooth
🎯 **Transform Animations** - Button hover effects
📱 **Responsive Layout** - Mobile-friendly
🏷️ **Badge Displays** - Program studi & angkatan
⚠️ **Enhanced Error Messages** - Dengan icon
🎭 **Consistent Design** - Semua halaman serasi

---

## NEXT STEPS (Setelah Testing)

1. ✅ Test semua fitur (admin & user)
2. ✅ Ambil 12 screenshot
3. ✅ Isi tabel testing di dokumentasi
4. ✅ Push ke GitHub
5. ✅ Submit package lengkap

**SELAMAT! Aplikasi sudah siap digunakan dan dinilai! 🎉**
