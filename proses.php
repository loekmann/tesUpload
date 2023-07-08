<?php
    include 'koneksi.php';
    session_start();


    //  proses tambah data start
    if(isset($_POST['act'])){
        if($_POST['act'] == "add"){
            
            // Data d bwh ini sesuaikan dg yg ada di localhost !
            
            $noi_pgw = $_POST['noi_pgw'];
            $nama_pgw = $_POST['nama_pgw'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $jabatan_pgw = $_POST['jabatan_pgw'];
            $alamat_pgw = $_POST['alamat_pgw'];

            $query = "INSERT INTO tb_pegawai VALUES(null, '$noi_pgw', '$nama_pgw', '$jenis_kelamin', '$jabatan_pgw', '$alamat_pgw')";
            $sql = mysqli_query($conn, $query);
            if($sql){
                $_SESSION['eksekusi'] = "Data Berhasil di Tambahkan !";
                header("location: index.php");
                // echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
            }else{
                echo $query;
            }
            
            // echo $noi." | ".$nama_pgw." | ".$jenis_kel." | ".$jabatan_pgw." | ".$alamat_pgw." | ";

            // Proses Tambah data end

            // Proses Edit data start
            } else if($_POST['act'] == "edit"){
                $_SESSION['eksekusi'] = "Data Berhasil di Edit!";
                header("location: index.php");
                // echo "Simpan Data <a href='index.php'>[Home]</a>";
                // Data d bwh ini sesuaikan dg yg ada di localhost
                $id_pgw = $_POST['id_pgw'];
                $noi_pgw = $_POST['noi_pgw'];
                $nama_pgw = $_POST['nama_pgw'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $jabatan_pgw = $_POST['jabatan_pgw'];
                $alamat_pgw = $_POST['alamat_pgw'];
                
                $query ="UPDATE tb_pegawai SET noi_pgw='$noi_pgw', nama_pgw='$nama_pgw', jenis_kelamin='$jenis_kelamin', jabatan_pgw='$jabatan_pgw', alamat_pgw='$alamat_pgw' WHERE id_pgw='$id_pgw';";
                $sql = mysqli_query($conn, $query);
                
                // var_dump digunakan utk melihat data yg d ambil ada / tidak
                // var_dump($_POST); 
            }
        }
        // Proses Edit data end


                // Proses Hapus Data
                if(isset($_GET['hapus'])){
                    $id_pgw = $_GET['hapus'];
                    $query = "DELETE FROM tb_pegawai WHERE id_pgw = '$id_pgw'";
                    $sql = mysqli_query($conn, $query);

                    if($sql){
                        $_SESSION['eksekusi'] = "Data Berhasil di Hapus!";
                        header("location: index.php");
                        // echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
                    }else{
                        echo $query;
                    }
                    // echo "Hapus Data <a href='index.php'>[Home]</a>";
                }