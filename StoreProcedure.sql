use presma_web
GO

SELECT * FROM DOKUMEN;
SELECT * FROM DETAIL_PRESTASI;
SELECT * FROM PRESTASI;
GO

CREATE PROCEDURE InsertPrestasi
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

EXEC InsertPrestasi
    @tanggal = '2024-12-01',
	@lomba = 'PlayIT',
	@lokasi = 'Malang',
	@penyelenggara = 'Politeknik Negeri Malang',
    @nim = '21430001',
	@nip = '1978121201',
	@jenis_prestasi = 'Non Akademik',
	@peringkat = 'Juara 1',
	@status = 'Pending',
	@id_tingkat = 2,
	@sertifikat = 'Rawr',
	@proposal = 'propose',
	@surat_tugas = 'Surat tugas',
	@karya = 'Mahakarya';

SELECT * FROM PRESTASI

-- Untuk Cek apakah sudah ada Store Procedure
IF OBJECT_ID('dbo.InsertPrestasi', 'P') IS NOT NULL
    PRINT 'Stored procedure sudah ada.';
ELSE
    PRINT 'Stored procedure tidak ada.';
