<?php
session_start();
include "../connection.php";
include "../proses/function.php";
require_once '../component/sidebar.php';
require_once '../component/navbarAdmin.php';


// Ambil data dari database
try {
    $dosenList = getDosenList($conn);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'] ?? '';
    $nip = $_POST['nip'] ?? '';
    $nip_del = $_POST['nip_del'] ?? '';

    try {
        if (isset($_POST['delete'])) {
            echo "del button";
            $delete_query = "DELETE FROM DOSEN WHERE NIP = :nip";
            $stmt = $conn->prepare($delete_query);
            $stmt->bindParam(':nip', $nip_del, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: dosen.php");
            exit();
        } else if (isset($_POST['add'])) {
            echo "data insert";
            $insert_query = "INSERT INTO DOSEN (NIP, NAMA_DOSEN) VALUES (:nip, :name)";
            $stmt2 = $conn->prepare($insert_query);
            $stmt2->bindParam(':nip', $nip, PDO::PARAM_STR);
            $stmt2->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt2->execute();

            header("Location: dosen.php");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/stylereview.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="stylesheet" href="../style/Table.css">

    <title>Dosen</title>
    <style>
        #addButton {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
        }

        #addButton svg {
            width: 24px;
            height: 24px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: transparent;
        }

        .delete-btn {
            color: white;
            border-color: #ff4136;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>

</head>

<body class="inter">
    <?php echo renderSidebar("Dashboard.php", "input.php", "review.php"); ?>
    <div class="navbar">
        <?php renderNavbar(); ?>
    </div>
    <h1>asdasd</h1>

    <!-- Main Content -->
    <main class="main-content">
        <div class="table-container">
            <h1>Manajemen Dosen Pembimbing</h1>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>NIP</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dosenList as $row) {
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['NAMA_DOSEN']); ?></td>
                            <td><?php echo htmlspecialchars($row['NIP']); ?></td>
                            <td>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="nip_del" value="<?= htmlspecialchars($row['NIP']); ?>">
                                    <button type="submit" class="delete-btn" name="delete">
                                        <img src="
                                        data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiB4PSIwIiB5PSIwIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgY2xhc3M9IiI+PGcgdHJhbnNmb3JtPSJtYXRyaXgoMC44MzMzMzMzMzMzMzMzMzQzLDAsMCwwLjgzMzMzMzMzMzMzMzMzNDMsNDIuNjY2NjY3OTM4MjMxNzEsNDIuNjY2NjY2NjY2NjY2NTE1KSI+PHBhdGggZD0iTTQ0OCA4NS4zMzNoLTY2LjEzM0MzNzEuNjYgMzUuNzAzIDMyOC4wMDIuMDY0IDI3Ny4zMzMgMGgtNDIuNjY3Yy01MC42NjkuMDY0LTk0LjMyNyAzNS43MDMtMTA0LjUzMyA4NS4zMzNINjRjLTExLjc4MiAwLTIxLjMzMyA5LjU1MS0yMS4zMzMgMjEuMzMzUzUyLjIxOCAxMjggNjQgMTI4aDIxLjMzM3YyNzcuMzMzQzg1LjQwNCA0NjQuMjE0IDEzMy4xMTkgNTExLjkzIDE5MiA1MTJoMTI4YzU4Ljg4MS0uMDcgMTA2LjU5Ni00Ny43ODYgMTA2LjY2Ny0xMDYuNjY3VjEyOEg0NDhjMTEuNzgyIDAgMjEuMzMzLTkuNTUxIDIxLjMzMy0yMS4zMzNTNDU5Ljc4MiA4NS4zMzMgNDQ4IDg1LjMzM3pNMjM0LjY2NyAzNjIuNjY3YzAgMTEuNzgyLTkuNTUxIDIxLjMzMy0yMS4zMzMgMjEuMzMzLTExLjc4MyAwLTIxLjMzNC05LjU1MS0yMS4zMzQtMjEuMzMzdi0xMjhjMC0xMS43ODIgOS41NTEtMjEuMzMzIDIxLjMzMy0yMS4zMzMgMTEuNzgyIDAgMjEuMzMzIDkuNTUxIDIxLjMzMyAyMS4zMzN2MTI4em04NS4zMzMgMGMwIDExLjc4Mi05LjU1MSAyMS4zMzMtMjEuMzMzIDIxLjMzMy0xMS43ODIgMC0yMS4zMzMtOS41NTEtMjEuMzMzLTIxLjMzM3YtMTI4YzAtMTEuNzgyIDkuNTUxLTIxLjMzMyAyMS4zMzMtMjEuMzMzIDExLjc4MiAwIDIxLjMzMyA5LjU1MSAyMS4zMzMgMjEuMzMzdjEyOHpNMTc0LjMxNSA4NS4zMzNjOS4wNzQtMjUuNTUxIDMzLjIzOC00Mi42MzQgNjAuMzUyLTQyLjY2N2g0Mi42NjdjMjcuMTE0LjAzMyA1MS4yNzggMTcuMTE2IDYwLjM1MiA0Mi42NjdIMTc0LjMxNXoiIGZpbGw9IiNlMjMzMjYiIG9wYWNpdHk9IjEiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSIiPjwvcGF0aD48L2c+PC9zdmc+
                                        " alt="Delete" style="width: 20px; height: 20px; object-fit: contain; padding: 0;">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
        </div>
    </main>
    <button id="addButton" onclick="openModal()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
    </button>


    <div class="modal" id="editModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">
                &times;
            </span>
            <h2>
                Tambah Data Dosen
            </h2>
            <form method="post">
                <div class="form-group">
                    <label for="name">
                        Nama Dosen
                    </label>
                    <input id="name" name="name" type="text" />
                </div>
                <div class="form-group">
                    <label for="nim">
                        NIP Dosen
                    </label>
                    <input id="nim" name="nim" type="text" />
                </div>

                <div class="form-group">
                    <button type="submit" name="add">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('editModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('editModal')) {
                closeModal();
            }
        }
    </script>
</body>

</html>