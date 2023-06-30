<?php 
require "../../config/config_database.php";
$db = koneksi(hostname, username, password, database);
?>

<!-- Setiap ada $query pasti memerlukan $db = koneksi atau pemanggilan config.database.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Prodi</title>
</head>
<body>
    <a href="form_prodi.php">Tambah Data</a>
    <?php
    $query = $db->query("SELECT * FROM prodi");  //"SELECT * FROM digunakan utk memanggil tabel dilocalhost
    ?>
    <table>
        <thead>
            <tr> <!-- th sesuaikan dengan bnyaknya kolom yang ada di table prodi localhost-->
                <th>No</th>
                <th>Kd Prodi</th>
                <th>Nama Prodi</th>
                <th>Kd Fakultas</th>
                <th>Act</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
                while($row = $query->fetch_array()){ //fetch_array digunakan utk mengambildata ($query)
                    ?>
                        <tr>  <!--td disini disamakan byknya dgn td atasnya-->
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['kd_prodi'] ?></td>
                            <td><?php echo $row['nama_prodi']; ?></td>
                            <td><?php echo $row['kd_fakultas']; ?></td>
                            <td><a href="form_prodi.php?act=edit&kd_prodi=<?php echo $row['kd_prodi']; ?> ">Edit</a> | Hapus</td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>