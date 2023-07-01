<!DOCTYPE html>

<?php
  include 'koneksi.php';
    // Ketika klik tambah data
    // Data d bwh ini sesuaikan dg yg ada di localhost !
    $noi_pgw = '';
    $nama_pgw = '';
    $jenis_kelamin = '';
    $jabatan_pgw = '';
    $alamat_pgw = '';

    // Proses edit data start => tombol edit ketika d klik
    if(isset($_GET['edit'])){
      $id_pgw = $_GET['edit'];
      
      $query = "SELECT * FROM tb_pegawai WHERE id_pgw = '$id_pgw'";
      $sql = mysqli_query($conn, $query);
      
      $result = mysqli_fetch_assoc($sql);
      
      // Data d bwh ini sesuaikan dg yg ada di localhost !
      $noi_pgw = $result['noi_pgw'];
      $nama_pgw = $result['nama_pgw'];
      $jenis_kelamin = $result['jenis_kelamin'];
      $jabatan_pgw = $result['jabatan_pgw'];
      $alamat_pgw = $result['alamat_pgw'];
      
      // Proses edit data end

    // var_dump($result);
    // die();

  }
?>

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
    <nav class="navbar bg-light-tertiary mb-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">CRUD </a>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Form Start -->
    <div class="container">
      <form method="POST" action="proses.php">
        <!-- input dibwh d gunakan utk patokan disimpan data menggunakan id_pgw -->
        <input type="hidden" value="<?php echo $id_pgw; ?>" name="id_pgw">
        <div class="judul"><h2>Data Karyawan</h2></div>
        <div class="div table-group-divider mb-3"></div>
        <!--garis bwh pd tabel-->
        <div class="mb-3 row">
          <label for="noi_pgw" class="col-sm-2 col-form-label">No Induk</label>
          <div class="col-sm-10">
            <!-- Didalam input fungsi required agar tidak kosong dari masing2 form -->
            <input
              required
              type="text"
              name="noi_pgw"
              class="form-control"
              id="noi_pgw"
              placeholder="Ex. 2021502028"
              value="<?php echo $noi_pgw; ?>"
            />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nama_kar" class="col-sm-2 col-form-label">Nama karyawan</label>
          <div class="col-sm-10">
            <input
              required
              type="text"
              name="nama_pgw"
              class="form-control"
              id="nama_kar"
              placeholder="Ex. Lukman Ardian"
              value="<?php echo $nama_pgw; ?>"
            />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-10">
            <select value="<?php echo $jenis_kelamin; ?>" required id="jenis_kelamin" name="jenis_kelamin" class="form-select">
              <option <?php if($jenis_kelamin == 'Pilih Jenis Kelamin'){echo "selected";} ?> value="Pilih Jenis Kelamin">Pilih Jenis Kelamin</option>
              <option <?php if($jenis_kelamin == 'Laki-laki'){echo "selected";} ?> value="Laki-laki">Laki-Laki</option>
              <option <?php if($jenis_kelamin == 'Perempuan'){echo "selected";} ?> value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
          <div class="col-sm-10">
            <select value="<?php echo $jabatan_pgw; ?>" required id="jabatan" name="jabatan_pgw" class="form-select">
              <option <?php if($jabatan_pgw == 'Pilih Jabatan'){echo "selected";} ?> value="Pilih Jabatan">Pilih Jabatan</option>
              <option <?php if($jabatan_pgw == 'Direktur'){echo "selected";} ?> value="Direktur">Direktur</option>
              <option <?php if($jabatan_pgw == 'Sekretaris'){echo "selected";} ?> value="Sekretaris">Sekretaris</option>
              <option <?php if($jabatan_pgw == 'keamanan'){echo "selected";} ?> value="Keamanan">Keamanan</option>
              <option <?php if($jabatan_pgw == 'Cleaning Service'){echo "selected";} ?> value="Cleaning Service">Cleaning Service</option>
              <option <?php if($jabatan_pgw == 'Satpam'){echo "selected";} ?> value="Satpam">Satpam</option>
            </select>
          </div>
        </div>
        <div class="mb-5 row">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
          <div class="col-sm-10">
            <textarea
              required
              id="alamat"
              name="alamat_pgw"
              class="form-control"
              rows="3"><?php echo $alamat_pgw;?>
            </textarea>
          </div>
        </div>
        
        <!-- Button bawah start -->
        <div class="mb-3 row">
          <div class="col">
            <!-- Kode PHP ketika di klik edit pada index.php start -->
            <!-- Tambahkan kode ?edit=  terlebih dahulu di index.php -->
            <?php
            if(isset($_GET['edit'])){
              ?>
              <button type="submit" name="act" value="edit" class="btn btn-primary">
                <i class="bi bi-save"></i>   Simpan Data
              </button>
              <?php
            } else{
              ?>
              <button type="submit" name="act" value="add" class="btn btn-primary">
                <i class="bi bi-save"></i>     Tambah Data
              </button>
              <?php
            }
            ?>
            <!-- Kode PHP ketika di klik edit pada index.php end -->
            <a href="index.php " type="button" class="btn btn-danger">
              Batal</a
            >
          </div>
          <!-- Button bawah end -->
        </div>
      </form>
    </div><!-- Form end -->
    
  </body>
</html>
