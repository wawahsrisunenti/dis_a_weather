<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Cuaca</title>
    <!-- Tambahkan link Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Aplikasi Cuaca</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="GET" action="">
                    <div class="mb-3">
                        <label for="kota" class="form-label">Masukkan Nama Kota Anda</label>
                        <input type="text" class="form-control" id="kota" name="kota" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cari Cuaca</button>
                </form>

                <?php
                if(isset($_GET['kota'])){
                    $kota = $_GET['kota'];
                    $api_url = "https://api.openweathermap.org/data/2.5/weather?q=$kota&appid=38d3f38a2772b9f60a15d22896a62ca6";
                    
                    $data = file_get_contents($api_url);
                    $cuaca = json_decode($data);
                    
                    if($cuaca){
                        $suhu = $cuaca->main->temp - 273.15; // Konversi dari Kelvin ke Celcius
                        $deskripsi = $cuaca->weather[0]->description;
                        
                        echo "<h2 class='mt-4'>Cuaca di $kota:</h2>";
                        echo "<p>Suhu: " . number_format($suhu, 2) . "°C</p>";
                        echo "<p>Deskripsi: $deskripsi</p>";
                    } else {
                        echo "<p class='mt-4'>Data cuaca tidak ditemukan untuk kota $kota.</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- link Bootstrap JavaScript (jika diperlukan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
