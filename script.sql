USE [master]
GO
/****** Object:  Database [presma_web]    Script Date: 08/12/2024 22:04:10 ******/
CREATE DATABASE [presma_web]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'presma_web', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.MSSQLSERVER\MSSQL\DATA\presma_web.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'presma_web_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.MSSQLSERVER\MSSQL\DATA\presma_web_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT, LEDGER = OFF
GO
ALTER DATABASE [presma_web] SET COMPATIBILITY_LEVEL = 160
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [presma_web].[dbo].[sp_fulltext_database] @action = 'enable'
end
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
ALTER DATABASE [presma_web] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [presma_web] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [presma_web] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [presma_web] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [presma_web] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [presma_web] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [presma_web] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [presma_web] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [presma_web] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [presma_web] SET  ENABLE_BROKER 
GO
ALTER DATABASE [presma_web] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [presma_web] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [presma_web] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [presma_web] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [presma_web] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [presma_web] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [presma_web] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [presma_web] SET RECOVERY FULL 
GO
ALTER DATABASE [presma_web] SET  MULTI_USER 
GO
ALTER DATABASE [presma_web] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [presma_web] SET DB_CHAINING OFF 
GO
ALTER DATABASE [presma_web] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [presma_web] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [presma_web] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [presma_web] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
EXEC sys.sp_db_vardecimal_storage_format N'presma_web', N'ON'
GO
ALTER DATABASE [presma_web] SET QUERY_STORE = ON
GO
ALTER DATABASE [presma_web] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
USE [presma_web]
GO
/****** Object:  Table [dbo].[ADMIN]    Script Date: 08/12/2024 22:04:10 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[DETAIL_PRESTASI]    Script Date: 08/12/2024 22:04:10 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[DOKUMEN]    Script Date: 08/12/2024 22:04:10 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DOKUMEN](
	[ID_DOKUMEN] [int] IDENTITY(1,1) NOT NULL,
	[ID_PRESTASI] [int] NULL,
	[SERTIFIKAT] [varchar](1024) NULL,
	[PROPOSAL] [varchar](1024) NULL,
	[SURAT_TUGAS] [varchar](1024) NULL,
	[KARYA] [varchar](1024) NULL,
 CONSTRAINT [PK_DOKUMEN] PRIMARY KEY CLUSTERED 
(
	[ID_DOKUMEN] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[DOSEN]    Script Date: 08/12/2024 22:04:10 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[MAHASISWA]    Script Date: 08/12/2024 22:04:10 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[PRESTASI]    Script Date: 08/12/2024 22:04:10 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TINGKAT]    Script Date: 08/12/2024 22:04:10 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
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
USE [master]
GO
ALTER DATABASE [presma_web] SET  READ_WRITE 
GO

insert into TINGKAT values ('Provinsi', 5)
insert into TINGKAT values ('Nasional', 10)
insert into TINGKAT values ('Internasional', 15)