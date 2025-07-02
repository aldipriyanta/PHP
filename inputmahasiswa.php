<?php
    require_once 'koneksi.php';

function inputData($nim, $nama, $kota, $conn) {
    $response = array();

    if(!$conn) {
        $response['status'] = 'error';
        $response['message'] = "Koneksi gagal" . mysqli_connect_error();
        return $response;
    }

    $sql = "INSERT INTO tmahasiswa (NIM, NamaLengkap, KotaAsal) 
            VALUES ('$nim', '$nama', '$kota')";
    
    if (mysqli_query($conn, $sql)) {
        $response['status'] = 'success';
        $response['message'] = "Data berhasil disimpan";
    } else {
        $response['status'] = 'error';
        $response['message'] = "Data gagal disimpan: " . mysqli_error($conn);
    }

    return $response;

}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['NIM']) && isset($_POST['NamaLengkap']) && isset($_POST['KotaAsal'])) {
        $nim = $_POST['NIM'];
        $nama = $_POST['NamaLengkap'];
        $kota = $_POST['KotaAsal'];

        $result = inputData($nim, $nama, $kota, $conn);
    } else {
        $result = array(
            'status' => 'error',
            'message' => 'Data tidak lengkap'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($result);
}

mysqli_close($conn);
?>
