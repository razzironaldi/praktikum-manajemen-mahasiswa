# PROJECT STRUCTURE
## Sistem Manajemen Data Mahasiswa Berbasis Role

**Project**: praktikum-manajemen-mahasiswa  
**Author**: Razzi Ronaldi (NPM 25781020)  
**Date**: 1 Oktober 2026

---

## 📂 COMPLETE FILE STRUCTURE

```
praktikum-manajemen-mahasiswa/
│
├── 📁 app/
│   ├── 📁 Http/
│   │   ├── 📁 Controllers/
│   │   │   ├── Auth/ (dari Breeze)
│   │   │   │   ├── AuthenticatedSessionController.php
│   │   │   │   ├── ConfirmablePasswordController.php
│   │   │   │   ├── EmailVerificationNotificationController.php
│   │   │   │   ├── EmailVerificationPromptController.php
│   │   │   │   ├── NewPasswordController.php
│   │   │   │   ├── PasswordController.php
│   │   │   │   ├── PasswordResetLinkController.php
│   │   │   │   ├── RegisteredUserController.php
│   │   │   │   └── VerifyEmailController.php
│   │   │   ├── Controller.php
│   │   │   ├── MahasiswaController.php ✅ CUSTOM
│   │   │   └── ProfileController.php (dari Breeze)
│   │   │
│   │   └── 📁 Middleware/
│   │       ├── CheckRole.php ✅ CUSTOM
│   │       ├── Authenticate.php
│   │       ├── EncryptCookies.php
│   │       ├── PreventRequestsDuringMaintenance.php
│   │       ├── RedirectIfAuthenticated.php
│   │       ├── TrimStrings.php
│   │       ├── TrustHosts.php
│   │       ├── TrustProxies.php
│   │       └── ValidateCsrfToken.php
│   │
│   ├── 📁 Models/
│   │   ├── Mahasiswa.php ✅ CUSTOM
│   │   └── User.php (updated by Breeze)
│   │
│   └── 📁 Providers/
│       └── AppServiceProvider.php
│
├── 📁 bootstrap/
│   ├── app.php ✅ UPDATED (middleware alias)
│   └── providers.php
│
├── 📁 config/
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   └── session.php
│
├── 📁 database/
│   ├── 📁 factories/
│   │   └── UserFactory.php
│   │
│   ├── 📁 migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2024_01_02_000000_add_role_to_users_table.php ✅ CUSTOM
│   │   └── 2024_01_02_000001_create_mahasiswas_table.php ✅ CUSTOM
│   │
│   ├── 📁 seeders/
│   │   ├── DatabaseSeeder.php ✅ UPDATED
│   │   ├── MahasiswaSeeder.php ✅ CUSTOM
│   │   └── UserSeeder.php ✅ CUSTOM
│   │
│   └── database.sqlite (created after migration)
│
├── 📁 public/
│   ├── 📁 build/ (after npm run build)
│   ├── .htaccess
│   ├── favicon.ico
│   ├── index.php
│   └── robots.txt
│
├── 📁 resources/
│   ├── 📁 css/
│   │   └── app.css
│   │
│   ├── 📁 js/
│   │   ├── app.js
│   │   └── bootstrap.js
│   │
│   └── 📁 views/
│       ├── 📁 auth/ (dari Breeze)
│       │   ├── confirm-password.blade.php
│       │   ├── forgot-password.blade.php
│       │   ├── login.blade.php
│       │   ├── register.blade.php
│       │   ├── reset-password.blade.php
│       │   └── verify-email.blade.php
│       │
│       ├── 📁 components/ (dari Breeze)
│       │   ├── application-logo.blade.php
│       │   ├── auth-session-status.blade.php
│       │   ├── danger-button.blade.php
│       │   ├── dropdown-link.blade.php
│       │   ├── dropdown.blade.php
│       │   ├── input-error.blade.php
│       │   ├── input-label.blade.php
│       │   ├── modal.blade.php
│       │   ├── nav-link.blade.php
│       │   ├── primary-button.blade.php
│       │   ├── responsive-nav-link.blade.php
│       │   ├── secondary-button.blade.php
│       │   ├── text-input.blade.php
│       │   └── textarea-input.blade.php
│       │
│       ├── 📁 layouts/ (dari Breeze)
│       │   ├── app.blade.php
│       │   ├── guest.blade.php
│       │   └── navigation.blade.php
│       │
│       ├── 📁 mahasiswa/ ✅ CUSTOM
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       │
│       ├── 📁 profile/ (dari Breeze)
│       │   ├── edit.blade.php
│       │   └── partials/
│       │       ├── delete-user-form.blade.php
│       │       ├── update-password-form.blade.php
│       │       └── update-profile-information-form.blade.php
│       │
│       ├── dashboard.blade.php ✅ UPDATED
│       └── welcome.blade.php
│
├── 📁 routes/
│   ├── auth.php (dari Breeze)
│   ├── console.php
│   └── web.php ✅ UPDATED
│
├── 📁 storage/
│   ├── 📁 app/
│   ├── 📁 framework/
│   ├── 📁 logs/
│   └── 📁 pail/
│
├── 📁 tests/
│   ├── 📁 Feature/
│   │   └── ExampleTest.php
│   └── 📁 Unit/
│       └── ExampleTest.php
│
├── 📁 vendor/ (composer packages)
│
├── 📁 node_modules/ (npm packages)
│
├── 📄 .env
├── 📄 .env.example
├── 📄 .gitignore
├── 📄 artisan
├── 📄 composer.json
├── 📄 composer.lock
├── 📄 package.json
├── 📄 package-lock.json
├── 📄 phpunit.xml
├── 📄 postcss.config.js
├── 📄 tailwind.config.js
├── 📄 vite.config.js
│
└── 📄 DOCUMENTATION FILES ✅
    ├── README.md (Overview & Quick Guide)
    ├── INSTALASI.md (Detailed Installation)
    ├── JAWABAN_ANALISIS.md (Analysis Answers)
    ├── SUMMARY.md (Project Summary)
    ├── QUICK_START.md (Quick Commands)
    └── STRUCTURE.md (This file)
```

---

## 🎯 CUSTOM FILES CREATED

### 1. Migration Files (2)
```
database/migrations/2024_01_02_000000_add_role_to_users_table.php
database/migrations/2024_01_02_000001_create_mahasiswas_table.php
```

### 2. Model (1)
```
app/Models/Mahasiswa.php
```

### 3. Controller (1)
```
app/Http/Controllers/MahasiswaController.php
```

### 4. Middleware (1)
```
app/Http/Middleware/CheckRole.php
```

### 5. Seeders (2 + 1 updated)
```
database/seeders/UserSeeder.php
database/seeders/MahasiswaSeeder.php
database/seeders/DatabaseSeeder.php (updated)
```

### 6. Views (5)
```
resources/views/mahasiswa/index.blade.php
resources/views/mahasiswa/create.blade.php
resources/views/mahasiswa/edit.blade.php
resources/views/mahasiswa/show.blade.php
resources/views/dashboard.blade.php (updated)
```

### 7. Configuration (2 updated)
```
bootstrap/app.php (middleware registration)
routes/web.php (mahasiswa routes)
```

### 8. Documentation (6)
```
README.md
INSTALASI.md
JAWABAN_ANALISIS.md
SUMMARY.md
QUICK_START.md
STRUCTURE.md
```

**Total Custom Files**: 21 files

---

## 📊 FILE STATISTICS

### Code Files
- **PHP Files**: 7
  - Controllers: 1
  - Models: 1
  - Middleware: 1
  - Migrations: 2
  - Seeders: 2

- **Blade Templates**: 5
  - Index: 1
  - Create: 1
  - Edit: 1
  - Show: 1
  - Dashboard: 1 (updated)

- **Configuration**: 2 (updated)
  - Routes: 1
  - Bootstrap: 1

### Documentation Files
- **Markdown Files**: 6
  - Total Lines: ~8,000+ lines
  - README.md: ~2,500 lines
  - INSTALASI.md: ~1,200 lines
  - JAWABAN_ANALISIS.md: ~2,800 lines
  - SUMMARY.md: ~500 lines
  - QUICK_START.md: ~400 lines
  - STRUCTURE.md: ~300 lines

### Total Lines of Code
- **PHP**: ~1,500 lines
- **Blade**: ~800 lines
- **Markdown**: ~8,000 lines
- **Total**: ~10,300+ lines

---

## 🗂️ FILE PURPOSES

### app/Models/Mahasiswa.php
**Purpose**: Model untuk tabel mahasiswas  
**Features**:
- Mass assignment protection
- Type casting
- Eloquent ORM methods

### app/Http/Controllers/MahasiswaController.php
**Purpose**: Handle CRUD mahasiswa  
**Methods**:
- index() - List mahasiswa
- create() - Show create form
- store() - Save new mahasiswa
- show() - Show detail
- edit() - Show edit form
- update() - Save changes
- destroy() - Delete mahasiswa

### app/Http/Middleware/CheckRole.php
**Purpose**: Validate user role  
**Logic**:
- Check authentication
- Check role match
- Abort 403 if not authorized

### database/migrations/2024_01_02_000000_add_role_to_users_table.php
**Purpose**: Add role column to users  
**Schema**:
- Column: role
- Type: enum('admin', 'user')
- Default: 'user'

### database/migrations/2024_01_02_000001_create_mahasiswas_table.php
**Purpose**: Create mahasiswas table  
**Schema**:
- id (bigint, primary key)
- nim (string, unique)
- nama (string)
- program_studi (string)
- email (string, unique)
- angkatan (year)
- timestamps

### database/seeders/UserSeeder.php
**Purpose**: Seed users data  
**Creates**:
- 1 Admin user
- 1 Regular user

### database/seeders/MahasiswaSeeder.php
**Purpose**: Seed mahasiswa data  
**Creates**:
- 5 sample mahasiswa records

### resources/views/mahasiswa/index.blade.php
**Purpose**: Display mahasiswa list  
**Features**:
- Table view
- Pagination
- Conditional buttons (admin only)

### resources/views/mahasiswa/create.blade.php
**Purpose**: Create new mahasiswa  
**Features**:
- Form with validation
- Error messages
- Cancel button

### resources/views/mahasiswa/edit.blade.php
**Purpose**: Edit existing mahasiswa  
**Features**:
- Pre-filled form
- Validation
- Update button

### resources/views/mahasiswa/show.blade.php
**Purpose**: Show mahasiswa detail  
**Features**:
- Read-only view
- All field display
- Timestamps

### resources/views/dashboard.blade.php
**Purpose**: Dashboard after login  
**Features**:
- Role-based message
- Quick link to mahasiswa
- Responsive design

---

## 🔗 FILE RELATIONSHIPS

### Migration → Model → Controller → View

```
Database Schema (Migration)
    ↓
Eloquent Model (Mahasiswa)
    ↓
Controller (MahasiswaController)
    ↓
Views (index, create, edit, show)
```

### Route → Middleware → Controller

```
Route Definition (web.php)
    ↓
Middleware Check (auth, role)
    ↓
Controller Method
    ↓
Response (View or Redirect)
```

### Seeder → Database

```
Seeder Class (UserSeeder, MahasiswaSeeder)
    ↓
Model (User, Mahasiswa)
    ↓
Database Insert
```

---

## 📋 DEPENDENCIES BETWEEN FILES

### MahasiswaController depends on:
- ✅ Mahasiswa Model
- ✅ Request class
- ✅ Auth facade
- ✅ Routes (web.php)
- ✅ Views (mahasiswa/*.blade.php)

### CheckRole Middleware depends on:
- ✅ Auth facade
- ✅ User Model (via auth())

### Routes (web.php) depends on:
- ✅ MahasiswaController
- ✅ CheckRole Middleware
- ✅ Auth routes (auth.php)

### Views depend on:
- ✅ App Layout (layouts/app.blade.php from Breeze)
- ✅ Tailwind CSS
- ✅ Blade Components

---

## 🎨 STYLING & ASSETS

### CSS Framework
- **Tailwind CSS** (from Breeze)
- File: `resources/css/app.css`
- Config: `tailwind.config.js`

### JavaScript
- **Alpine.js** (from Breeze)
- File: `resources/js/app.js`
- Bundler: Vite

### Build Tools
- **Vite** (bundler)
- Config: `vite.config.js`
- PostCSS: `postcss.config.js`

---

## 🔐 SECURITY FILES

### Authentication (from Breeze)
```
routes/auth.php
app/Http/Controllers/Auth/*
resources/views/auth/*
```

### Authorization (custom)
```
app/Http/Middleware/CheckRole.php
bootstrap/app.php (middleware alias)
routes/web.php (route protection)
```

### CSRF Protection
```
app/Http/Middleware/ValidateCsrfToken.php
@csrf directive in forms
```

---

## 📝 CONFIGURATION FILES

### Environment
```
.env - Local configuration
.env.example - Template
```

### Database
```
config/database.php - Database settings
database/database.sqlite - SQLite file
```

### Application
```
config/app.php - App configuration
config/auth.php - Authentication config
```

### Frontend
```
package.json - NPM dependencies
vite.config.js - Build configuration
tailwind.config.js - Tailwind config
```

### Backend
```
composer.json - PHP dependencies
phpunit.xml - Testing configuration
```

---

## 🧪 TESTING STRUCTURE

### Feature Tests
```
tests/Feature/ExampleTest.php
```

### Unit Tests
```
tests/Unit/ExampleTest.php
```

### Future Tests (to be created)
```
tests/Feature/MahasiswaControllerTest.php
tests/Feature/RoleMiddlewareTest.php
tests/Unit/MahasiswaModelTest.php
```

---

## 📦 PACKAGE STRUCTURE

### Composer Packages (vendor/)
- laravel/framework
- laravel/breeze (after install)
- laravel/tinker
- phpunit/phpunit
- etc.

### NPM Packages (node_modules/)
- vite
- laravel-vite-plugin
- tailwindcss
- autoprefixer
- postcss
- alpinejs
- etc.

---

## 🔄 DATA FLOW

### Create Mahasiswa Flow
```
User clicks "Tambah"
    ↓
GET /mahasiswa/create
    ↓
Route → Middleware (auth, role:admin)
    ↓
MahasiswaController@create
    ↓
Return view mahasiswa/create
    ↓
User fills form
    ↓
POST /mahasiswa
    ↓
Route → Middleware (auth, role:admin)
    ↓
MahasiswaController@store
    ↓
Validate input
    ↓
Mahasiswa::create()
    ↓
INSERT into database
    ↓
Redirect to /mahasiswa
    ↓
Show success message
```

### Authorization Flow
```
Request → Route
    ↓
Middleware: auth
    ↓
Check: User logged in?
    ├─ No → Redirect to login
    └─ Yes → Continue
         ↓
    Middleware: role:admin
         ↓
    Check: User role = admin?
    ├─ No → abort(403)
    └─ Yes → Continue
         ↓
    Controller
```

---

## 🎯 KEY FILES TO REVIEW

### For Understanding Logic
1. `routes/web.php` - Entry points
2. `app/Http/Middleware/CheckRole.php` - Authorization
3. `app/Http/Controllers/MahasiswaController.php` - Business logic
4. `app/Models/Mahasiswa.php` - Data model

### For Understanding Database
1. `database/migrations/*` - Schema
2. `database/seeders/*` - Sample data
3. `.env` - Database connection

### For Understanding Views
1. `resources/views/layouts/app.blade.php` - Main layout
2. `resources/views/mahasiswa/index.blade.php` - List view
3. `resources/views/mahasiswa/create.blade.php` - Form example

---

## 📚 DOCUMENTATION HIERARCHY

```
📖 README.md
   ├─ Quick overview
   ├─ Installation summary
   ├─ Features list
   └─ Brief analysis answers

📖 INSTALASI.md
   ├─ Detailed step-by-step
   ├─ Screenshot checklist
   ├─ Troubleshooting
   └─ Testing guide

📖 JAWABAN_ANALISIS.md
   ├─ 8 Questions detailed
   ├─ Diagrams
   ├─ Code examples
   └─ Best practices

📖 SUMMARY.md
   ├─ Project status
   ├─ Files created
   ├─ Checklist
   └─ Statistics

📖 QUICK_START.md
   ├─ Copy-paste commands
   ├─ Quick testing
   └─ Verification

📖 STRUCTURE.md (this file)
   ├─ Complete file tree
   ├─ File purposes
   ├─ Dependencies
   └─ Data flow
```

---

## ✅ VERIFICATION CHECKLIST

### Files Created
- [ ] All migration files exist
- [ ] All model files exist
- [ ] All controller files exist
- [ ] All middleware files exist
- [ ] All seeder files exist
- [ ] All view files exist
- [ ] All documentation files exist

### Configuration Updated
- [ ] bootstrap/app.php updated
- [ ] routes/web.php updated
- [ ] DatabaseSeeder.php updated

### Ready for Installation
- [ ] All PHP files valid syntax
- [ ] All Blade files valid syntax
- [ ] All documentation complete

---

## 🚀 NEXT STEPS

1. **Install Breeze** - Will add auth scaffolding
2. **Run NPM** - Will compile assets
3. **Run Migration** - Will create tables
4. **Run Seeder** - Will populate data
5. **Test Application** - Verify all features
6. **Take Screenshots** - For documentation
7. **Push to GitHub** - Final submission

---

## 📊 PROJECT METRICS

- **Total Files Created**: 21 custom files
- **Total Lines of Code**: ~10,300+ lines
- **PHP Files**: 7
- **Blade Templates**: 5
- **Documentation**: 6 files
- **Time to Build**: ~2 hours
- **Time to Install**: ~15 minutes
- **Time to Test**: ~20 minutes

---

**Project Structure documented by:**  
Razzi Ronaldi - NPM 25781020 - MI 3 A  
Date: 1 Oktober 2026
