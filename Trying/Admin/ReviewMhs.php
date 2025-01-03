<?php
include "../connection.php";
require_once "../component/sidebar.php";
require_once "../component/navbarAdmin.php";
// $nim  = $_GET['NIM'];
$id_prestasi = $_GET['id_prestasi'];
session_start();
// echo $_SESSION['name'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id_prestasi'])) {
    $id_prestasi = htmlspecialchars($_GET['id_prestasi']);
    if (isset($_POST['accept'])) {
        $status = "Completed";
    } elseif (isset($_POST['reject'])) {
        $status = "Rejected";
    }

    $sql = "UPDATE PRESTASI 
    SET STATUS = :status, ID_ADMIN = :id_admin
    WHERE ID_PRESTASI = :id_prestasi;";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':id_prestasi', $id_prestasi, PDO::PARAM_STR);
    $stmt->bindParam(':id_admin', $_SESSION['name'], PDO::PARAM_STR);

    if ($stmt->execute()) {
        header('Location: Review.php');
        exit();
    } else {
        echo "Data tidak berubah";
    }
}


    $tsql = "SELECT
	m.NAMA, m.NIM, m.PRODI, m.ANGKATAN, 
    d.NAMA_LOMBA, d.TGL_KEGIATAN, pt.peringkat, p.JENIS_PRESTASI, t.TINGKATAN
FROM 
    PRESTASI p 
JOIN
    MAHASISWA m ON p.NIM = m.NIM
JOIN 
    DETAIL_PRESTASI d ON p.ID_DETAIL = d.ID_DETAIL
JOIN 
    TINGKAT t ON p.ID_TINGKAT = t.ID_TINGKAT
JOIN
    PERINGKAT pt ON p.PERINGKAT = pt.id_peringkat
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
    <script src="../js/pdfview.js"></script>
    <style>
        .popuppdf {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .popup-content {
            background-color: transparent;
            margin: 5% auto;
            padding: 20px;
            width: 80%;
            height: 80%;
            position: relative;
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        #pdfViewer {
            border: none;
        }

        .ViewPDF {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        .ViewPDF:hover {
            text-decoration: none;
        }
    </style>
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
                <span class="Details"><?= htmlspecialchars($row['peringkat']); ?></span>
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
                    <div><span class="ViewImage" onclick="showPopupImg('<?= $_SESSION['sertifikat']?>')">View</span></div>
                    <div class="popupimg" id="imagePopup" onclick="hidePopupImg()">
                        <img id="popupImage" src="" alt="Popup Image" />
                    </div>
                </div>
            </div>
            <div class="FileItem">
                <span class="Label">Proposal</span>
                <div style="display: flex; width: auto;">
                    <div><span class="ViewImage" onclick="showPopupPDF('<?= $_SESSION['proposal']?>')">View</span></div>
                    <div class="popuppdf" id="pdfPopup">
                        <div class="popup-content">
                            <span class="close-btn" onclick="hidePopupPDF()">&times;</span>
                            <iframe id="pdfViewer" src="" width="100%" height="100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="FileItem">
                <span class="Label">Surat Tugas</span>
                <div style="display: flex; width: auto;">
                    <div><span class="ViewImage" onclick="showPopupPDF('<?= $_SESSION['surat_tugas']?>')">View</span></div>
                    <div class="popuppdf" id="pdfPopup">
                        <div class="popup-content">
                            <span class="close-btn" onclick="hidePopupPDF()">&times;</span>
                            <iframe id="pdfViewer" src="" width="100%" height="100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="FileItem">
                <span class="Label">Karya</span>
                <div style="display: flex; width: auto;">
                    <div><span class="ViewImage" onclick="showPopupImg('<?= $_SESSION['karya']?>')">View</span></div>
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