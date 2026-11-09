CREATE DATABASE IF NOT EXISTS ATS613250026;
USE ATS613250026;

CREATE TABLE member_026 (
  id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(34) NOT NULL,
  password VARCHAR(32) NOT NULL,
  nama VARCHAR(50) NOT NULL,
  aktive ENUM('1','0') NOT NULL DEFAULT '1'
);

INSERT INTO member_026 (email, password, nama, aktive) VALUES
('alfanisabasri6@mail.com',('fani123'), 'al fanisa basri', '1');

CREATE TABLE mobi026 (
  no_id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nomor_kendaraan VARCHAR(12) NOT NULL,
  jenis_kendaraan ENUM('Sedan','Pickup','Truk','Bemo') NOT NULL,
  pemilik VARCHAR(50) NOT NULL,
  tahun_pembuatan CHAR(4) NOT NULL
);

INSERT INTO mobi026 (nomor_kendaraan, jenis_kendaraan, pemilik, tahun_pembuatan) VALUES
('D 1234 AB', 'Sedan', 'Al Fanisa Basri', '2020'),
('D 5678 CD', 'Pickup', 'Revina Septianur P', '2019'),
('D 9012 EF', 'Truk', 'Fiola Ainnunisya', '2018');
