<?php require('_auth.php'); if ($logged_in) { header('Location: index.php'); } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | Lab #7</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
<?php include '_nav.php';?>
<div class="container py-3">

<?php
if (isset($_POST['email'])) {
    require('_sql.php');
    
    $email = $sql->real_escape_string(stripslashes($_POST['email']));
    $password = $sql->real_escape_string(stripslashes($_POST['password']));
    
    $result = $sql->query("SELECT * FROM `users` WHERE email='$email' AND password='" . md5($password) . "'");
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['email'] = $row['email'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        header('Location: index.php');
    } else {
?>
    <h3>Incorrect email or password.</h3>
    <p>Try <a href="login.php">signing in</a> again.</p>
<?php
    }
} else {
    ?>
    <h3>Sign in here</h3>
    <form method="post" class="my-3">
        <div class="mb-3">
            <label class="form-label" for="email"><i class="bi bi-envelope"></i> Email</label>
            <input class="form-control" type="email" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="password"><i class="bi bi-key"></i> Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
        </div>
        <button class="btn btn-primary" type="submit"><i class="bi bi-box-arrow-in-right"></i> Sign in</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up</a> here.</p>
    </div>
    <?php
}
?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
