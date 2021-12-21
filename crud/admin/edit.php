<?php 
require '../functions/functions.php';

$id = $_GET["id_buku"];

$buku = query("SELECT * FROM buku WHERE id_buku = $id")[0];

$conn = mysqli_connect("localhost","root","","crud");

if(isset($_POST["submit"])){
    if(edit($_POST) > 0){
        echo "berhasil";
        header("location:index.php");
    } else {
        echo "gagal";
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="../asset/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Applikasi Crud</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../logout.php">Keluar</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <!-- baru -->
            <div class="accordion accordion-flush" id="accordioFlush">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionSatu" aria-expanded="false" aria-controls="accordionSatu">
                        Buku
                    </button>
                    </h2>
                    <div id="accordionSatu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordioFlush">
                        <div class="accordion-body p-0">
                            <div class="list-group">
                                <a href="index.php" class="list-group-item list-group-item-action">Data Buku</a>
                                <a href="tambah.php" class="list-group-item list-group-item-action">Tambah Buku</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionDua" aria-expanded="false">
                        Peminjaman
                    </button>
                    </h2>
                    <div id="accordionDua" class="accordion-collapse collapse" data-bs-parent="#accordioFlush">
                        <div class="accordion-body p-0">
                            <div class="list-group">
                                <a href="index.php" class="list-group-item list-group-item-action">Data Buku</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionTiga" aria-expanded="false">
                        Siswa
                    </button>
                    </h2>
                    <div id="accordionTiga" class="accordion-collapse collapse" data-bs-parent="#accordioFlush">
                        <div class="accordion-body p-0">
                            <div class="list-group">
                                <a href="index.php" class="list-group-item list-group-item-action">Data Buku</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- akhir -->
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Buku</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <!-- main -->
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_buku" value="<?= $buku["id_buku"];?>">
            <input type="hidden" name="gambarLama" value="<?= $buku["gambar"];?>">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Buku</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $buku["nama"]; ?>" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis Buku</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $buku["penulis"]; ?>" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="date" class="form-control" id="tahun" name="tahun" value="<?= $buku["tahun"]; ?>" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar</label> 
                <input type="file" class="form-control" id="gambar" name="gambar">
                <br><br>
                <img src="../asset/img/<?= $buku['gambar'];?>" width="300">
            </div>

            <br><br>
            <button type="submit" name="submit" class="btn btn-primary">Kirim Data</button>

        </form>
      <!-- akhir main -->
    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
