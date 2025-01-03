/*==============================================================*/
/* DBMS name:      SQL Server 2019                              */
/* Created on:     20/11/2024 08:46:13                          */
/*==============================================================*/

create database presma_web;
use CRUD;
-- Drop tables if they exist
IF OBJECT_ID('dbo.ADMIN', 'U') IS NOT NULL
    DROP TABLE dbo.ADMIN;

IF OBJECT_ID('dbo.DOKUMEN', 'U') IS NOT NULL
    DROP TABLE dbo.DOKUMEN;

IF OBJECT_ID('dbo.MAHASISWA', 'U') IS NOT NULL
    DROP TABLE dbo.MAHASISWA;

IF OBJECT_ID('dbo.PRESTASI', 'U') IS NOT NULL
    DROP TABLE dbo.PRESTASI;

IF OBJECT_ID('dbo.TINGKAT', 'U') IS NOT NULL
    DROP TABLE dbo.TINGKAT;

IF OBJECT_ID('dbo.dosen', 'U') IS NOT NULL
    DROP TABLE dbo.dosen;

--DROP TABLE dbo.DETAIL_PRESTASI;

--==============================================================--
-- Table: ADMIN                                                 --
--==============================================================--
CREATE TABLE dbo.ADMIN
(
   ID_ADMIN             INT IDENTITY(1,1) NOT NULL,  -- Auto increment
   USERNAME             VARCHAR(50),
   PASSWORD_ADMIN       VARCHAR(30),
   NAMA_ADMIN           VARCHAR(50),

   CONSTRAINT PK_ADMIN PRIMARY KEY (ID_ADMIN)
);

--==============================================================--
-- Table: DOKUMEN                                               --
--==============================================================--
CREATE TABLE dbo.DOKUMEN
(
   ID_DOKUMEN           INT IDENTITY(1,1) NOT NULL,  -- Auto increment
   ID_PRESTASI          INT,  -- Changed to INT to match PRESTASI
   SERTIFIKAT           VARCHAR(1024),
   PROPOSAL             VARCHAR(1024),
   SURAT_TUGAS          VARCHAR(1024),
   KARYA                VARCHAR(1024),
   CONSTRAINT PK_DOKUMEN PRIMARY KEY (ID_DOKUMEN)
);

--==============================================================--
-- Table: MAHASISWA                                             --
--==============================================================--
CREATE TABLE dbo.MAHASISWA
(
   NIM                  VARCHAR(12) NOT NULL,
   NAMA                 VARCHAR(100),
   PRODI                VARCHAR(30),
   EMAIL                VARCHAR(30),
   FOTO_PROFIL			VARCHAR(100),
   ANGKATAN				INT,
   PASSWORD             VARCHAR(30),
   TOTAL_POIN			INT,
   CONSTRAINT PK_MAHASISWA PRIMARY KEY (NIM)
);

--==============================================================--
-- Table: PRESTASI                                              --
--==============================================================--
CREATE TABLE dbo.PRESTASI
(
   ID_PRESTASI          INT IDENTITY(1,1) NOT NULL,  -- Auto increment
   NIM                  VARCHAR(12),
   --ID_ADMIN             INT,  -- Change to INT as ID_ADMIN is now auto-incremented
   ID_DOKUMEN			INT,
   ID_DETAIL			INT,
   NIP					VARCHAR(12),
   JENIS_PRESTASI       VARCHAR(100),
   PERINGKAT            VARCHAR(100),
   STATUS               VARCHAR(100),
   CONSTRAINT PK_PRESTASI PRIMARY KEY (ID_PRESTASI), 
);

--==============================================================--
-- Table: DETAIL_PRESTASI                                               --
--==============================================================--
CREATE TABLE dbo.DETAIL_PRESTASI
(
   ID_DETAIL           INT IDENTITY(1,1) NOT NULL,  -- Auto increment
   ID_PRESTASI          INT,  -- Change to INT to match PRESTASI
   TGL_KEGIATAN			DATE,
   NAMA_LOMBA           VARCHAR(150),
   LOKASI            VARCHAR(100),
   PENYELENGGARA        VARCHAR(100),
   CONSTRAINT PK_DETAIL PRIMARY KEY (ID_DETAIL)
);

--==============================================================--
-- Table: TINGKAT                                               --
--==============================================================--
CREATE TABLE dbo.TINGKAT
(
   ID_TINGKAT           INT IDENTITY(1,1) NOT NULL,  -- Auto increment
   ID_PRESTASI          INT,  -- Change to INT to match PRESTASI
   TINGKATAN            VARCHAR(100),
   POIN                 INT,
   CONSTRAINT PK_TINGKAT PRIMARY KEY (ID_TINGKAT)
);

--==============================================================--
-- Table: DOSEN                                               --
--==============================================================--
CREATE TABLE DOSEN
(
	NIP					VARCHAR(12) primary key NOT NULL,
	NAMA_DOSEN			VARCHAR(100)
	
);

--==============================================================--
-- Adding Foreign Key Constraints                               --
--==============================================================--




-- Foreign key from PRESTASI to ADMIN
--ALTER TABLE dbo.PRESTASI
--ADD CONSTRAINT FK_MEMVALIDASI FOREIGN KEY (ID_ADMIN)
--    REFERENCES dbo.ADMIN (ID_ADMIN)
--    ON DELETE CASCADE
--    ON UPDATE CASCADE;

-- Foreign key from PRESTASI to MAHASISWA with NO ACTION to avoid cycles
ALTER TABLE dbo.PRESTASI
ADD CONSTRAINT FK_MENGINPUTKAN FOREIGN KEY (NIM)
    REFERENCES dbo.MAHASISWA (NIM)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;

-- Foreign key from TINGKAT to PRESTASI
ALTER TABLE dbo.TINGKAT
ADD CONSTRAINT FK_MEMILIH FOREIGN KEY (ID_PRESTASI)
    REFERENCES dbo.PRESTASI (ID_PRESTASI)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Foreign key from DOSEN to PRESTASI
ALTER TABLE dbo.PRESTASI
ADD CONSTRAINT FK_PRESTASI_DOSEN
FOREIGN KEY (NIP)
REFERENCES DOSEN(NIP)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- Foreign key from DETAIL to PRESTASI
ALTER TABLE dbo.PRESTASI
ADD CONSTRAINT FK_PRESTASI_DETAIL
FOREIGN KEY (ID_DETAIL)
REFERENCES DETAIL_PRESTASI(ID_DETAIL)
ON DELETE CASCADE
ON UPDATE CASCADE;

--FK pretasi to dokumen
ALTER TABLE dbo.PRESTASI
ADD CONSTRAINT FK_DOKUMEN
FOREIGN KEY (ID_DOKUMEN)
REFERENCES dbo.DOKUMEN(ID_DOKUMEN)
ON DELETE CASCADE
ON UPDATE CASCADE;

INSERT INTO mahasiswa (NIM, NAMA, PRODI, EMAIL, FOTO_PROFIL, ANGKATAN, PASSWORD, TOTAL_POIN) VALUES
('21430001', 'Aulia Rahma', 'D4 Teknik Informatika', 'aulia.rahma@mail.com', 'aulia.jpg', 2021, 'password123', 85),
('21430002', 'Bagus Pratama', 'D4 Sistem Informasi Bisnis', 'bagus.pratama@mail.com', 'bagus.jpg', 2021, 'passbagus21', 90),
('21430003', 'Citra Amelia', 'D4 Teknik Informatika', 'citra.amelia@mail.com', 'citra.jpg', 2022, 'citrapsw', 78),
('21430004', 'Dimas Aditya', 'D4 Teknik Informatika', 'dimas.aditya@mail.com', 'dimas.jpg', 2020, 'dimastek123', 95),
('21430005', 'Eka Susanti', 'D4 Sistem Informasi Bisnis', 'eka.susanti@mail.com', 'eka.jpg', 2021, 'ekaSIB21', 88),
('21430006', 'Fikri Hidayat', 'D4 Teknik Informatika', 'fikri.hidayat@mail.com', 'fikri.jpg', 2022, 'fikirpl22', 80),
('21430007', 'Gita Arsy', 'D4 Teknik Informatika', 'gita.arsy@mail.com', 'gita.jpg', 2020, 'gitainform', 82),
('21430008', 'Hafidz Fathur', 'D4 Sistem Informasi Bisnis', 'hafidz.fathur@mail.com', 'hafidz.jpg', 2021, 'hafidzSIB', 87),
('21430009', 'Indah Lestari', 'D4 Teknik Informatika', 'indah.lestari@mail.com', 'indah.jpg', 2022, 'indahlst', 75),
('21430010', 'Joko Riyadi', 'D4 Teknik Informatika', 'joko.riyadi@mail.com', 'joko.jpg', 2019, 'jokotik123', 92);

INSERT INTO dosen (NIP, NAMA_DOSEN) VALUES
('1978121201', 'Dr. Ir. Budi Santoso, M.T.'),
('1980021502', 'Dr. Siti Lestari, S.Kom., M.T.'),
('1985102303', 'Drs. Andi Pratama, M.Kom.'),
('1987120404', 'Prof. Dr. Ratna Dewi, S.T., M.T.'),
('1990021505', 'Dr. Ahmad Faisal, M.Kom.'),
('1993050606', 'Dra. Lina Wati, S.T., M.T.'),
('1979051807', 'Dr. Hendra Supriadi, S.Kom., M.Sc.'),
('1981112708', 'Ir. Maya Sari, M.T., Ph.D.'),
('1983083009', 'Dr. Riko Darmawan, M.Eng.'),
('1990022110', 'Dr. Diana Rahmawati, S.T., M.T.');

SELECT * FROM DOSEN;
SET IDENTITY_INSERT DOKUMEN ON;
INSERT INTO dbo.DOKUMEN (ID_DOKUMEN, ID_PRESTASI, SERTIFIKAT, PROPOSAL, SURAT_TUGAS, KARYA) VALUES
(1, 101, 'sertifikat_olimpiade_2024.pdf', 'proposal_olimpiade_2024.pdf', 'surat_tugas_olimpiade.pdf', 'karya_poster_olimpiade.jpg'),
(2, 102, 'sertifikat_hackathon.pdf', NULL, 'surat_tugas_hackathon.pdf', 'prototype_aplikasi.zip'),
(3, 103, 'sertifikat_lkti.pdf', 'proposal_lkti_2024.pdf', NULL, 'paper_lkti.pdf'),
(4, 104, 'sertifikat_pemrograman.pdf', NULL, 'surat_tugas_pemrograman.pdf', 'kode_program.zip'),
(5, 105, 'sertifikat_karya_tulis.pdf', 'proposal_karya_tulis_2024.pdf', 'surat_tugas_karya_tulis.pdf', NULL),
(6, 106, 'sertifikat_seminar.pdf', NULL, NULL, 'presentasi_seminar.pptx'),
(7, 107, 'sertifikat_lomba_desain.pdf', 'proposal_desain_2024.pdf', 'surat_tugas_desain.pdf', 'desain_poster_final.jpg'),
(8, 108, NULL, 'proposal_pengabdian_2024.pdf', 'surat_tugas_pengabdian.pdf', 'laporan_pengabdian.pdf'),
(9, 109, 'sertifikat_penelitian.pdf', 'proposal_penelitian.pdf', NULL, 'hasil_penelitian.pdf'),
(10, 110, 'sertifikat_lomba_seni.pdf', NULL, NULL, 'video_performansi.mp4');
SET IDENTITY_INSERT DOKUMEN OFF;

SELECT * FROM dbo.DOKUMEN;
SET IDENTITY_INSERT DETAIL_PRESTASI ON;
INSERT INTO dbo.DETAIL_PRESTASI (ID_DETAIL, ID_PRESTASI, TGL_KEGIATAN, NAMA_LOMBA, LOKASI, PENYELENGGARA) VALUES
(1, 101, '2024-01-15', 'Olimpiade Matematika Nasional', 'Jakarta', 'Universitas Indonesia'),
(2, 102, '2024-02-10', 'Hackathon Nasional', 'Surabaya', 'Telkom University'),
(3, 103, '2024-03-05', 'Lomba Karya Tulis Ilmiah', 'Yogyakarta', 'Universitas Gadjah Mada'),
(4, 104, '2024-04-20', 'Kompetisi Pemrograman Nasional', 'Bandung', 'Institut Teknologi Bandung'),
(5, 105, '2024-05-25', 'Lomba Cipta Inovasi Teknologi', 'Malang', 'Politeknik Negeri Malang'),
(6, 106, '2024-06-15', 'Kompetisi Robotika Indonesia', 'Denpasar', 'Institut Teknologi Sepuluh Nopember'),
(7, 107, '2024-07-10', 'Lomba Desain Poster Digital', 'Semarang', 'Universitas Diponegoro'),
(8, 108, '2024-08-05', 'Lomba Business Plan Nasional', 'Medan', 'Universitas Sumatera Utara'),
(9, 109, '2024-09-20', 'Lomba Pemrograman Mobile Apps', 'Solo', 'Universitas Sebelas Maret'),
(10, 110, '2024-10-15', 'Kompetisi Game Development', 'Bali', 'Binus University');
SET IDENTITY_INSERT DETAIL_PRESTASI OFF;

SELECT * FROM dbo.DETAIL_PRESTASI;

-- Menghapus foreign key
ALTER TABLE pelanggan
DROP CONSTRAINT fk_pelanggan_order;

-- Menghapus kolom
ALTER TABLE pelanggan
DROP COLUMN nomor_telepon;

-- Menambah kolom baru
ALTER TABLE pelanggan
ADD email NVARCHAR(100) NOT NULL;


SELECT * FROM PRESTASI;