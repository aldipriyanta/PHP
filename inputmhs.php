<?php
    require_once 'koneksi.php';


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nim = $_POST['NIM'];
            $nama = $_POST['NamaLengkap'];
            $kota = $_POST['KotaAsal'];

            $sql = "INSERT INTO tmahasiswa (NIM, NamaLengkap, KotaAsal)
                    VALUES ($'nim', $'nama', $'kota')";
            
            if (mysqli_query($conn, $sql)) {
                echo("Data berhasil disimpan");
            } else {
                echo("Error: " . $sql . "<br>" . mysqli_error($conn));
            }
    }
    mysqli_close($conn);
?>