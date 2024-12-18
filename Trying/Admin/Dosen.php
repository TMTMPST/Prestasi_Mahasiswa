<?php
session_start();
include "../connection.php";
require_once '../component/sidebar.php';
require_once '../component/navbarAdmin.php';
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
            background-color: #ff4136;
            color: white;
            border: none;
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

            </tbody>
        </div>
    </main>
    <button id="addButton">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
    </button>


    <div id="popup">
        <h2>Add Employee</h2>
        <input type="text" id="name" placeholder="Name">
        <input type="text" id="nip" placeholder="NIP">
        <button id="submitButton">Add</button>
        <button id="cancelButton">Cancel</button>
    </div>

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