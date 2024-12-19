<?php
include "../connection.php";
require_once '../component/sidebar.php';
require_once '../component/navbar.php';

session_start();
$nim = $_SESSION['nim'];

if (isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id'];

    $query = "DELETE FROM PRESTASI WHERE ID_PRESTASI = :id";
    $stmt3 = $conn->prepare($query);
    $stmt3->bindParam(':id', $delete_id, PDO::PARAM_STR);

    $stmt3->execute();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style/styleView.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <title>View</title>
    <style>
        .delete {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            color: white;
            border: none;
            border-radius: 5px;
            background-color: transparent;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-buttons {
            margin-top: 20px;
        }

        .modal-btn {
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .yes-btn {
            background-color: #4CAF50;
            color: white;
        }

        .no-btn {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>

<body>
    <?php echo renderSidebar("Dashboard.php", "input.php", "view.php"); ?>
    <div class="navbar">
        <?php renderNavbar(); ?>
    </div>
    <h1>dasda</h1>
    <main class="main-content">
        <h1>View Your Submit</h1>
        <table>
            <thead>
                <th>Nama Lomba</th>
                <th>Kategori Juara</th>
                <th>Tipe Prestasi</th>
                <th>Tingkat Prestasi</th>
                <th>Status</th>
            </thead>
            <?php

            $tsql = "SELECT * FROM V_PRESTASI where NIM = :nim";
            $stmt = $conn->prepare($tsql);
            $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $statusClass = '';
                switch ($row['STATUS']) {
                    case 'Pending':
                        $statusClass = 'unreview';
                        break;
                    case 'Completed':
                        $statusClass = 'completed';
                        break;
                    case 'Rejected':
                        $statusClass = 'failed';
                        break;
                    default:
                        $statusClass = 'other-status';
                        break;
                }
            ?>
                <tr>
                    <td><?= htmlspecialchars($row['NAMA_LOMBA']); ?></td>
                    <td><?= htmlspecialchars($row['PERINGKAT']); ?></td>
                    <td><?= htmlspecialchars($row['JENIS_PRESTASI']); ?></td>
                    <td><?= htmlspecialchars($row['TINGKATAN']); ?></td>
                    <td class="center" style="display: inline-flex; align-items: center; width: 100%;">
                        <button class="status <?= $statusClass ?>" style="display: inline;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6"
                                style="width: 15px; height:auto;">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span><?= htmlspecialchars($row['STATUS']); ?></span>
                        </button>
                        <?php if ($statusClass == "unreview" || $statusClass == "failed") { ?>
                            <form method="POST">
                                <input type="hidden" name="delete_id" value="<?= $row['ID_PRESTASI']; ?>">
                                <button class="delete" name="delete"
                                    style="border: none; cursor: pointer;">
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIiB4PSIwIiB5PSIwIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgY2xhc3M9IiI+PGcgdHJhbnNmb3JtPSJtYXRyaXgoMC44MzMzMzMzMzMzMzMzMzQzLDAsMCwwLjgzMzMzMzMzMzMzMzMzNDMsNDIuNjY2NjY3OTM4MjMxNzEsNDIuNjY2NjY2NjY2NjY2NTE1KSI+PHBhdGggZD0iTTQ0OCA4NS4zMzNoLTY2LjEzM0MzNzEuNjYgMzUuNzAzIDMyOC4wMDIuMDY0IDI3Ny4zMzMgMGgtNDIuNjY3Yy01MC42NjkuMDY0LTk0LjMyNyAzNS43MDMtMTA0LjUzMyA4NS4zMzNINjRjLTExLjc4MiAwLTIxLjMzMyA5LjU1MS0yMS4zMzMgMjEuMzMzUzUyLjIxOCAxMjggNjQgMTI4aDIxLjMzM3YyNzcuMzMzQzg1LjQwNCA0NjQuMjE0IDEzMy4xMTkgNTExLjkzIDE5MiA1MTJoMTI4YzU4Ljg4MS0uMDcgMTA2LjU5Ni00Ny43ODYgMTA2LjY2Ny0xMDYuNjY3VjEyOEg0NDhjMTEuNzgyIDAgMjEuMzMzLTkuNTUxIDIxLjMzMy0yMS4zMzNTNDU5Ljc4MiA4NS4zMzMgNDQ4IDg1LjMzM3pNMjM0LjY2NyAzNjIuNjY3YzAgMTEuNzgyLTkuNTUxIDIxLjMzMy0yMS4zMzMgMjEuMzMzLTExLjc4MyAwLTIxLjMzNC05LjU1MS0yMS4zMzQtMjEuMzMzdi0xMjhjMC0xMS43ODIgOS41NTEtMjEuMzMzIDIxLjMzMy0yMS4zMzMgMTEuNzgyIDAgMjEuMzMzIDkuNTUxIDIxLjMzMyAyMS4zMzN2MTI4em04NS4zMzMgMGMwIDExLjc4Mi05LjU1MSAyMS4zMzMtMjEuMzMzIDIxLjMzMy0xMS43ODIgMC0yMS4zMzMtOS41NTEtMjEuMzMzLTIxLjMzM3YtMTI4YzAtMTEuNzgyIDkuNTUxLTIxLjMzMyAyMS4zMzMtMjEuMzMzIDExLjc4MiAwIDIxLjMzMyA5LjU1MSAyMS4zMzMgMjEuMzMzdjEyOHpNMTc0LjMxNSA4NS4zMzNjOS4wNzQtMjUuNTUxIDMzLjIzOC00Mi42MzQgNjAuMzUyLTQyLjY2N2g0Mi42NjdjMjcuMTE0LjAzMyA1MS4yNzggMTcuMTE2IDYwLjM1MiA0Mi42NjdIMTc0LjMxNXoiIGZpbGw9IiNlMjMzMjYiIG9wYWNpdHk9IjEiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSIiPjwvcGF0aD48L2c+PC9zdmc+"
                                        style="width: 20px; height: 20px; object-fit: contain; padding: 0;" />
                                </button>
                                <div id="deleteModal" class="modal">
                                    <div class="modal-content">
                                        <p>Are you sure you want to delete?</p>
                                        <div class="modal-buttons">
                                            <button class="modal-btn yes-btn" name="delete" onclick="confirmDelete()">Yes</button>
                                            <button class="modal-btn no-btn" onclick="cancelDelete()">No</button>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function showDeleteConfirmation() {
                                        document.getElementById('deleteModal').style.display = 'block';
                                    }

                                    function confirmDelete() {
                                        alert('Item deleted!');
                                        document.getElementById('deleteModal').style.display = 'none';
                                    }

                                    function cancelDelete() {
                                        document.getElementById('deleteModal').style.display = 'none';
                                    }
                                </script>
                            </form>
                        <?php } ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </main>
    <script src="../js/sidebar.js"></script>
</body>

</html>