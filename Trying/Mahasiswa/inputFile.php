<?php
session_start();
include '../connection.php';
require_once '../component/navbar.php';
require_once '../component/sidebar.php';


$nim = $_SESSION['nim'] ?? null;
if (!$nim) {
    die("NIM tidak ditemukan!");
}

// header("Location: inputSubmit.php");
// exit();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['sertifikat'])) {
    $targetDir = "../uploads/";

    $filePaths = [
        'sertifikat' => '',
        'proposal' => '',
        'surat_tugas' => '',
        'karya' => ''
    ];

    foreach ($filePaths as $key => $value) {
        $file = $_FILES[$key];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            die("Terjadi kesalahan saat mengunggah file.");
        }

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = basename($file['name'], "." . $fileExtension);

        $newFileName = $nim . "_" . $fileName . "_" . time() . "." . $fileExtension;

        $targetFilePath = $targetDir . DIRECTORY_SEPARATOR . $newFileName;

        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            $filePaths[$key] = $targetFilePath; // simpan path file
            echo "$key berhasil diunggah sebagai " . $newFileName . "<br>";
        } else {
            echo "Gagal mengunggah file $key.";
        }
    }

    $_SESSION['sertifikat'] = $filePaths['sertifikat'];
    $_SESSION['proposal'] = $filePaths['proposal'];
    $_SESSION['surat_tugas'] = $filePaths['surat_tugas'];
    $_SESSION['karya'] = $filePaths['karya'];

    header("Location: inputSubmit.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleInputFile.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <title>Input File</title>
</head>

<body class="inter">
    <?php echo renderSidebar(); ?>
        <div class="navbar">
        <?php renderNavbar(); ?>
        </div>
    <!-- Main Content -->

    <div class="main-content">
        <!-- Back Button -->
        <a href="input.php" style="text-decoration: none;">
            <div class="ButtonBack">
                <span class="BackText">Back</span>
            </div><br>
        </a>

        <!-- Header -->
        <div class="Header">
            <h1>Upload File</h1>
        </div>


        <!-- File Upload Section -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="file-upload">
                <span>Sertif</span>
                <label>
                    <input type="file" class="file-input" name="sertifikat" />
                </label>
            </div>

            <div class="file-upload">
                <span class="sr-only">Proposal</span>
                <label>
                    <input type="file" class="file-input" name="proposal" />
                </label>
            </div>

            <div class="file-upload">
                <span class="sr-only">Surat Tugas</span>
                <label>
                    <input type="file" class="file-input" name="surat_tugas" />
                </label>
            </div>

            <div class="file-upload">
                <span>Karya (bila ada)</span>
                <label>
                    <input type="file" class="file-input" name="karya" />
                </label>
            </div>

            <div class="continue-button">
                <button>
                    Continue
                </button>
            </div>
        </form>
    </div>
</body>

</html>