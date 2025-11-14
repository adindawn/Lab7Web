<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perhitungan Umur & Gaji</title>
    <style>
</head>
<body>

<div class="container">
    <h2>Form Input Data</h2>

    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Tanggal Lahir:</label>
        <input type="date" name="tgl_lahir" required>

        <label>Pekerjaan:</label>
        <select name="pekerjaan" required>
            <option value="">-- Pilih Pekerjaan --</option>
            <option value="Programmer">Programmer</option>
            <option value="Designer">Designer</option>
            <option value="Admin">Admin</option>
            <option value="Manager">Manager</option>
        </select>

        <button type="submit" name="submit">Tampilkan Hasil</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        // Hitung umur
        $tanggal = new DateTime($tgl_lahir);
        $sekarang = new DateTime();
        $umur = $sekarang->diff($tanggal)->y;

        // Gaji berdasarkan pekerjaan
        $gajiList = [
            "Programmer" => 8500000,
            "Designer"   => 6500000,
            "Admin"      => 5000000,
            "Manager"    => 12000000
        ];

        $gaji = $gajiList[$pekerjaan];

        echo "<div class='hasil'>
                <h3>Hasil Output</h3>
                Nama: <b>$nama</b><br>
                Tanggal Lahir: <b>$tgl_lahir</b><br>
                Umur: <b>$umur tahun</b><br>
                Pekerjaan: <b>$pekerjaan</b><br>
                Gaji: <b>Rp " . number_format($gaji, 0, ',', '.') . "</b>
              </div>";
    }
    ?>
</div>

</body>
</html>