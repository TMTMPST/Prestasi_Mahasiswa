<?php
function renderNavbar() {
    ?>
    <nav class="top-nav">
        <button class="menu-toggle">☰</button>
        <div class="user-menu">
            <img src="../img/dummy/1.jpg" alt="User Avatar" class="user-avatar">
            <div class="user-dropdown">
                <a href="editProfile.php">Profile</a>
                <a href="../login/login.php">Logout</a>
            </div>
        </div>
    </nav>
    <script src="../js/sidebar.js"></script>
    <?php
}
?>