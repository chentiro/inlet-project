<?php
echo "<h1>PDO Drivers Aktif:</h1>";
if (class_exists('PDO')) {
    $drivers = PDO::getAvailableDrivers();
    if (empty($drivers)) {
        echo "<p>❌ **ERROR:** Kelas PDO ditemukan, tetapi tidak ada driver yang tersedia. Periksa lagi file php.ini.</p>";
    } else {
        echo "<p>✅ **SUKSES!** Driver yang ditemukan:</p>";
        echo "<ul>";
        foreach ($drivers as $driver) {
            // Kita mencari driver 'mysql'
            $status = ($driver == 'mysql') ? " (DRIVER YANG DIBUTUHKAN INLET)" : "";
            echo "<li><strong>$driver</strong>$status</li>";
        }
        echo "</ul>";
    }
} else {
    echo "<p>❌ **ERROR FATAL:** Kelas PDO sama sekali tidak ditemukan. PHP tidak terinstal dengan benar.</p>";
}
?>