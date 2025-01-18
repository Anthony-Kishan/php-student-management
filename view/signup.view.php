<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-5">
        <h1>Sign Up</h1>

        <?php if (isset($_GET['message'])): ?>
            <span class="bg-success rounded-1 d-block text-white my-3 py-2 text-center">
                <?= base64_decode($_GET['message']) ?>
            </span>
        <?php endif; ?>

        <form action="signup.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="username" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                Password: <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                    required>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Sign Up</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>

</body>

</html>