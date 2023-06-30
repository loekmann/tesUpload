<?php
require "../../config/config_database.php";
$db = koneksi(hostname, username, password, database);

$act = isset($_GET['act']) ? $_GET['act'] : false;
$kode = isset($_GET['kd_prodi']) ? $_GET['kd_prodi'] : false;

if($act == 'edit'){
    $url = "controller_prodi.php?act=edit";
    if($kode){
        $query = $db->query("SELECT * FROM prodi WHERE kd_prodi = '$kode'");
        $row = $query->fetch_array();
    } else{
        echo "<script>
    alert('Parameter kode prodi tidak valid');
    window.location.href='list_prodi.php'; 
    </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Prodi</title>
</head>
<body> <!--Membuat Form input data & Update data-->
    <form action="<?php echo $url; ?>" method="post"> <!--action yaitu ketika d simpan beralih ke-->
    <input type="hidden" name="kd_prodi_old" id="kd_prodi_old" value="<?php echo isset($row) ? $row['kd_prodi'] : ''; ?>">
        <div>
            <label for="kd_prodi">Kd Prodi</label>
            <input type="text" name="kd_prodi" id="kd_prodi" value="<?php echo isset($row) ? $row['kd_prodi'] : ''; ?> ">
        </div>
        <div>
            <label for="nama_prodi">Nama Prodi</label>
            <input type="text" name="nama_prodi" id="nama_prodi" value="<?php echo isset($row) ? $row['nama_prodi'] : ''; ?> ">
        </div>
        <div>
            <label for="kd_fakultas">Kd Fakultas</label>
            <input type="text" name="kd_fakultas" id="kd_fakultas" value="<?php echo isset($row) ? $row['kd_fakultas'] : ''; ?> ">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <input type="submit" value="Simpan Data">
        </div>
    </form> <!-- form:get = melalui url-->
</body>
</html>