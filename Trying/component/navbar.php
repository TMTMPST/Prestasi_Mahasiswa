<?php
function renderNavbar() {
    ?>
    <nav class="top-nav">
        <button class="menu-toggle">☰</button>
        <div class="user-menu">
            <img src="<?= $_SESSION['profile'];?>" alt="User Avatar" class="user-avatar">
            <div class="user-dropdown">
                <a href="../Mahasiswa/profilMahasiswa.php">Profile</a>
                <a href="../login/login.php">Logout</a>
            </div>
        </div>
    </nav>
    <script src="../js/sidebar.js"></script>
    <?php
}
?>