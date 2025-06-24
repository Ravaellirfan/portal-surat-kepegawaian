-- SQL untuk membuat tabel pegawai
CREATE DATABASE IF NOT EXISTS bgtk_db;
USE bgtk_db;

-- Tabel pegawai
CREATE TABLE IF NOT EXISTS pegawai (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  jenis VARCHAR(100) NOT NULL,
  mulai DATE NOT NULL,
  waktu TIME DEFAULT NULL,
  selesai DATE NOT NULL,
  penempatan VARCHAR(100) NOT NULL,
  dinas ENUM('Dalam Kantor', 'Dinas Luar') NOT NULL,
  status ENUM('aktif','selesai') NOT NULL DEFAULT 'aktif',
  kategori VARCHAR(100) DEFAULT NULL,
  file VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel users untuk login
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel surat untuk manajemen surat
CREATE TABLE IF NOT EXISTS surat (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nomor VARCHAR(100) NOT NULL,
  judul VARCHAR(255) NOT NULL,
  kategori VARCHAR(100) NOT NULL,
  tanggal DATE NOT NULL,
  isi TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel pesan untuk menyimpan pesan dari kontak.html
CREATE TABLE IF NOT EXISTS pesan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  pesan TEXT NOT NULL,
  tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Contoh data admin dan user (password: admin123, user123, hash bcrypt)
-- Silakan generate hash password dengan password_hash('admin123', PASSWORD_BCRYPT) di PHP
-- Hash di bawah sudah diganti dengan hash bcrypt hasil generate_hash.php
INSERT IGNORE INTO users (username, password, role) VALUES
('admin', '$2y$10$gSYIjXn79t3IsVk/ozufw.2hPKtLoH5TKkTLYe5.wiW2Pws6pPamS', 'admin'),
('user', '$2y$10$kM2c616f4cxfziSd41h6g.Ia1Qut4sEv2Qc69Xe2WYXn0Lj6HE7mS', 'user');
