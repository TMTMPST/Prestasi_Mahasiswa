<?php
session_start();
include "../proses/function.php";
include "../connection.php";
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

        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        #popup input {
            display: block;
            margin: 10px 0;
            padding: 5px;
            width: 200px;
        }

        #popup button {
            margin-right: 10px;
            padding: 5px 10px;
            cursor: pointer;
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
            /* background-color: #ff4136; */
            color: white;
            border-color: #ff4136;
            padding: 5px 10px;
            padding-bottom: 3px;
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
            </table>
        </div>
    </main>
    <button id="addButton">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
    </button>

    <form method="POST">
        <div id="popup">
            <h2>Add Employee</h2>
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="nip" placeholder="NIP">
            <button type="submit" id="submitButton" name="add">Add</button>
            <button id="cancelButton">Cancel</button>
        </div>
    </form>

    <script>
        const addButton = document.getElementById('addButton');
        const popup = document.getElementById('popup');
        const submitButton = document.getElementById('submitButton');
        const cancelButton = document.getElementById('cancelButton');
        const nameInput = document.getElementById('name');
        const nipInput = document.getElementById('nip');

        addButton.addEventListener('click', () => {
            popup.style.display = 'block';
        });

        cancelButton.addEventListener('click', () => {
            event.preventDefault();
            popup.style.display = 'none';
            nameInput.value = '';
            nipInput.value = '';
        });

        submitButton.addEventListener('click', () => {
            const name = nameInput.value.trim();
            const nip = nipInput.value.trim();

            if (name && nip) {
                alert(`Employee added:\nName: ${name}\nNIP: ${nip}`);
                popup.style.display = 'none';
                nameInput.value = '';
                nipInput.value = '';
            } else {
                alert('Please fill in both Name and NIP fields.');
            }
        });
    </script>
</body>

</html>