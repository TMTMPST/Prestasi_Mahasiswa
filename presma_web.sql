/*==============================================================*/
/* DBMS name:      SQL Server 2019                              */
/* Created on:     20/11/2024 08:46:13                          */
/*==============================================================*/

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
   SESRTIF              VARCHAR(1024),
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
   ID_ADMIN             INT,  -- Change to INT as ID_ADMIN is now auto-incremented
   NAMA                 VARCHAR(100),
   PRODI                VARCHAR(30),
   EMAIL                VARCHAR(30),
   NO_TELP              VARCHAR(15),
   ANGKATAN				INT,
   PASSWORD             VARCHAR(30),
   CONSTRAINT PK_MAHASISWA PRIMARY KEY (NIM)
);

--==============================================================--
-- Table: PRESTASI                                              --
--==============================================================--
CREATE TABLE dbo.PRESTASI
(
   ID_PRESTASI          INT IDENTITY(1,1) NOT NULL,  -- Auto increment
   NIM                  VARCHAR(12),
   ID_ADMIN             INT,  -- Change to INT as ID_ADMIN is now auto-incremented
   NIP					VARCHAR(12),
   JENIS_PRESTASI       VARCHAR(100),
   NAMA_LOMBA           VARCHAR(150),
   PERINGKAT            VARCHAR(100),
   PENYELENGGARA        VARCHAR(100),
   STATUS               VARCHAR(100),
   CONSTRAINT PK_PRESTASI PRIMARY KEY (ID_PRESTASI)
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
	NIP					VARCHAR(12) NOT NULL,
	NAMA_DOSEN			VARCHAR(100)
);

--==============================================================--
-- Adding Foreign Key Constraints                               --
--==============================================================--

-- Foreign key from DOKUMEN to PRESTASI
ALTER TABLE dbo.DOKUMEN
ADD CONSTRAINT FK_MEMILIKI FOREIGN KEY (ID_PRESTASI)
    REFERENCES dbo.PRESTASI (ID_PRESTASI)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Foreign key from MAHASISWA to ADMIN
ALTER TABLE dbo.MAHASISWA
ADD CONSTRAINT FK_MEMASUKKAN FOREIGN KEY (ID_ADMIN)
    REFERENCES dbo.ADMIN (ID_ADMIN)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Foreign key from PRESTASI to ADMIN
ALTER TABLE dbo.PRESTASI
ADD CONSTRAINT FK_MEMVALIDASI FOREIGN KEY (ID_ADMIN)
    REFERENCES dbo.ADMIN (ID_ADMIN)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

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
ALTER TABLE dbo.TINGKAT
ADD CONSTRAINT FK_MEMBIMBING FOREIGN KEY (NIP)
    REFERENCES dbo.DOSEN (NIP)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
