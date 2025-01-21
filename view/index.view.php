<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student CRUD</title>

    <!-- BOOTSTRAP 5 CDN  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DATATABLES.NET CDN -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <header>
        <div class="container d-flex justify-content-end py-3">
            <?php
            if (isset($_SESSION['username'])) {
                echo '<h5 class="mx-3">' . $_SESSION['username'] . '</h5>';
                echo '<a href=" ./user/logout.php" class="bg-primary text-white text-decoration-none rounded-1 px-2 py-1">Logout</a>';
            } else {
                echo '<a href=" ./user/login.php" class="bg-warning text-white text-decoration-none rounded-1 px-2 py-1 mx-2">Login</a>';
                echo '<a href=" ./user/signup.php" class="bg-warning text-white text-decoration-none rounded-1 px-2 py-1">Sign Up</a>';
            }
            ?>
        </div>
    </header>
    <main>
        <div class="container mt-3">
            <h1>Student Management System</h1>

            <div class="message">
                <?php if (isset($_GET['message'])): ?>
                    <span
                        class="text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-1 d-block my-3 py-2 text-center">
                        <?= base64_decode($_GET['message']) ?>
                    </span>
                <?php endif; ?>
            </div>

            <div class="modal fade" id="info_modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Student Info</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <!-- AJAX will populate data here -->
                        </div>
                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-dark">
                <div class="card-title border-dark border-bottom py-3 px-3 d-flex justify-content-between">
                    <h3>Students</h3>
                    <a href="./student/create.php" <?php echo disableLink($isLoggedIn); ?>
                        class="bg-primary text-white text-decoration-none rounded-1 px-2 py-1">Add New
                        Student</a>
                </div>
                <div class="card-body">
                    <table class="table table-white table-striped" id="studentTable">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">SL No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Created At</th>
                                <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $key => $value): ?>
                                <tr>
                                    <td class="text-center user_id"><?= $key + 1 ?></td>
                                    <td><?= $value['Name'] ?></td>
                                    <td><?= $value['Address'] ?></td>
                                    <td><?= $value['Phone'] ?></td>
                                    <td><?= $value['created_at'] ?></td>

                                    <td class="text-end">
                                        <a href="./student/edit.php?sl=<?= $value['SL']; ?>" <?php echo disableLink($isLoggedIn); ?>
                                            class="bg-success text-white text-decoration-none rounded-1 px-2 py-1">Edit</a>

                                        <a href="./student/delete.php?sl=<?= $value['SL']; ?>" <?php echo disableLink($isLoggedIn); ?>
                                            class="bg-danger text-white text-decoration-none rounded-1 px-2 py-1">Delete</a>

                                        <a href="javascript:void(0)" data-id="<?= $value['SL']; ?>" <?php echo addViewButton($isLoggedIn); ?>
                                            class="bg-primary text-white text-center text-decoration-none rounded-1 px-2 py-1 view-data">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>



            <?php
            if (!isset($_SESSION['username'])) {
                echo '<p class="mt-2 p-2 text-primary-emphasis bg-danger-subtle border border-danger-subtle rounded-3 d-inline-block"> You are not logged in yet. Please log in to interact with the page. </p>';
            } else {
                echo '';
            }
            ?>
        </div>
    </main>

    <!-- JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- BOOTSRAP JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- DATATABLES.NET JS -->
    <script src="//cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>

    <script src="./assets/script.js"></script>

    <script>
        let table = new DataTable('#studentTable');
    </script>
</body>

</html>