<?php
    require_once 'koneksi.php';

    //FILTER DATA MHS PER NIM (id)
    $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nama= $_POST['NamaLengkap'];
        $kota = $_POST['KotaAsal'];

    //string untuk query
        $sql = "UPDATE tmahasiswa 
            SET NamaLengkap = '$nama', KotaAsal = '$kota'
            WHERE NIM = '$id'";

        if (mysqli_query($conn, $sql)) {
            echo("Update Data Berhasil");
        } else {
            echo ("Error: " . $sql . "<br>" . mysqli_error($conn));
        }
    }

    mysqli_close($conn);
?>