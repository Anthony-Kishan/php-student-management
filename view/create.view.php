<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <main>
        <div class="container mt-5">
            <div class="card border-dark p-0">
                <div class="card-title bg-primary text-white rounded-top m-0 py-3 px-3 ">
                    <h2>Add New Student</h2>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center py-1">
                        <form method="post" action="create.php" enctype="multipart/form-data" class="my-3">
                            <span class="d-flex">
                                <div>
                                    <label for="name">Name</label><br>
                                    <input type="text" id="name" name="name" placeholder="Name" required
                                        class="my-1 py-2 px-2 me-5">
                                </div>

                                <div>
                                    <label for="phone">Phone</label><br>
                                    <input type="text" id="phone" name="phone" placeholder="Phone" required
                                        class="my-1 py-2 px-2"><br>
                                </div>
                            </span>


                            <label for="address" class="mt-3">Address</label>
                            <input type="text" id="address" name="address" placeholder="Address" required
                                class="my-2 py-2 px-2 w-100"><br>

                            <input type="file" name="choosefile" value="" />

                            <button type="submit" class="bg-primary text-white text-center text-decoration-none border-0 rounded-1 my-2 px-2 py-2">Add
                                Student</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>