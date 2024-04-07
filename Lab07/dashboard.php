<?php require '_auth.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Lab #7</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
<?php include '_nav.php';?>
<div class="container py-3">

<?php
if ($logged_in) {
?>
    <h3>User Management Dashboard</h3>
    <p>You can create, read, update, and delete this website's users from here.</p>
    <div class="d-flex justify-content-between">

        <div class="my-3 me-3 flex-fill">
            <form method="post" action="add-user.php">
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
                <button class="btn btn-primary" type="submit"><i class="bi bi-person-add"></i> Add User</button>
            </form>
        </div>

        <div class="my-2 ms-3 flex-fill">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><i class="bi bi-person"></i> First Name</th>
                        <th scope="col"><i class="bi bi-person"></i> Last Name</th>
                        <th scope="col"><i class="bi bi-envelope"></i> Email</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- this table is filled using jquery/ajax after the page has loaded -->
                </tbody>
            </table>
        </div>
    </div>

<?php
} else { // not logged in
    ?>
    <h3>You are not signed in.</h3>
    <p>To access this website, <a href="login.php">sign in</a> here.</p>
<?php
}
?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $.ajax('users.php').done(users=>{
        for (let user of users) {
            console.log(user);
            html = '<tr>';
            html += '<th scope="row">' + user.id + '</th>';
            html += '<td>' + user.firstname + '</td>';
            html += '<td>' + user.lastname + '</td>';
            html += '<td>' + user.email + '</td>';
            html += '<td><a class="link-danger" href="delete-user.php?id=' + user.id + '"><i class="bi bi-trash"></i></a></td>';
            html += '</tr>';
            $('tbody').append(html);
        }
    })
</script>
</body>

</html>
