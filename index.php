<?php 
  // include digunakan utk mngkoneksi isi yg ada di koneksi.php ke index.php
  include 'koneksi.php';
  // session_start digunakan utk memulai session dn utk mengakhiri pakai session_destroy
  session_start();


  // mysqli_query dignkan utk menampilkan/memproses data yg ada di database atau sql
  $query = "SELECT * FROM tb_pegawai";
  $sql = mysqli_query($conn, $query );
  $no = 0;



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstraps -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"
    />

    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />

    <title>Data Karyawan</title>
  </head>
  <body>
    <!-- Navbar Start -->
    <nav class="navbar bg-light-tertiary mb-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">CRUD </a>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Cari di sini Mas Mbak..." aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Judul -->
    <div class="container">
      <h2>Data Karyawan</h2>
      <div class="mb-4">
        <h5>Data yang telah disimpan</h5>
        <p>- Pt. Nicosa Sejahtera</p>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
          <i class="bi bi-plus-circle"></i> Tambah Data
        </a>

        <?php
            if(isset($_SESSION['eksekusi'])):
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['eksekusi']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            session_destroy(); //kode utk mengakhiri sesi
            endif;
        ?>

        <div class="table-responsive">
          <table class="table align-middle table-bordered table-hover mt-2">
            <thead class="table-dark">
              <tr>
                <!--th ini sesuaikan sama yg ada di database-->
                <th><center>No</center></th>
                <th><center>No Induk</center></th>
                <th><center>Nama Karyawan</center></th>
                <th><center>Jenis Kelamin</center></th>
                <th><center>Jabatan</center></th>
                <th><center>Alamat</center></th>
                <th><center>Act</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
              while($result = mysqli_fetch_assoc($sql)){
              ?>
                  <tr>
                    <!--td ini tabel utk menyimpan data-->
                    <td><center><?php echo ++$no;?>.</center></td>
                    <td><center><?php echo $result['noi_pgw']; ?></center></td>
                    <td><?php echo $result['nama_pgw']; ?></td>
                    <td><?php echo $result['jenis_kelamin']; ?></td>
                    <td><?php echo $result['jabatan_pgw']; ?></td>
                    <td><?php echo $result['alamat_pgw']; ?></td>
                    <td>
                      <center>
                        <a
                          href="kelola.php?edit=<?php echo $result['id_pgw']; ?>"
                          type="button"
                          class="btn btn-success btn-sm"
                        >
                          <i class="fa fa-pencil"></i>
                        </a>
                        <a
                          href="proses.php?hapus=<?php echo $result['id_pgw']; ?>"
                          type="button"
                          class="btn btn-danger btn-sm" 
                          onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut ?')"
                        >
                          <i class="fa fa-trash-o"></i>
                        </a>
                      </center>
                    </td>
                  </tr>
              <?php
                  }
              ?>
            </tbody>       
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
