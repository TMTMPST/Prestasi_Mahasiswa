<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleInputFile.css">
    <title>Input File</title>
</head>

<body class="inter">
    <!-- Navigation -->
    <?php
    include "../component/sidebarAdmin.php";
    echo renderSidebar();
    ?>

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

        <form action="inputSubmit.html">
            <div class="file-upload">
                <span>Sertif</span>
                <label>
                    <input type="file" class="file-input" />
                </label>
            </div>

            <div class="file-upload">
                <span class="sr-only">Proposal</span>
                <label>
                    <input type="file" class="file-input" />
                </label>
            </div>

            <div class="file-upload">
                <span class="sr-only">Surat Tugas</span>
                <label>
                    <input type="file" class="file-input" />
                </label>
            </div>

            <div class="file-upload">
                <span>Karya (bila ada)</span>
                <label>
                    <input type="file" class="file-input" />
                </label>
            </div>

            <div class="continue-button">
                <a href="inputSubmit.html">
                    <button>
                        Continue
                    </button>
                </a>
            </div>
        </form>
    </div>
</body>

</html>