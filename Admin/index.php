<?php
// Include necessary files and start the session
include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');

// Check if the user is already logged in and has a role
if (isset($_SESSION['id']) && isset($_SESSION['user_role'])) {
    $userRole = $_SESSION['user_role'];

    // Redirect to the appropriate dashboard based on the user's role
    if ($userRole === 'Admin') {
        header('Location: dashboard.php');
    } elseif ($userRole === 'Blogger') {
        header('Location: add_blog.php');
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Vendor CSS file -->
    <link rel="stylesheet"
        href=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta2/css/bootstrap.min.css>
    <!-- Custom CSS files -->
    <link rel="stylesheet" href="css/style.css">

</head>
<?php
if (isset($_POST['email'])) {
    if ($stm = $connect->prepare('SELECT * FROM users WHERE email = ? AND password = ? AND status = 1')) {
        $hashed = SHA1($_POST['password']);
        $stm->bind_param('ss', $_POST['email'], $hashed);
        $stm->execute();

        $result = $stm->get_result();
        $user = $result->fetch_assoc();

        // After successful login, set the user's role in the session
        if ($user) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Assuming the role column in your database is named 'role'

            set_message("You have successfully logged in " . $_SESSION['username']);

            // Redirect based on the user's role
            if ($_SESSION['role'] === 'Admin') {
                header('Location: dashboard.php');
            } elseif ($_SESSION['role'] === 'Blogger') {
                header('Location: add_blogs.php');
            }
            die();
        }

        $stm->close();

    } else {
        echo 'Could not prepare statement!';
    }


}
?>

<body class="colored">

    <section class="container login">
        <div class="row">
            <div class="col-md-12 offset-md-5 mx-auto log">
                <div class="card my-5">

                    <form method="post" class="card-body cardbody-color p-lg-5">
                        <h3><strong>ADMIN LOGIN</strong></h3>

                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                                alt="profile">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email"></label>
                            <input type="email" id="email" name="email" class="form-control" required
                                placeholder="Enter Email" />

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password"></label>
                            <input type="password" id="password" name="password" class="form-control" required
                                placeholder="Enter Password" />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-color px-5 mt-3 mb-3">Login</button>
                            
                        </div>
                        <div class="text-center">
                        <a href="register.php" class="btn btn-link">New user Here</a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>