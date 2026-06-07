<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project

This is a heavy equipment rental application project to complete the
Back End Development course.

This project was developed by a team of student engineers consisting of:
1. Deandre Hayfa Pasha (Team Leader),
2. Farih Inayatur Rahman (Member).

The application project was compiled by Deandre Hayfa and Farih Inayatur.

---

## Technical Features & Setup Guide

### Prerequisites
* PHP >= 8.2
* Composer
* MySQL or SQLite

### Installation & Setup

1. **Clone & Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

2. **Configure Environment**:
   Duplicate the template environment file:
   ```bash
   copy .env.example .env
   ```
   Generate application key:
   ```bash
   php artisan key:generate
   ```

3. **Database Migration & Seeding**:
   To drop all tables, recreate the schema (using Indonesian naming conventions for course alignment), and seed default credentials:
   ```bash
   php artisan migrate:fresh --seed
   ```

   **Default Accounts Seeded**:
   * **Admin**: `dentbase11@gmail.com` | Password: `farih123`
   * **Standard User**: `andrehayfa@gmail.com` | Password: `deandre123`

4. **Running Locally**:
   Start the Laravel development server:
   ```bash
   php artisan serve
   ```
   Start the Vite asset bundler:
   ```bash
   npm run dev
   ```

5. **Running Tests**:
   To run all feature/unit verification tests:
   ```bash
   php artisan test
   ```

---

## Architectural & Database Structure

This project uses standard capitalized PSR-4 namespaces, with case-aligned Eloquent model classes mapping seamlessly to their respective singular Indonesian database tables:
* **`Admin`** (`admin` table)
* **`Alat_berat`** (`alat_berat` table)
* **`Halal_Industries`** (`halal_industries` table)
* **`Jadwal_alat`** (`jadwal_alat` table)
* **`Laporan_pekerjaan`** (`laporan_pekerjaan` table)
* **`Operator`** (`operator` table)
* **`Pelanggan`** (`pelanggan` table)
* **`Properti`** (`properti` table)
* **`Transaksi`** (`transaksi` table)
* **`User`** (`users` table)

---

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
