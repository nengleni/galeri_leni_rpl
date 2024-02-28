<?php
session_start();
include '../config/koneksi.php';
$userid = $_SESSION['userid'];
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

    <div class="container mt-3 mb-5">
        Album:
        <?php
        $album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
        while ($row = mysqli_fetch_array($album)) { ?>
        <a href="home.php?albumid=<?php echo $row['albumid'] ?>"
            class="btn btn-outline-warning"><?php echo $row['namaalbum'] ?></a>
        <?php } ?>

        <div class="row">
            <?php
            if (isset($_GET['albumid'])) {
                $albumid = $_GET['albumid'];
                $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid' AND albumid='$albumid' ORDER BY foto.tanggaldiunggah DESC");
                while ($data = mysqli_fetch_array($query)) { ?>
            <div class="col-md-3 mt-2">

                <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
                    <div class="card">
                        <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top"
                            title="<?php echo $data['judulfoto'] ?>" width="200px">
                        <div class="card-footer text-start">

                            <?php
                                    $fotoid = $data['fotoid'];
                                    $ceklike = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                    if (mysqli_num_rows($ceklike) == 1) { ?>

                            <a href="../config/proseslike.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                                name="batalsuka"><i class="fa fa-heart"></i></a>

                            <?php } else { ?>

                            <a href="../config/proseslike.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                                name="suka"><i class="fa-regular fa-heart"></i></a>
                            <?php }

                                    $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($like) . ' Suka';
                                    ?>
                            <a href="#" type="button" data-bs-toggle="modal"
                                data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i
                                    class="fa-regular fa-comment"></i></a>
                            <?php
                                    $jumlahkmen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($jumlahkmen) . ' Komentar';
                                    ?>
                        </div>
                    </div>
                </a>

                <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top"
                                            title="<?php echo $data['judulfoto'] ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="m-2">
                                            <div class="overflow-auto">
                                                <div class="sticky-top">
                                                    <div class="judul mb-2">
                                                        <strong><?php echo $data['judulfoto'] ?></strong>
                                                    </div>

                                                    <span
                                                        class="badge bg-info"><?php echo $data['tanggaldiunggah'] ?></span>

                                                </div>
                                                <hr>
                                                <div class="teks">
                                                    <p style="text-align: left;">
                                                        "<?php echo $data['deskripsifoto'] ?>."
                                                    </p>
                                                </div>
                                                <hr>
                                                <div class="scrol">
                                                    <?php
                                                            $fotoid = $data['fotoid'];
                                                            $komeantar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                                            while ($row = mysqli_fetch_array($komeantar)) { ?>
                                                    <p style="text-align: left;">
                                                    <div class="judul fw-bold">
                                                        <?php echo $row['namalengkap'] ?>
                                                    </div>
                                                    <div class="komentar justify-content-between">

                                                        <?php echo $row['isikomentar'] ?>


                                                        <a href="../config/hapuskomentar.php?komentarid=<?php echo $row['komentarid'] ?>"
                                                            class="btn btn-danger btn-sm bi bi-trash3"></a>

                                                    </div>
                                                    </p>
                                                    <?php } ?>
                                                </div>
                                                <hr>
                                                <div class="sticky-bottom">
                                                    <form action="../config/proseskomentari.php" method="POST">
                                                        <input type="hidden" name="fotoid"
                                                            value="<?php echo $data['fotoid'] ?>">

                                                        <div class="kolom mb-2">
                                                            <textarea type="text" name="isikomentar"
                                                                class="form-control shadow-none"
                                                                placeholder="Tambah Komentar"></textarea>
                                                        </div>
                                                        <button type="submit" name="kirimkomentar"
                                                            class="btn btn-warning">Kirim</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php }
            } else {


                $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid' ORDER BY foto.tanggaldiunggah DESC");
                while ($data = mysqli_fetch_array($query)) { ?>
            <div class="col-md-3 ">
                <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
                    <div class="card">
                        <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top"
                            title="<?php echo $data['judulfoto'] ?>" width="200px">
                        <div class="card-footer text-start">

                            <?php
                                    $fotoid = $data['fotoid'];
                                    $ceklike = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                                    if (mysqli_num_rows($ceklike) == 1) { ?>

                            <a href="../config/proseslike.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                                name="batalsuka"><i class="fa fa-heart"></i></a>

                            <?php } else { ?>

                            <a href="../config/proseslike.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit"
                                name="suka"><i class="fa-regular fa-heart"></i></a>
                            <?php }

                                    $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($like) . ' Suka';
                                    ?>
                            <a href="#" type="button" data-bs-toggle="modal"
                                data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i
                                    class="fa-regular fa-comment"></i></a>
                            <?php
                                    $jumlahkmen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                    echo mysqli_num_rows($jumlahkmen) . ' Komentar';
                                    ?>
                        </div>
                    </div>
                </a>

                <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top"
                                            title="<?php echo $data['judulfoto'] ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="m-2">
                                            <div class="overflow-auto">
                                                <div class="sticky-top">
                                                    <div class="judul mb-2">
                                                        <strong><?php echo $data['judulfoto'] ?></strong>
                                                    </div>


                                                    <span
                                                        class="badge bg-info"><?php echo $data['tanggaldiunggah'] ?></span>


                                                </div>
                                                <hr>
                                                <div class="teks">
                                                    <p style="text-align: left;">
                                                        "<?php echo $data['deskripsifoto'] ?>."
                                                    </p>
                                                </div>
                                                <hr>
                                                <div class="scrol">
                                                    <?php
                                                            $fotoid = $data['fotoid'];
                                                            $komeantar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                                            while ($row = mysqli_fetch_array($komeantar)) { ?>
                                                    <p style="text-align: left;">
                                                    <div class="judul fw-bold">
                                                        <?php echo $row['namalengkap'] ?>
                                                    </div>

                                                    <div class="komentar justify-content-between">
                                                        <?php echo $row['isikomentar'] ?>
                                                        <a href="../config/hapuskomentar.php?komentarid=<?php echo $row['komentarid'] ?>"
                                                            class="btn btn-danger btn-sm bi bi-trash3"></a>
                                                    </div>

                                                    </p>
                                                    <?php } ?>
                                                </div>
                                                <hr>
                                                <div class="sticky-bottom">
                                                    <form action="../config/proseskomentari.php" method="POST">
                                                        <input type="hidden" name="fotoid"
                                                            value="<?php echo $data['fotoid'] ?>">

                                                        <div class="kolom mb-2">
                                                            <textarea type="text" name="isikomentar"
                                                                class="form-control shadow-none"
                                                                placeholder="Tambah Komentar"></textarea>
                                                        </div>
                                                        <button type="submit" name="kirimkomentar"
                                                            class="btn btn-warning">Kirim</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php }
            } ?>
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