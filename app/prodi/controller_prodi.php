<?php 
require "../../config/config_database.php";
$db = koneksi(hostname, username, password, database);

$act = $_GET['act'];

if($act == 'input'){
        // Section TAMBAH DATA
    // Menggunakan $_POST karena di form_prodi.php method yg digunakan "post"
    $kd_prodi = $_POST['kd_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $kd_fakultas = $_POST['kd_fakultas'];
    $password = sha1($_POST['password']); //sha1 yaitu utk enkripsi password, agar d databse pass tdk bisa d lihat.

    $query = $db->query("INSERT INTO prodi (kd_prodi, nama_prodi, kd_fakultas, password)
                    VALUES ('$kd_prodi', '$nama_prodi', '$kd_fakultas', '$password')"); //yg berada d dalam kurung yaitu kolom yg akan dimanipulasi dan diseblm kurung yaitu nama tabel nya.

    if($query){ //Bacanya jika query tersimpan
        echo "<script>
        alert('Data Berhasil di Simpan');
        window.location.href='list_prodi.php'; 
        </script>";
    } else{
        echo "<script>  
        alert('Data Gagal di Simpan');
        window.location.href='form_prodi.php'; 
        </script>";
    }
}
else if($act == 'edit'){
    $kd_prodi_old = $_POST['kd_prodi_old'];
    $kd_prodi = $_POST['kd_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $kd_fakultas = $_POST['kd_fakultas'];
    $password = ($_POST['password']);

    if(!empty($password)){
        $password_fix = sha1($password);
        $query = $db->query("UPDATE prodi SET kd_prodi = '$kd_prodi', nama_prodi = '$nama_prodi',
                                                kd_fakultas = '$kd_fakultas', password = '$password_fix'
                                                WHERE kd_prodi= '$kd_prodi_old'"); 59:52
    }
}
else if($act == 'hapus'){

}
else{
    echo "<script>
    alert('Maaf, Parameter anda tidak valid !!');
    window.location.href='list_prodi.php'; 
    </script>";
}


