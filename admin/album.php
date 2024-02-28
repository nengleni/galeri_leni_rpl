<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert ('Anda Belum Login');
    location.href='../index.php';
    </script>";
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <?php include '../assets/font/link.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand fs-2" href="index.php">E-Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNav">
                <div class="halaman">
                    <div class="navbar-nav me-auto">
                        <a href="home.php" class="nav-link">Home</a>
                        <a href="album.php" class="nav-link">Album</a>
                        <a href="foto.php" class="nav-link">Foto</a>
                    </div>
                </div>
            </div>

            <div class="das">
                <a href="../config/aksilogout.php" class="btn btn-outline-danger font m-1">Logout</a>
            </div>
        </div>

    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-3 bg-light">
                    <div class="card-header">Tambah Album</div>
                    <div class="card-body bg-white">
                        <form action="../config/aksialbum.php" method="POST">
                            <label class="form-label">Nama Album</label>
                            <input type="text" name="namaalbum" class="form-control" required>
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" required></textarea>
                            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card album mt-3 bg-light">
                    <div class="card-header">Data Album</div>
                    <div class="card-body bg-white">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Album</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['namaalbum'] ?></td>
                                    <td><?php echo $data['deskripsi'] ?></td>
                                    <td><?php echo $data['tanggaldibuat'] ?></td>
                                    <td>
                                        <!-- Tombol Triger Edit-->
                                        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal"
                                            data-bs-target="#edit<?php echo $data['albumid'] ?>">
                                            Edit
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="edit<?php echo $data['albumid'] ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body bg-white">
                                                        <form action="../config/aksialbum.php" method="POST">
                                                            <input type="hidden" name="albumid"
                                                                value="<?php echo $data['albumid'] ?>">
                                                            <label class="form-label">Nama Album</label>
                                                            <input type="text" name="namaalbum"
                                                                value="<?php echo $data['namaalbum'] ?>"
                                                                class="form-control" required>
                                                            <label class="form-label">Deskripsi</label>
                                                            <textarea name="deskripsi" class="form-control"
                                                                required><?php echo $data['deskripsi']; ?></textarea>
                                                    </div>

                                                    <div class="modal-footer bg-light">
                                                        <button type="submit" name="edit"
                                                            class="btn btn-primary">Edit</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>


                                        <!-- Tombol Triger Hapus-->
                                        <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal"
                                            data-bs-target="#hapus<?php echo $data['albumid'] ?>">
                                            Hapus
                                        </button>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapus<?php echo $data['albumid'] ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body bg-white">
                                                        <form action="../config/aksialbum.php" method="POST">
                                                            <input type="hidden" name="albumid"
                                                                value="<?php echo $data['albumid'] ?>">
                                                            Apakah anda yakin ingin menghapus data
                                                            <strong><?php echo $data['namaalbum'] ?></strong> ?
                                                    </div>

                                                    <div class="modal-footer bg-light">
                                                        <button type="submit" name="hapus"
                                                            class="btn btn-primary">Hapus</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>


                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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