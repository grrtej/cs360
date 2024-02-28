<nav class="navbar navbar-expand">
    <div class="container">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="bi bi-house"></i> Lab 4</a>
            </li>
<?php
if ($logged_in) {
?>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php"><i class="bi bi-person-gear"></i> Dashboard</a>
            </li>
<?php
}
?>
        </ul>
<?php
if ($logged_in) {
?>
        <ul class="navbar-nav ms-auto">
            <li class="navbar-text px-3">
                <i class="bi bi-person-circle"></i> <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Sign out</a>
            </li>
        </ul>
<?php
}
?>
    </div>
</nav>
