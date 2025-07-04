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
            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil diupdate'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Error: ' . mysqli_error($conn)
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Data input tidak lengkap'
        ]);
    }

mysqli_close($conn);
?>