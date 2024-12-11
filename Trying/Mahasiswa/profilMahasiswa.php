<?php
include "../connection.php";
session_start();

$nim = $_SESSION['nim'];

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Ambil data dari database
        try {
            $sql = "SELECT * FROM dbo.MAHASISWA WHERE NIM = :nim";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
            $stmt->execute();
            $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$mahasiswa) {
                echo "<script>alert('Mahasiswa tidak ditemukan.');</script>";
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit();
        }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';

    try {
        $tsql = "UPDATE dbo.MAHASISWA 
                 SET PASSWORD = :password, EMAIL = :email 
                 WHERE NIM = :nim";
        $stmt2 = $conn->prepare($tsql);
        $stmt2->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt2->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt2->bindParam(':nim', $nim, PDO::PARAM_STR);
        $stmt2->execute();

        // Refresh data setelah update
        $sql = "SELECT * FROM dbo.MAHASISWA WHERE NIM = :nim";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nim', $nim, PDO::PARAM_STR);
        $stmt->execute();
        $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
    }
?>


<!DOCTYPE html>
<html>
 <head>
  <title>
   My Profile
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .section {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
        }
        .section h2 {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 20px;
        }
        .section .edit-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #f5f7fa;
            border: 1px solid #e0e0e0;
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 14px;
            color: #007bff;
            cursor: pointer;
        }
        .profile-info {
            display: flex;
            align-items: center;
        }
        .profile-info img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            margin-right: 20px;
        }
        .profile-info .details {
            display: flex;
            flex-direction: column;
        }
        .profile-info .details .name {
            font-size: 20px;
            font-weight: 700;
        }
        .profile-info .details .nim {
            font-size: 16px;
            color: #6c757d;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .info-grid .info-item {
            display: flex;
            flex-direction: column;
        }
        .info-grid .info-item .label {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 5px;
        }
        .info-grid .info-item .value {
            font-size: 16px;
            font-weight: 500;
        }
        @media (max-width: 600px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
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
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
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
  </style>
 </head>
 <body>
  <div class="container">
   <div class="header">
    My Profile
   </div>
   <div class="section">
    <div class="profile-info">
     <img alt="Profile picture of student" height="80" src="https://storage.googleapis.com/a1aa/image/1X2OHtd7pL5jM9wYD4QVcvMOB9Z8Qef3GUqVIqenmsoQpnznA.jpg" width="80"/>
     <div class="details">
      <div class="name">
      <?php echo htmlspecialchars($mahasiswa['NAMA']); ?>
      </div>
      <div class="nim">
      <?php echo htmlspecialchars($mahasiswa['NIM']); ?>
      </div>
     </div>
    </div>
   </div>
   <div class="section">
    <div class="edit-btn" onclick="openModal()">
     <i class="fas fa-pen">
     </i>
     Edit
    </div>
    <h2>
     Personal Information
    </h2>
    <div class="info-grid">
     <div class="info-item">
      <div class="label">
       Nama
      </div>
      <div class="value">
      <?php echo htmlspecialchars($mahasiswa['NAMA']); ?>
      </div>
     </div>
     <div class="info-item">
      <div class="label">
       NIM
      </div>
      <div class="value">
      <?php echo htmlspecialchars($mahasiswa['NIM']); ?>
      </div>
     </div>
     <div class="info-item">
      <div class="label">
       Email
      </div>
      <div class="value">
      <?php echo htmlspecialchars($mahasiswa['EMAIL']); ?>
      </div>
     </div>
     <div class="info-item">
      <div class="label">
       Prodi
      </div>
      <div class="value">
      <?php echo htmlspecialchars($mahasiswa['PRODI']); ?>
      </div>
     </div>
     <div class="info-item">
      <div class="label">
       Angkatan
      </div>
      <div class="value">
      <?php echo htmlspecialchars($mahasiswa['ANGKATAN']); ?>
      </div>
     </div>
    </div>
   </div>
  </div>
  <div class="modal" id="editModal">
   <div class="modal-content">
    <span class="close" onclick="closeModal()">
     &times;
    </span>
    <h2>
     Edit Personal Information
    </h2>
    <form action="" method="post">
     <div class="form-group">
      <label for="name">
       Nama
      </label>
      <input id="name" name="name" type="text" value="<?php echo htmlspecialchars($mahasiswa['NAMA']); ?>" readonly/>
     </div>
     <div class="form-group">
      <label for="nim">
       NIM
      </label>
      <input id="nim" name="nim" type="text" value="<?php echo htmlspecialchars($mahasiswa['NIM']); ?>" readonly/>
     </div>
     <div class="form-group">
      <label for="email">
       Email
      </label>
      <input id="email" name="email" type="email" value="<?php echo htmlspecialchars($mahasiswa['EMAIL']); ?>"/>
     </div>

     <div class="form-group">
      <label for="password">
       Password
      </label>
      <input id="password" name="password" type="password" value="<?php echo htmlspecialchars($mahasiswa['PASSWORD']); ?>"/>
     </div>


     <div class="form-group">
      <label for="prodi">
       Prodi
      </label>
      <input id="prodi" name="prodi" type="text" value="<?php echo htmlspecialchars($mahasiswa['PRODI']); ?>" readonly/>
     </div>
     <div class="form-group">
      <label for="angkatan">
       Angkatan
      </label>
      <input id="angkatan" name="angkatan" type="text" value="<?php echo htmlspecialchars($mahasiswa['ANGKATAN']); ?>" readonly/>
     </div>
     <div class="form-group">
      <button type="submit">
       Save
      </button>
     </div>
    </form>
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