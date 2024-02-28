<?php require('_auth.php'); if ($logged_in) { header('Location: index.php'); } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up | Lab #4</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
<?php include '_nav.php';?>
<div class="container py-3">

<?php
if (isset($_POST['firstname'])) {
    require('_sql.php');

    $firstname = $sql->real_escape_string(stripslashes($_POST['firstname']));
    $lastname = $sql->real_escape_string(stripslashes($_POST['lastname']));
    $email = $sql->real_escape_string(stripslashes($_POST['email']));
    $password = $sql->real_escape_string(stripslashes($_POST['password']));
    $created_on = date('Y-m-d H:i:s');

    $result = $sql->query("INSERT into `users` (firstname, lastname, password, email, created_on) VALUES ('$firstname', '$lastname', '" . md5($password) . "', '$email', '$created_on')");
    if ($result) {
?>
    <h3>Registration successful!</h3>
    <p>Now you can <a href="login.php">sign in</a> and access the dashboard.</p>
<?php
    } else {
?>
    <h3>Something went wrong.</h3>
    <p>Try <a href="signup.php">signing up</a> again.</p>
<?php
    }
} else {
    ?>
    <h3>Sign up for an account here</h3>
    <form method="post" class="my-3">
        <div class="mb-3">
            <label class="form-label" for="firstname"><i class="bi bi-person"></i> First Name</label>
            <input class="form-control" type="text" name="firstname" id="firstname" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="lastname"><i class="bi bi-person"></i> Last Name</label>
            <input class="form-control" type="text" name="lastname" id="lastname" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="email"><i class="bi bi-envelope"></i> Email</label>
            <input class="form-control" type="email" name="email" id="email"  required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="password"><i class="bi bi-key"></i> Password</label>
            <input class="form-control" type="password" name="password" id="password"  required>
        </div>
        <button class="btn btn-primary" type="submit"><i class="bi bi-person-add"></i> Sign up</button>
    </form>
    <p>Already have an account? <a href="login.php">Sign in</a> here.</p>
    <?php
}
?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
