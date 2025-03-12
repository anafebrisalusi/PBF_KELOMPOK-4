<?php
header('Content-Type: application/json; charset=UTF-8');

$host = "localhost";
$user = "root"; 
$pass = ""; 
$dbname = "sistem_sidangakhir"; 

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Koneksi gagal: " . $conn->connect_error]));
}

$type = isset($_GET['type']) ? $_GET['type'] : '';

switch ($type) {
    case "mahasiswa":
        $sql = "SELECT * FROM mahasiswa";
        break;
    case "jadwalsidang":
        $sql = "SELECT
                    mahasiswa.nama_mahasiswa, 
                    mahasiswa.NIM, 
                    mahasiswa.prodi, 
                    dosen.nama_dosen, 
                    CASE 
                        WHEN DAYOFWEEK(sidang.waktu_sidang) = 1 THEN 'Minggu'
                        WHEN DAYOFWEEK(sidang.waktu_sidang) = 2 THEN 'Senin'
                        WHEN DAYOFWEEK(sidang.waktu_sidang) = 3 THEN 'Selasa'
                        WHEN DAYOFWEEK(sidang.waktu_sidang) = 4 THEN 'Rabu'
                        WHEN DAYOFWEEK(sidang.waktu_sidang) = 5 THEN 'Kamis'
                        WHEN DAYOFWEEK(sidang.waktu_sidang) = 6 THEN 'Jumat'
                        WHEN DAYOFWEEK(sidang.waktu_sidang) = 7 THEN 'Sabtu'
                    END AS hari, 
                    DATE_FORMAT(sidang.waktu_sidang, '%d %M %Y') AS tanggal, 
                    DATE_FORMAT(sidang.waktu_sidang, '%H:%i') AS jam, 
                    sidang.ruang_sidang
                FROM mahasiswa
                INNER JOIN sidang ON mahasiswa.NIM = sidang.NIM
                INNER JOIN dosen ON dosen.NIDN = sidang.NIDN";
        break;
    case "dosen":
        $sql = "SELECT * FROM dosen";
        break;
    case "hasilsidang":
        $sql = "SELECT
                    mahasiswa.nama_mahasiswa, 
                    mahasiswa.NIM,  
                    hasil_sidang.nilai, 
                    hasil_sidang.catatan
                FROM mahasiswa
                INNER JOIN sidang ON mahasiswa.NIM = sidang.NIM
                INNER JOIN hasil_sidang ON sidang.id_sidang = hasil_sidang.id_sidang";
        break;
    default:
        echo json_encode(["error" => "Invalid type"]);
        exit();
}

$result = $conn->query($sql);
$data = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(["error" => "Query gagal: " . $conn->error]);
}

$conn->close();
?>
