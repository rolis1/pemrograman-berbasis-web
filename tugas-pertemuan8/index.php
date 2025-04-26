<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Rute Penerbangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Form Pendaftaran Rute Penerbangan</h2>

    <?php
    // Data Bandara Asal
    $bandara_asal = [
        "Soekarno Hatta" => 65000,
        "Husein Sastranegara" => 50000,
        "Abdul Rachman Saleh" => 40000,
        "Juanda" => 30000
    ];

    // Data Bandara Tujuan
    $bandara_tujuan = [
        "Ngurah Rai" => 85000,
        "Hasanuddin" => 70000,
        "Inanwatan" => 90000,
        "Sultan Iskandar Muda" => 60000
    ];

    // Urutkan nama bandara
    ksort($bandara_asal);
    ksort($bandara_tujuan);

    // Jika form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_maskapai = $_POST['nama_maskapai'];
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $harga_tiket = (int)$_POST['harga_tiket'];
        $tanggal = date("d-m-Y"); // Tanggal hari ini

        // Hitung Pajak
        $pajak_asal = $bandara_asal[$asal];
        $pajak_tujuan = $bandara_tujuan[$tujuan];
        $total_pajak = $pajak_asal + $pajak_tujuan;

        // Total Harga
        $total_harga = $harga_tiket + $total_pajak;

        // Tampilkan hasil
        echo "<h3>Data Penerbangan</h3>";
        echo "Tanggal Input: " . $tanggal . "<br>";
        echo "Nama Maskapai: " . htmlspecialchars($nama_maskapai) . "<br>";
        echo "Asal Penerbangan: " . htmlspecialchars($asal) . "<br>";
        echo "Tujuan Penerbangan: " . htmlspecialchars($tujuan) . "<br>";
        echo "Harga Tiket: Rp " . number_format($harga_tiket, 0, ',', '.') . "<br>";
        echo "Pajak: Rp " . number_format($total_pajak, 0, ',', '.') . "<br>";
        echo "Total Harga Tiket: Rp " . number_format($total_harga, 0, ',', '.') . "<br><br>";
    }
    ?>

    <form method="post" action="">
        <label for="nama_maskapai">Nama Maskapai:</label><br>
        <input type="text" id="nama_maskapai" name="nama_maskapai" required><br><br>

        <label for="asal">Bandara Asal:</label><br>
        <select id="asal" name="asal" required>
            <option value="">-- Pilih Bandara Asal --</option>
            <?php foreach ($bandara_asal as $nama_asal => $pajak_asal): ?>
                <option value="<?= htmlspecialchars($nama_asal) ?>"><?= htmlspecialchars($nama_asal) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="tujuan">Bandara Tujuan:</label><br>
        <select id="tujuan" name="tujuan" required>
            <option value="">-- Pilih Bandara Tujuan --</option>
            <?php foreach ($bandara_tujuan as $nama_tujuan => $pajak_tujuan): ?>
                <option value="<?= htmlspecialchars($nama_tujuan) ?>"><?= htmlspecialchars($nama_tujuan) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="harga_tiket">Harga Tiket:</label><br>
        <input type="number" id="harga_tiket" name="harga_tiket" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
