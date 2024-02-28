<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <?php include 'assets/font/link.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand fs-2" href="index.php">E-Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="das">
                <a href="register.php" class="btn btn-outline-warning font m-1">Register</a>
                <a href="login.php" class="btn btn-outline-warning font m-1">Login</a>
            </div>
        </div>

    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-body bg-light">
                        <div class="text-center">
                            <h5>Daftar Akun Baru</h5>
                        </div>
                        <form action="config/aksiregister.php" method="POST">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="namalengkap" class="form-control" required>
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                            <div class="d-grid mt-2">
                                <button class="btn btn-primary" type="submit" name="kirim">MASUK</button>
                            </div>
                        </form>
                        <hr>
                        <p>Sudah Punya Akun? <a href="login.php">Login Disini!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 fixed-bottom">
        <p>&copy; E-Gallery 2024 | Putra Nanda S</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>