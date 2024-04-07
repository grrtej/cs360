<?php require('_auth.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Lab #7</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
<?php include('_nav.php'); ?>
<div class="container py-3">

<?php
if ($logged_in) {
?>
    <h3>Hey, <?php echo $_SESSION['firstname']; ?>!</h3>
    <p>You can create, read, update, and delete this website's users from the dashboard.</p>
    <p><a class="btn btn-primary" href="dashboard.php"><i class="bi bi-person-gear"></i> Open Dashboard</a></p>
    <p>Done? <a href="logout.php">Sign out</a> here.</p>
<?php
} else {
?>
    <h3>You are not signed in.</h3>
    <p>To access this website, <a href="login.php">sign in</a> here.</p>
<?php
}
?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
