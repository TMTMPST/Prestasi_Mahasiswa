<?php
function renderSidebar($dashboard, $input, $view)
{
    ob_start();
?>
    <aside class="sidebar">
        <div class="sidebar-header inter-bold">
            <img src="../img/placeholder.png" alt="">
            <span>ACHIVEHUB</span>
        </div>
        <nav class="sidebar-nav">
            <a href="<?= $dashboard ?>">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                </svg>
                Dashboard
            </a>
            <a href="<?= $input ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="sidebar-icon-svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
                Input
            </a>
            <a href="<?= $view ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="sidebar-icon-svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                <?php if ($_SESSION['role'] == 'admin') {
                    echo "Validasi";
                } else {
                    echo "View";
                }
                ?>
            </a>
            <?php if ($_SESSION['role'] == 'admin') {
                    echo "<a href='../Admin/Dosen.php'>
                        <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5'
                            stroke='currentColor' class='sidebar-icon-svg'>
                            <path stroke-linecap='round' stroke-linejoin='round'
                                d='M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6z' />
                            <path stroke-linecap='round' stroke-linejoin='round'
                                d='M13.5 10.5H21A7.5 7.5 0 0 0 21 3v7.5h-7.5z' />
                        </svg>
                        Dosen
                    </a>";
                } else {
                }
            ?>
        </nav>
    </aside>
<?php
    return ob_get_clean();
}
?>