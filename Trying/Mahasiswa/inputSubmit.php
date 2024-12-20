<?php
include "../connection.php";
include "proses_tambah.php";
require_once '../component/sidebar.php';
require_once '../component/navbar.php';

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

// if (!isset($_SESSION['nim'])) {
//     header('Location: input.php');
//     exit();
// }

$nim = $_SESSION['nim'] ?? null;
if (!$nim) {
    die("NIM tidak ditemukan!");
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $tsql = "SELECT * FROM dbo.MAHASISWA where NIM = :nim";
    $stmt = $conn->prepare($tsql);
    $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
    $stmt->execute();
    $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/styleSubmit.css">
    <link rel="stylesheet" href="../style/popup.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="stylesheet" href="../style/imagePopup.css">
    <script src="../js/popup.js"></script>
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
            color: #000;
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
    <!-- Navigation -->
    <?php echo renderSidebar("Dashboard.php", "input.php", "view.php"); ?>
    <div class="navbar">
        <?php renderNavbar(); ?>
    </div>


    <!-- Main -->
    <div class="Main">
        <!-- Back Button -->
        <a href="inputFile.php" style="text-decoration: none;">
            <div class="ButtonBack">
                <span class="BackText">Back</span>
            </div><br>
        </a>

        <!-- Header -->
        <div class="Header">
            <h1>Review Prestasi</h1>
        </div>

        <!-- Data Prestasi Section -->
        <div class="Table DataMahasiswa">
            <div class="SectionHeader">Data Mahasiswa</div>
            <div class="DataItem">
                <span class="Label">Nama</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo htmlspecialchars($mahasiswa['NAMA']); ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">NIM</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo $_SESSION['nim']; ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Prodi</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo htmlspecialchars($mahasiswa['PRODI']); ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Angkatan</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo htmlspecialchars($mahasiswa['ANGKATAN']); ?></span>
            </div>
        </div>

        <!-- Data Prestasi Section -->
        <div class="Table DataPrestasi">
            <div class="SectionHeader">Data Prestasi</div>
            <div class="DataItem">
                <span class="Label">Nama Lomba</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo $_SESSION['nama-lomba']; ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Kategori Juara</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo $_SESSION['kategori-juara']; ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Date</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo $_SESSION['date']; ?></span>
            </div>
            <div class="DataItem">
                <span class="Label">Tipe Prestasi</span>
                <span class="Colon">:</span>
                <span class="Details"><?php echo $_SESSION['tipe_prestasi']; ?></span>
            </div>
        </div>

        <!-- File Prestasi Section -->
        <div class="Table FilePrestasi">
            <div class="SectionHeader">File Prestasi</div>
            <div class="FileItem">
                <span class="Label">Sertifikat</span>
                <div style="display: flex; width: auto;">
                    <div><span class="ViewImage" onclick="showPopupImg('<?php echo $_SESSION['sertifikat']; ?>')">View
                            </span></div>
                    <div class="popupimg" id="imagePopup" onclick="hidePopupImg()">
                        <img id="popupImage" src="" alt="Popup Image" />
                    </div>
                    <div class="UploadSuccess">Upload Success</div>
                </div>
            </div>
            <div class="FileItem">
                <span class="Label">Proposal</span>
                <div style="display: flex; width: auto;">
                    <div><span class="ViewImage" onclick="showPopupImg('<?php echo $_SESSION['proposal']; ?>')">View
                            </span></div>
                    <div class="popupimg" id="imagePopup" onclick="hidePopupImg()">
                        <img id="popupImage" src="" alt="Popup Image" />
                    </div>
                    <div class="UploadSuccess">Upload Success</div>
                </div>
            </div>
            <div class="FileItem">
                <span class="Label">Surat Tugas</span>
                <div style="display: flex; width: auto;">
                    <div><span class="ViewImage" onclick="showPopupPDF('<?php echo $_SESSION['surat_tugas']; ?>')">View
                            </span></div>
                    <div class="popuppdf" id="pdfPopup">
                        <div class="popup-content">
                            <span class="close-btn" onclick="hidePopupPDF()">&times;</span>
                            <iframe id="pdfViewer" src="" width="100%" height="100%"></iframe>
                        </div>
                    </div>
                    <div class="UploadSuccess">Upload Success</div>
                </div>
            </div>

            <div class="FileItem">
                <span class="Label">Karya</span>
                <div style="display: flex; width: auto;">
                    <div><span class="ViewImage" onclick="showPopupImg('<?php echo $_SESSION['karya']; ?>')">View
                            </span></div>
                    <div class="popupimg" id="imagePopup" onclick="hidePopupImg()">
                        <img id="popupImage" src="" alt="Popup Image" />
                    </div>
                    <div class="UploadSuccess">Upload Success</div>
                </div>
            </div>
        </div>

        <div class="ButtonSubmit">
            <form id="" action="proses_tambah.php" method="POST">
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="popup-overlay" id="popup">
            <div class="popup">
                <img src="../img/submit-success.png" alt="Submit Success">
                <p>SUBMIT SUCCESS</p>
            </div>
        </div>
    </div>


</body>

</html>