<?php
include 'karyawan.php';
include 'keuangan.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['metode']) && $_GET['metode'] == 'get') {
    if (isset($_GET['upah_per_jam']) && isset($_GET['jam_kerja'])) {
        $upah_per_jam = $_GET["upah_per_jam"];
        $jam_kerja = $_GET["jam_kerja"];

        $karyawan = new Karyawan($upah_per_jam, $jam_kerja);
        $upah_total = $karyawan->hitungUpah();

        echo "<div class='result'>";
        echo "<h3>Hasil Perhitungan:</h3>";
        echo "Jumlah upah per jam: " . Keuangan::formatUpah($upah_per_jam) . "<br>";
        echo "Jumlah jam kerja: " . $jam_kerja . " Jam<br>";
        echo "Jumlah upah total: " . Keuangan::formatUpah($upah_total) . "<br>";
        echo "</div>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" || ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['metode']) && $_GET['metode'] == 'post')) {
    if (isset($_REQUEST['upah_per_jam']) && isset($_REQUEST['jam_kerja'])) {
        $upah_per_jam = $_REQUEST['upah_per_jam'];
        $jam_kerja = $_REQUEST['jam_kerja'];

        $karyawan = new Karyawan($upah_per_jam, $jam_kerja);
        $upah_total = $karyawan->hitungUpah();

        echo "<div class='result'>";
        echo "<h3>Hasil Perhitungan:</h3>";
        echo "Jumlah upah per jam: " . Keuangan::formatUpah($upah_per_jam) . "<br>";
        echo "Jumlah jam kerja: " . $jam_kerja . " Jam<br>";
        echo "Jumlah upah total: " . Keuangan::formatUpah($upah_total) . "<br>";
        echo "</div>";
    }
}
?>
