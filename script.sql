/****** Object:  Database [presma_web]    Script Date: 10/12/2024 01:24:27 ******/
CREATE DATABASE [presma_web]   WITH CATALOG_COLLATION = DATABASE_DEFAULT, LEDGER = OFF;
GO
ALTER DATABASE [presma_web] SET COMPATIBILITY_LEVEL = 160
GO
ALTER DATABASE [presma_web] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [presma_web] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [presma_web] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [presma_web] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [presma_web] SET ARITHABORT OFF 
GO
ALTER DATABASE [presma_web] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [presma_web] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [presma_web] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [presma_web] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [presma_web] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [presma_web] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [presma_web] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [presma_web] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [presma_web] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [presma_web] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [presma_web] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [presma_web] SET  MULTI_USER 
GO
ALTER DATABASE [presma_web] SET QUERY_STORE = ON
GO
ALTER DATABASE [presma_web] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
/****** Object:  Table [dbo].[ADMIN]    Script Date: 10/12/2024 01:24:27 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ADMIN](
	[ID_ADMIN] [int] IDENTITY(1,1) NOT NULL,
	[USERNAME] [varchar](50) NULL,
	[PASSWORD_ADMIN] [varchar](30) NULL,
	[NAMA_ADMIN] [varchar](50) NULL,
 CONSTRAINT [PK_ADMIN] PRIMARY KEY CLUSTERED 
(
	[ID_ADMIN] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[DETAIL_PRESTASI]    Script Date: 10/12/2024 01:24:27 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DETAIL_PRESTASI](
	[ID_DETAIL] [int] IDENTITY(1,1) NOT NULL,
	[TGL_KEGIATAN] [date] NULL,
	[NAMA_LOMBA] [varchar](150) NULL,
	[LOKASI] [varchar](100) NULL,
	[PENYELENGGARA] [varchar](100) NULL,
 CONSTRAINT [PK_DETAIL] PRIMARY KEY CLUSTERED 
(
	[ID_DETAIL] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[DOKUMEN]    Script Date: 10/12/2024 01:24:27 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DOKUMEN](
	[ID_DOKUMEN] [int] IDENTITY(1,1) NOT NULL,
	[SERTIFIKAT] [varchar](1024) NULL,
	[PROPOSAL] [varchar](1024) NULL,
	[SURAT_TUGAS] [varchar](1024) NULL,
	[KARYA] [varchar](1024) NULL,
 CONSTRAINT [PK_DOKUMEN] PRIMARY KEY CLUSTERED 
(
	[ID_DOKUMEN] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[DOSEN]    Script Date: 10/12/2024 01:24:27 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DOSEN](
	[NIP] [varchar](12) NOT NULL,
	[NAMA_DOSEN] [varchar](100) NULL,
PRIMARY KEY CLUSTERED 
(
	[NIP] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[MAHASISWA]    Script Date: 10/12/2024 01:24:27 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MAHASISWA](
	[NIM] [varchar](12) NOT NULL,
	[NAMA] [varchar](100) NULL,
	[PRODI] [varchar](30) NULL,
	[EMAIL] [varchar](30) NULL,
	[FOTO_PROFIL] [varchar](100) NULL,
	[ANGKATAN] [int] NULL,
	[PASSWORD] [varchar](30) NULL,
	[TOTAL_POIN] [int] NULL,
 CONSTRAINT [PK_MAHASISWA] PRIMARY KEY CLUSTERED 
(
	[NIM] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[PRESTASI]    Script Date: 10/12/2024 01:24:27 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[PRESTASI](
	[ID_PRESTASI] [int] IDENTITY(1,1) NOT NULL,
	[NIM] [varchar](12) NULL,
	[ID_DOKUMEN] [int] NULL,
	[ID_DETAIL] [int] NULL,
	[NIP] [varchar](12) NULL,
	[JENIS_PRESTASI] [varchar](100) NULL,
	[PERINGKAT] [varchar](100) NULL,
	[STATUS] [varchar](100) NULL,
	[ID_TINGKAT] [int] NULL,
 CONSTRAINT [PK_PRESTASI] PRIMARY KEY CLUSTERED 
(
	[ID_PRESTASI] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TINGKAT]    Script Date: 10/12/2024 01:24:27 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TINGKAT](
	[ID_TINGKAT] [int] IDENTITY(1,1) NOT NULL,
	[TINGKATAN] [varchar](100) NULL,
	[POIN] [int] NULL,
 CONSTRAINT [PK_TINGKAT] PRIMARY KEY CLUSTERED 
(
	[ID_TINGKAT] ASC
)WITH (STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[ADMIN] ON 

INSERT [dbo].[ADMIN] ([ID_ADMIN], [USERNAME], [PASSWORD_ADMIN], [NAMA_ADMIN]) VALUES (1, N'TNCP', N'12345', N'Tionusa')
SET IDENTITY_INSERT [dbo].[ADMIN] OFF
GO
SET IDENTITY_INSERT [dbo].[DETAIL_PRESTASI] ON 

INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (1, CAST(N'2024-01-15' AS Date), N'Olimpiade Matematika Nasional', N'Jakarta', N'Universitas Indonesia')
INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (2, CAST(N'2024-02-10' AS Date), N'Hackathon Nasional', N'Surabaya', N'Telkom University')
INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (3, CAST(N'2024-03-05' AS Date), N'Lomba Karya Tulis Ilmiah', N'Yogyakarta', N'Universitas Gadjah Mada')
INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (4, CAST(N'2024-04-20' AS Date), N'Kompetisi Pemrograman Nasional', N'Bandung', N'Institut Teknologi Bandung')
INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (5, CAST(N'2024-05-25' AS Date), N'Lomba Cipta Inovasi Teknologi', N'Malang', N'Politeknik Negeri Malang')
INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (6, CAST(N'2024-06-15' AS Date), N'Kompetisi Robotika Indonesia', N'Denpasar', N'Institut Teknologi Sepuluh Nopember')
INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (7, CAST(N'2024-07-10' AS Date), N'Lomba Desain Poster Digital', N'Semarang', N'Universitas Diponegoro')
INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (8, CAST(N'2024-08-05' AS Date), N'Lomba Business Plan Nasional', N'Medan', N'Universitas Sumatera Utara')
INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (9, CAST(N'2024-09-20' AS Date), N'Lomba Pemrograman Mobile Apps', N'Solo', N'Universitas Sebelas Maret')
INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (10, CAST(N'2024-10-15' AS Date), N'Kompetisi Game Development', N'Bali', N'Binus University')
INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (15, CAST(N'2024-06-15' AS Date), N'Lomba', N'Lokasi', N'Politeknik Negeri Batam')
INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (16, CAST(N'2024-12-01' AS Date), N'PlayIT', N'Malang', N'Politeknik Negeri Malang')
INSERT [dbo].[DETAIL_PRESTASI] ([ID_DETAIL], [TGL_KEGIATAN], [NAMA_LOMBA], [LOKASI], [PENYELENGGARA]) VALUES (17, CAST(N'2024-12-10' AS Date), N'nama', N'lok', N'penyelenggara')
SET IDENTITY_INSERT [dbo].[DETAIL_PRESTASI] OFF
GO
SET IDENTITY_INSERT [dbo].[DOKUMEN] ON 

INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (1, N'sertifikat_olimpiade_2024.pdf', N'proposal_olimpiade_2024.pdf', N'surat_tugas_olimpiade.pdf', N'karya_poster_olimpiade.jpg')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (2, N'sertifikat_hackathon.pdf', NULL, N'surat_tugas_hackathon.pdf', N'prototype_aplikasi.zip')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (3, N'sertifikat_lkti.pdf', N'proposal_lkti_2024.pdf', NULL, N'paper_lkti.pdf')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (4, N'sertifikat_pemrograman.pdf', NULL, N'surat_tugas_pemrograman.pdf', N'kode_program.zip')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (5, N'sertifikat_karya_tulis.pdf', N'proposal_karya_tulis_2024.pdf', N'surat_tugas_karya_tulis.pdf', NULL)
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (6, N'sertifikat_seminar.pdf', NULL, NULL, N'presentasi_seminar.pptx')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (7, N'sertifikat_lomba_desain.pdf', N'proposal_desain_2024.pdf', N'surat_tugas_desain.pdf', N'desain_poster_final.jpg')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (8, NULL, N'proposal_pengabdian_2024.pdf', N'surat_tugas_pengabdian.pdf', N'laporan_pengabdian.pdf')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (9, N'sertifikat_penelitian.pdf', N'proposal_penelitian.pdf', NULL, N'hasil_penelitian.pdf')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (10, N'sertifikat_lomba_seni.pdf', NULL, NULL, N'video_performansi.mp4')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (11, N'TEST', NULL, NULL, NULL)
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (12, N'WhatsApp_Image_2024-11-27_at_19.44.15_71a5aa3f-removebg-preview.png', N'../uploads/\WhatsApp_Image_2024-11-27_at_19.44.15_71a5aa3f-removebg-preview.png', NULL, NULL)
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (13, N'TEST', NULL, NULL, NULL)
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (14, N'../uploads/\WhatsApp_Image_2024-11-27_at_19.44.15_71a5aa3f-removebg-preview.png', N'../uploads/\transparent.ico', N'../uploads/\android_logo.png', N'../uploads/\bg_compose_background.png')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (15, N'../uploads/\bg.png', N'../uploads/\icon-16.png', N'../uploads/\icon-128.png', N'../uploads/\logo.png')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (16, N'../uploads/\21430001_bg_1733756490png', N'../uploads/\21430001_icon-16_1733756490png', N'../uploads/\21430001_icon-128_1733756490png', N'../uploads/\21430001_logo_1733756490png')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (17, N'../uploads/\21430001_bg_1733756709.png', N'../uploads/\21430001_icon-16_1733756709.png', N'../uploads/\21430001_icon-128_1733756709.png', N'../uploads/\21430001_logo_1733756709.png')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (18, N'Rawr', N'propose', N'Surat tugas', N'Mahakarya')
INSERT [dbo].[DOKUMEN] ([ID_DOKUMEN], [SERTIFIKAT], [PROPOSAL], [SURAT_TUGAS], [KARYA]) VALUES (19, N'../uploads/\21430001_bg_1733767454.png', N'../uploads/\21430001_icon-16_1733767454.png', N'../uploads/\21430001_icon-128_1733767454.png', N'../uploads/\21430001_logo_1733767454.png')
SET IDENTITY_INSERT [dbo].[DOKUMEN] OFF
GO
INSERT [dbo].[DOSEN] ([NIP], [NAMA_DOSEN]) VALUES (N'1978121201', N'Dr. Ir. Budi Santoso, M.T.')
INSERT [dbo].[DOSEN] ([NIP], [NAMA_DOSEN]) VALUES (N'1979051807', N'Dr. Hendra Supriadi, S.Kom., M.Sc.')
INSERT [dbo].[DOSEN] ([NIP], [NAMA_DOSEN]) VALUES (N'1980021502', N'Dr. Siti Lestari, S.Kom., M.T.')
INSERT [dbo].[DOSEN] ([NIP], [NAMA_DOSEN]) VALUES (N'1981112708', N'Ir. Maya Sari, M.T., Ph.D.')
INSERT [dbo].[DOSEN] ([NIP], [NAMA_DOSEN]) VALUES (N'1983083009', N'Dr. Riko Darmawan, M.Eng.')
INSERT [dbo].[DOSEN] ([NIP], [NAMA_DOSEN]) VALUES (N'1985102303', N'Drs. Andi Pratama, M.Kom.')
INSERT [dbo].[DOSEN] ([NIP], [NAMA_DOSEN]) VALUES (N'1987120404', N'Prof. Dr. Ratna Dewi, S.T., M.T.')
INSERT [dbo].[DOSEN] ([NIP], [NAMA_DOSEN]) VALUES (N'1990021505', N'Dr. Ahmad Faisal, M.Kom.')
INSERT [dbo].[DOSEN] ([NIP], [NAMA_DOSEN]) VALUES (N'1990022110', N'Dr. Diana Rahmawati, S.T., M.T.')
INSERT [dbo].[DOSEN] ([NIP], [NAMA_DOSEN]) VALUES (N'1993050606', N'Dra. Lina Wati, S.T., M.T.')
GO
INSERT [dbo].[MAHASISWA] ([NIM], [NAMA], [PRODI], [EMAIL], [FOTO_PROFIL], [ANGKATAN], [PASSWORD], [TOTAL_POIN]) VALUES (N'21430001', N'Aulia Rahma', N'D4 Teknik Informatika', N'aulia.rahma@mail.com', N'aulia.jpg', 2021, N'password123', 85)
INSERT [dbo].[MAHASISWA] ([NIM], [NAMA], [PRODI], [EMAIL], [FOTO_PROFIL], [ANGKATAN], [PASSWORD], [TOTAL_POIN]) VALUES (N'21430002', N'Bagus Pratama', N'D4 Sistem Informasi Bisnis', N'bagus.pratama@mail.com', N'bagus.jpg', 2021, N'passbagus21', 90)
INSERT [dbo].[MAHASISWA] ([NIM], [NAMA], [PRODI], [EMAIL], [FOTO_PROFIL], [ANGKATAN], [PASSWORD], [TOTAL_POIN]) VALUES (N'21430003', N'Citra Amelia', N'D4 Teknik Informatika', N'citra.amelia@mail.com', N'citra.jpg', 2022, N'citrapsw', 78)
INSERT [dbo].[MAHASISWA] ([NIM], [NAMA], [PRODI], [EMAIL], [FOTO_PROFIL], [ANGKATAN], [PASSWORD], [TOTAL_POIN]) VALUES (N'21430004', N'Dimas Aditya', N'D4 Teknik Informatika', N'dimas.aditya@mail.com', N'dimas.jpg', 2020, N'dimastek123', 95)
INSERT [dbo].[MAHASISWA] ([NIM], [NAMA], [PRODI], [EMAIL], [FOTO_PROFIL], [ANGKATAN], [PASSWORD], [TOTAL_POIN]) VALUES (N'21430005', N'Eka Susanti', N'D4 Sistem Informasi Bisnis', N'eka.susanti@mail.com', N'eka.jpg', 2021, N'ekaSIB21', 88)
INSERT [dbo].[MAHASISWA] ([NIM], [NAMA], [PRODI], [EMAIL], [FOTO_PROFIL], [ANGKATAN], [PASSWORD], [TOTAL_POIN]) VALUES (N'21430006', N'Fikri Hidayat', N'D4 Teknik Informatika', N'fikri.hidayat@mail.com', N'fikri.jpg', 2022, N'fikirpl22', 80)
INSERT [dbo].[MAHASISWA] ([NIM], [NAMA], [PRODI], [EMAIL], [FOTO_PROFIL], [ANGKATAN], [PASSWORD], [TOTAL_POIN]) VALUES (N'21430007', N'Gita Arsy', N'D4 Teknik Informatika', N'gita.arsy@mail.com', N'gita.jpg', 2020, N'gitainform', 82)
INSERT [dbo].[MAHASISWA] ([NIM], [NAMA], [PRODI], [EMAIL], [FOTO_PROFIL], [ANGKATAN], [PASSWORD], [TOTAL_POIN]) VALUES (N'21430008', N'Hafidz Fathur', N'D4 Sistem Informasi Bisnis', N'hafidz.fathur@mail.com', N'hafidz.jpg', 2021, N'hafidzSIB', 87)
INSERT [dbo].[MAHASISWA] ([NIM], [NAMA], [PRODI], [EMAIL], [FOTO_PROFIL], [ANGKATAN], [PASSWORD], [TOTAL_POIN]) VALUES (N'21430009', N'Indah Lestari', N'D4 Teknik Informatika', N'indah.lestari@mail.com', N'indah.jpg', 2022, N'indahlst', 75)
INSERT [dbo].[MAHASISWA] ([NIM], [NAMA], [PRODI], [EMAIL], [FOTO_PROFIL], [ANGKATAN], [PASSWORD], [TOTAL_POIN]) VALUES (N'21430010', N'Joko Riyadi', N'D4 Teknik Informatika', N'joko.riyadi@mail.com', N'joko.jpg', 2019, N'jokotik123', 92)
GO
SET IDENTITY_INSERT [dbo].[PRESTASI] ON 

INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (1, N'21430001', NULL, NULL, N'1978121201', NULL, N'juara aja', N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (17, N'21430001', NULL, NULL, NULL, N'Akademik', N'peringkat', N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (18, N'21430001', NULL, NULL, NULL, N'Akademik', N'peringkat', N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (19, N'21430001', NULL, NULL, NULL, N'Akademik', N'peringkat', N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (20, NULL, NULL, 15, NULL, N'nilaiA', N'nilaiB', NULL, NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (21, N'21430001', NULL, NULL, N'1990022110', N'Akademik', N'peringkat', N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (22, N'21430001', NULL, NULL, N'1990022110', N'Akademik', N'peringkat', N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (23, N'21430001', NULL, NULL, N'1980021502', N'Akademik', N'1', N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (24, N'21430001', NULL, NULL, N'1978121201', N'Akademik', N'1', N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (25, N'21430001', NULL, NULL, N'1993050606', N'Non Akademik', N'peringkat2', N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (26, N'21430001', NULL, NULL, N'1993050606', N'Non Akademik', N'peringkat2', N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (27, N'21430001', NULL, NULL, N'1993050606', N'Non Akademik', N'peringkat2', N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (28, N'21430001', NULL, NULL, N'1993050606', N'Non Akademik', N'peringkat2', N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (29, NULL, NULL, NULL, NULL, NULL, NULL, N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (30, NULL, NULL, NULL, NULL, NULL, NULL, N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (31, NULL, NULL, NULL, NULL, NULL, NULL, N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (32, NULL, NULL, NULL, NULL, NULL, NULL, N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (33, NULL, NULL, NULL, NULL, NULL, NULL, N'pending', NULL)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (34, N'21430001', 18, 16, N'1978121201', N'Non Akademik', N'Juara 1', N'Pending', 2)
INSERT [dbo].[PRESTASI] ([ID_PRESTASI], [NIM], [ID_DOKUMEN], [ID_DETAIL], [NIP], [JENIS_PRESTASI], [PERINGKAT], [STATUS], [ID_TINGKAT]) VALUES (35, N'21430001', 19, 17, N'1983083009', N'Non Akademik', N'peringkat', N'Pending', 1)
SET IDENTITY_INSERT [dbo].[PRESTASI] OFF
GO
SET IDENTITY_INSERT [dbo].[TINGKAT] ON 

INSERT [dbo].[TINGKAT] ([ID_TINGKAT], [TINGKATAN], [POIN]) VALUES (1, N'Provinsi', 5)
INSERT [dbo].[TINGKAT] ([ID_TINGKAT], [TINGKATAN], [POIN]) VALUES (2, N'Nasional', 10)
INSERT [dbo].[TINGKAT] ([ID_TINGKAT], [TINGKATAN], [POIN]) VALUES (3, N'Internasional', 15)
SET IDENTITY_INSERT [dbo].[TINGKAT] OFF
GO
ALTER TABLE [dbo].[PRESTASI]  WITH CHECK ADD  CONSTRAINT [FK_DOKUMEN] FOREIGN KEY([ID_DOKUMEN])
REFERENCES [dbo].[DOKUMEN] ([ID_DOKUMEN])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[PRESTASI] CHECK CONSTRAINT [FK_DOKUMEN]
GO
ALTER TABLE [dbo].[PRESTASI]  WITH CHECK ADD  CONSTRAINT [FK_MEMILIH] FOREIGN KEY([ID_TINGKAT])
REFERENCES [dbo].[TINGKAT] ([ID_TINGKAT])
GO
ALTER TABLE [dbo].[PRESTASI] CHECK CONSTRAINT [FK_MEMILIH]
GO
ALTER TABLE [dbo].[PRESTASI]  WITH CHECK ADD  CONSTRAINT [FK_MENGINPUTKAN] FOREIGN KEY([NIM])
REFERENCES [dbo].[MAHASISWA] ([NIM])
GO
ALTER TABLE [dbo].[PRESTASI] CHECK CONSTRAINT [FK_MENGINPUTKAN]
GO
ALTER TABLE [dbo].[PRESTASI]  WITH CHECK ADD  CONSTRAINT [FK_PRESTASI_DETAIL] FOREIGN KEY([ID_DETAIL])
REFERENCES [dbo].[DETAIL_PRESTASI] ([ID_DETAIL])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[PRESTASI] CHECK CONSTRAINT [FK_PRESTASI_DETAIL]
GO
ALTER TABLE [dbo].[PRESTASI]  WITH CHECK ADD  CONSTRAINT [FK_PRESTASI_DOSEN] FOREIGN KEY([NIP])
REFERENCES [dbo].[DOSEN] ([NIP])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[PRESTASI] CHECK CONSTRAINT [FK_PRESTASI_DOSEN]
GO
/****** Object:  StoredProcedure [dbo].[InsertPrestasi]    Script Date: 10/12/2024 01:24:27 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[InsertPrestasi]
	@tanggal DATE,
	@lomba VARCHAR(150),
	@lokasi VARCHAR(100),
	@penyelenggara VARCHAR(100),
    @nim VARCHAR(12),
	@nip VARCHAR(12),
	@jenis_prestasi VARCHAR(100),
	@peringkat VARCHAR(100),
	@status VARCHAR(100),
	@id_tingkat int,
	@sertifikat VARCHAR(1024),
	@proposal VARCHAR(1024),
	@surat_tugas VARCHAR(1024),
	@karya VARCHAR(1024)
AS
BEGIN
    -- Mulai transaksi untuk memastikan kedua operasi berhasil
    BEGIN TRANSACTION;

    BEGIN TRY
		-- Menyisipkan data ke tabel dokumen dan mendapatkan ID dokumen
		DECLARE @id_dokumen INT;

		INSERT INTO DOKUMEN (SERTIFIKAT, PROPOSAL, SURAT_TUGAS, KARYA)
		VALUES (@sertifikat, @proposal, @surat_tugas, @karya);

		SET @id_dokumen = SCOPE_IDENTITY();

        -- Menyisipkan data ke tabel prestasi dan mendapatkan ID prestasi
        DECLARE @id_detail_prestasi INT;

        INSERT INTO DETAIL_PRESTASI (TGL_KEGIATAN, NAMA_LOMBA, LOKASI, PENYELENGGARA)
        VALUES (@tanggal, @lomba, @lokasi, @penyelenggara);

        -- Ambil id_prestasi yang baru saja disisipkan
        SET @id_detail_prestasi = SCOPE_IDENTITY();

        -- Menyisipkan data ke tabel detail_prestasi
        INSERT INTO PRESTASI (NIM, ID_DOKUMEN, ID_DETAIL, NIP, JENIS_PRESTASI, PERINGKAT, STATUS, ID_TINGKAT)
        VALUES (@nim, @id_dokumen, @id_detail_prestasi, @nip, @jenis_prestasi, @peringkat, @status, @id_tingkat);

        -- Commit transaksi jika semua berhasil
        COMMIT TRANSACTION;
    END TRY
    BEGIN CATCH
        -- Jika ada kesalahan, rollback transaksi
        ROLLBACK TRANSACTION;
        
        -- Menampilkan pesan kesalahan
        THROW;
    END CATCH
END;
GO
ALTER DATABASE [presma_web] SET  READ_WRITE 
GO
