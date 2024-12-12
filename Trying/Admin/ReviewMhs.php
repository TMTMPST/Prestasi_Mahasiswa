<?php
include "../connection.php";
require_once "../component/sidebar.php";
require_once "../component/navbarAdmin.php";
// $nim  = $_GET['NIM'];
$id_prestasi = $_GET['id_prestasi'];
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id_prestasi'])) {
    $id_prestasi = htmlspecialchars($_GET['id_prestasi']);
    if (isset($_POST['accept'])) {
        $status = "Completed";
    } elseif (isset($_POST['reject'])) {
        $status = "Rejected";
    }

    $sql = "UPDATE PRESTASI 
    SET STATUS = :status 
    WHERE ID_PRESTASI = :id_prestasi;";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':id_prestasi', $id_prestasi, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header('Location: Review.php');
        exit();
    } else {
        echo "Data tidak berubah";
    }
}


    $tsql = "SELECT
	m.NAMA, m.NIM, m.PRODI, m.ANGKATAN, 
    d.NAMA_LOMBA, d.TGL_KEGIATAN,p.PERINGKAT, p.JENIS_PRESTASI, t.TINGKATAN
FROM 
    PRESTASI p 
JOIN
    MAHASISWA m ON p.NIM = m.NIM
JOIN 
    DETAIL_PRESTASI d ON p.ID_DETAIL = d.ID_DETAIL
JOIN 
    TINGKAT t ON p.ID_TINGKAT = t.ID_TINGKAT
    where p.id_prestasi = :id_prestasi;";

    $stmt2 = $conn->prepare($tsql);
    // $stmt->bindParam(':nim', $status, PDO::PARAM_STR);
    $stmt2->bindParam(':id_prestasi', $id_prestasi, PDO::PARAM_STR);
    $stmt2->execute();
    $row = $stmt2->fetch(PDO::FETCH_ASSOC);
    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/Review.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="stylesheet" href="../style/imagePopup.css">
    <script src="../js/image.js"></script>
    <title>Submit</title>
</head>

<body class="inter">
<?php echo renderSidebar("Dashboard.php", "input.php", "review.php"); ?>
        <div class="navbar">
        <?php renderNavbar(); ?>
        </div>

    <!-- Main -->
    <div class="Main">
        <!-- Back Button -->
        <a href="Review.php" style="text-decoration: none;">
            <div class="ButtonBack">
                <span class="BackText">Back</span>
            </div><br>
        </a>

        <!-- Header -->
        <div class="Header">
            <h1>Review Prestasi Mahasiswa</h1>
        </div>

        <!-- Data Prestasi Section -->
        <div class="Table DataMahasiswa">
            <div class="SectionHeader">Data Mahasiswa</div>
            <div class="DataItem">
                <span class="Label">Nama</span>
                <span class="Colon">:</span>
                <span class="Details"><?= htmlspecialchars($row['NAMA']); ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">NIM</span>
                <span class="Colon">:</span>
                <span class="Details"><?= htmlspecialchars($row['NIM']); ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Prodi</span>
                <span class="Colon">:</span>
                <span class="Details"><?= htmlspecialchars($row['PRODI']); ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Angkatan</span>
                <span class="Colon">:</span>
                <span class="Details"><?= htmlspecialchars($row['ANGKATAN']); ?></span>
            </div>
        </div>

        <!-- Data Prestasi Section -->
        <div class="Table DataPrestasi">
            <div class="SectionHeader">Data Prestasi</div>
            <div class="DataItem">
                <span class="Label">Nama Lomba</span>
                <span class="Colon">:</span>
                <span class="Details"><?= htmlspecialchars($row['NAMA_LOMBA']); ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Kategori Juara</span>
                <span class="Colon">:</span>
                <span class="Details"><?= htmlspecialchars($row['PERINGKAT']); ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Date</span>
                <span class="Colon">:</span>
                <span class="Details"><?= htmlspecialchars($row['TGL_KEGIATAN']); ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Tingkat Prestasi</span>
                <span class="Colon">:</span>
                <span class="Details"><?= htmlspecialchars($row['TINGKATAN']); ?></span>
            </div>
        </div>

        <!-- File Prestasi Section -->
        <div class="Table FilePrestasi">
            <div class="SectionHeader">File Prestasi</div>
            <div class="FileItem">
                <span class="Label">Sertifikat</span>
                <div style="display: flex; width: auto;">
                    <div><span class="ViewImage" onclick="showPopupImg('../img/gedung.jpg')">View Image</span></div>
                    <div class="popupimg" id="imagePopup" onclick="hidePopupImg()">
                        <img id="popupImage" src="" alt="Popup Image" />
                    </div>
                </div>
            </div>
            <div class="FileItem">
                <span class="Label">Proposal</span>
                <div style="display: flex; width: auto;">
                    <div><span class="ViewImage" onclick="showPopupImg('../img/gedung.jpg')">View Image</span></div>
                    <div class="popupimg" id="imagePopup" onclick="hidePopupImg()">
                        <img id="popupImage" src="" alt="Popup Image" />
                    </div>
                </div>
            </div>
            <div class="FileItem">
                <span class="Label">Surat Tugas</span>
                <div style="display: flex; width: auto;">
                    <div><span class="ViewImage" onclick="showPopupImg('../img/gedung.jpg')">View Image</span></div>
                    <div class="popupimg" id="imagePopup" onclick="hidePopupImg()">
                        <img id="popupImage" src="" alt="Popup Image" />
                    </div>
                </div>
            </div>
            <div class="FileItem">
                <span class="Label">Karya</span>
                <div style="display: flex; width: auto;">
                    <div><span class="ViewImage" onclick="showPopupImg('../img/gedung.jpg')">View Image</span></div>
                    <div class="popupimg" id="imagePopup" onclick="hidePopupImg()">
                        <img id="popupImage" src="" alt="Popup Image" />
                    </div>
                </div>
            </div>
        </div>
        <div class="align-to-right">
            <form action="" method="POST">
                <div class="ButtonAccept">
                    <button type="submit" name="accept">Accept</button>
                </div>
                <div class="ButtonReject">
                    <button type="submit" name="reject">Reject</button>
                </div>
            </form>
        </div>
</body>

</html>