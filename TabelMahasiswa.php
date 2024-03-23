<?php
// Fungsi untuk menghitung rata-rata
function hitungratarata($tugas, $uts, $uas) {
    return ($tugas + $uts + $uas) / 3;
}

// Fungsi untuk menentukan nilai akhir
function nilaiakhir($avg){
    if($avg > 80){
        return "A";
    } else if($avg < 80){
        return "B";
    } else if($avg < 70){
        return "C";
    } else if($avg < 60){
        return "D";
    }
}

// Associative satu dimensi
$namakolom = array(
    "nama" => "Nama",
    "tugas" => "Nilai Tugas",
    "uts" => "Nilai UTS",
    "uas" => "Nilai UAS",
    "avg" => " Nilai Rata-rata",
    "nilai" => "Nilai Akhir"
);
// Associative Multi dimensi
$datamhs = array(
    array(
        $namakolom["nama"] => "Wayan",
        $namakolom["tugas"] => 70,
        $namakolom["uts"] => 80,
        $namakolom ["uas"] => 80
    ),
    array(
        $namakolom["nama"] => "Made",
        $namakolom["tugas"] => 80,
        $namakolom["uts"] => 70,
        $namakolom ["uas"] => 70
    ),
    array(
        $namakolom["nama"] => "Nyoman",
        $namakolom["tugas"] => 90,
        $namakolom["uts"] => 70,
        $namakolom ["uas"] => 60
    ),
);
?>

<!-- Tampilan dan Style dengan menggunakan html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
        }
        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Tabel Nilai Mahasiswa</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Nilai Tugas</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Rata-rata</th>
            <th>Nilai Akhir</th>
        </tr>
        <?php foreach ($datamhs as $data) : ?>
            <tr>
                <td><?php echo $data['Nama']; ?></td>
                <td><?php echo $data['Nilai Tugas']; ?></td>
                <td><?php echo $data['Nilai UTS']; ?></td>
                <td><?php echo $data['Nilai UAS']; ?></td>
                <?php
                $avg = hitungratarata($data['Nilai Tugas'], $data['Nilai UTS'], $data['Nilai UAS']);
                $nilai = nilaiakhir($avg);
                ?>
                <td><?php echo round($avg, 2); ?></td>
                <td><?php echo $nilai; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>