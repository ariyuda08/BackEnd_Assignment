<?php
// Function untuk melakukan perhitungan upah karyawan honorer
function hitungUpah() {
    // Pengecekan apakah request method adalah GET dan metode yang dipilih adalah 'get'
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['metode']) && $_GET['metode'] == 'get') {
        // Pengecekan apakah input upah per jam dan jam kerja tersedia
        if(isset($_GET['upah_per_jam']) && isset($_GET['jam_kerja'])) {
            // Mengambil nilai input upah per jam dan jam kerja
            $upah_per_jam = $_GET["upah_per_jam"];
            $jam_kerja = $_GET["jam_kerja"];

            // Perhitungan upah total berdasarkan jumlah jam kerja
            if ($jam_kerja <= 48) {
                $upah_total = $upah_per_jam * $jam_kerja;
            } else {
                $jam_normal = 48;
                $jam_lembur = $jam_kerja - $jam_normal;
                $upah_total = ($upah_per_jam * $jam_normal) + ($upah_per_jam * 1.15 * $jam_lembur);
            }

            // Menampilkan hasil perhitungan
            echo "<div class='result'>";
            echo "<h3>Hasil Perhitungan:</h3>";
            echo "Jumlah upah per jam: Rp " . number_format($upah_per_jam, 0, ',', '.') . "<br>";
            echo "Jumlah jam kerja: " . $jam_kerja . " Jam<br>";
            echo "Jumlah upah total: Rp " . number_format($upah_total, 0, ',', '.') . "<br>";
            echo "</div>";
        }
    }
    // Pengecekan apakah request method adalah POST atau metode yang dipilih adalah 'post'
    elseif ($_SERVER["REQUEST_METHOD"] == "POST" || ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['metode']) && $_GET['metode'] == 'post')) {
        // Pengecekan apakah input upah per jam dan jam kerja tersedia
        if(isset($_REQUEST['upah_per_jam']) && isset($_REQUEST['jam_kerja'])) {
            // Mengambil nilai input upah per jam dan jam kerja
            $upah_per_jam = $_REQUEST['upah_per_jam'];
            $jam_kerja = $_REQUEST['jam_kerja'];

            // Perhitungan upah total berdasarkan jumlah jam kerja
            if ($jam_kerja <= 48) {
                $upah_total = $upah_per_jam * $jam_kerja;
            } else {
                $jam_normal = 48;
                $jam_lembur = $jam_kerja - $jam_normal;
                $upah_total = ($upah_per_jam * $jam_normal) + ($upah_per_jam * 1.15 * $jam_lembur);
            }

            // Menampilkan hasil perhitungan
            echo "<div class='result'>";
            echo "<h3>Hasil Perhitungan:</h3>";
            echo "Jumlah upah per jam: Rp " . number_format($upah_per_jam, 0, ',', '.') . "<br>";
            echo "Jumlah jam kerja: " . $jam_kerja . " Jam<br>";
            echo "Jumlah upah total: Rp " . number_format($upah_total, 0, ',', '.') . "<br>";
            echo "</div>";
        }
    }
}
?>

<!-- Tampilan dan Style dengan menggunakan html -->

<!DOCTYPE html>
<html>
<head>
  <title>Perhitungan Upah Karyawan Honorer</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 300px;
    }
    h2 {
      text-align: center;
      margin-top: 0;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    label {
      margin-bottom: 5px;
      display: inline-block;
    }
    input[type="number"], input[type="submit"], input[type="radio"] {
      margin-bottom: 10px;
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
      background-color: green;
    }
    .result {
      background-color: rebeccapurple;
      border-radius: 8px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin-top: 20px;
    }
    .result h3 {
      margin-top: 0;
    }
    .radio-label {
      display: flex;
      align-items: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Perhitungan Upah Karyawan Honorer</h2>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label for="upah_per_jam">Jumlah upah per jam:</label>
      <input type="number" id="upah_per_jam" name="upah_per_jam" required>

      <label for="jam_kerja">Jumlah jam kerja:</label>
      <input type="number" id="jam_kerja" name="jam_kerja" required>

      <div class="radio-label">
        <label for="metode_get">Metode GET</label>
        <input type="radio" id="metode_get" name="metode" value="get">
      </div>

      <div class="radio-label">
        <label for="metode_post">Metode POST</label>
        <input type="radio" id="metode_post" name="metode" value="post" checked>
      </div>

      <input type="submit" value="Hitung">
    </form>

    <?php
    // Panggil function hitungUpah
    hitungUpah();
    ?>
  </div>
</body>
</html>
