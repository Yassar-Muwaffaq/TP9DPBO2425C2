
---

```markdown
# TP9DPBO2425C2 - Game Store Management (PHP OOP)

> Tugas Praktikum OOP (Desain dan Pemrograman Berorientasi Objek) — Website manajemen data game dengan relasi antar tabel, menggunakan PHP + MySQL (PDO & Prepared Statement).

---

## 🎮 Tema Website
**Game Store Management**

Website ini berfungsi untuk mengelola data **game**, **developer**, dan **genre** seperti katalog game (mirip Google Play Store).  
Setiap game memiliki **developer** dan **genre**, dan data ini saling berhubungan melalui **foreign key**.

---

## 🧱 Struktur Database

Database: `tp9_gamestore`

### 1. `developers`
| Kolom | Tipe | Keterangan |
|--------|------|-------------|
| id | INT (PK, AUTO_INCREMENT) | ID developer |
| name | VARCHAR(100) | Nama developer |
| country | VARCHAR(100) | Negara asal developer |

### 2. `genres`
| Kolom | Tipe | Keterangan |
|--------|------|-------------|
| id | INT (PK, AUTO_INCREMENT) | ID genre |
| name | VARCHAR(100) | Nama genre |
| description | TEXT | Deskripsi genre |

### 3. `games`
| Kolom | Tipe | Keterangan |
|--------|------|-------------|
| id | INT (PK, AUTO_INCREMENT) | ID game |
| title | VARCHAR(200) | Judul game |
| developer_id | INT (FK → developers.id) | Developer pembuat game |
| genre_id | INT (FK → genres.id) | Genre game |
| release_year | INT | Tahun rilis |
| rating | DECIMAL(3,1) | Nilai rating |
| price | DECIMAL(10,2) | Harga game |

---

## 🔗 Relasi Antar Tabel

- **games.developer_id → developers.id**
- **games.genre_id → genres.id**

Diagram relasi sederhana:
```

developers (1)───(∞) games (∞)───(1) genres

````

---

## 💾 File SQL (Database)
File: `tp9_games.sql`

```sql
CREATE DATABASE IF NOT EXISTS tp9_gamestore;
USE tp9_gamestore;

CREATE TABLE developers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  country VARCHAR(100)
);

CREATE TABLE genres (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description TEXT
);

CREATE TABLE games (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(200) NOT NULL,
  developer_id INT NOT NULL,
  genre_id INT NOT NULL,
  release_year INT,
  rating DECIMAL(3,1),
  price DECIMAL(10,2),
  FOREIGN KEY (developer_id) REFERENCES developers(id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (genre_id) REFERENCES genres(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

-- Dummy Data
INSERT INTO developers (name, country) VALUES
('Valve', 'USA'),
('CD Projekt Red', 'Poland'),
('FromSoftware', 'Japan');

INSERT INTO genres (name, description) VALUES
('Shooter', 'First-person or third-person shooting games'),
('RPG', 'Role-playing games with character progression'),
('Action', 'Fast-paced gameplay with real-time combat');

INSERT INTO games (title, developer_id, genre_id, release_year, rating, price) VALUES
('Half-Life', 1, 1, 1998, 9.5, 29.99),
('The Witcher 3: Wild Hunt', 2, 2, 2015, 9.8, 39.99),
('Elden Ring', 3, 3, 2022, 9.7, 59.99);
````

---

## ⚙️ Struktur Folder Proyek

```
TP7DPBO2425C-<NIM>-<Nama>/
├─ public/
│  └─ index.php              # Router utama (CRUD Games/Developers/Genres)
├─ src/
│  ├─ config/
│  │  └─ database.php        # Koneksi PDO Singleton
│  ├─ models/
│  │  ├─ Game.php
│  │  ├─ Developer.php
│  │  └─ Genre.php
│  └─ views/
│     ├─ games/
│     │  ├─ list.php
│     │  └─ form.php
│     ├─ developers/
│     │  ├─ list.php
│     │  └─ form.php
│     └─ genres/
│        ├─ list.php
│        └─ form.php
├─ database.sql
└─ README.md
```

---

## 💻 Cara Menjalankan Aplikasi

1. Jalankan **MySQL** dan import `tp9_games.sql`.
2. Edit file `src/config/database.php` bila perlu (user, password, db name).
3. Jalankan server PHP di path folder public/:

   ```bash
   php -S localhost:8000 -t public
   ```
4. Buka browser ke [http://localhost:8000](http://localhost:8000)
5. Navigasi:

   * `Games` → CRUD data game
   * `Developers` → CRUD data developer
   * `Genres` → CRUD data genre

---

## 🧩 Fitur CRUD

| Entitas    | Create | Read | Update | Delete |
| ---------- | ------ | ---- | ------ | ------ |
| Games      | ✅      | ✅    | ✅      | ✅      |
| Developers | ✅      | ✅    | ✅      | ✅      |
| Genres     | ✅      | ✅    | ✅      | ✅      |

Semua operasi database menggunakan **PDO + Prepared Statements** (aman dari SQL Injection).

---

## 🧠 Flow Program (MVC sederhana)

1. `index.php` menerima parameter `page` dan `action`
2. Berdasarkan nilai `page`, sistem memanggil model dan menampilkan view:

   * `page=games` → `Game` model + view `games/list.php`
   * `page=developers` → `Developer` model + view `developers/list.php`
   * `page=genres` → `Genre` model + view `genres/list.php`
3. Semua data diambil dan diubah menggunakan model (OOP)
4. View hanya menampilkan data dalam tabel sederhana

---

## 📸 Dokumentasi

Screen record demonstrasi CRUD untuk:

* Menambah developer & genre
* Menambah game baru dengan relasi
* Mengedit & menghapus data
<video src="Demo.mp4" controls width="640" poster="assets/thumbnail.png">
  Maaf, browser Anda tidak mendukung video.
</video>

---

## ✅ Checklist Penilaian

* [x] 3 tabel dengan relasi FK
* [x] CRUD lengkap untuk semua tabel
* [x] Semua query pakai Prepared Statement (PDO)
* [x] UI sederhana tapi berfungsi
* [x] File `.sql` dan `README.md` ada
* [x] Project public di GitHub
* [x] Dokumentasi CRUD direkam

---

> **Author:** Yassar Muwaffaq
> **Mata Kuliah:** Desain dan Pemrograman Berorientasi Objek
> **Semester:** 3
> **Tahun:** 2024/2025                    
> **Dosen:** Rosa Ariani

```
