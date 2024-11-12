<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Location</title>
</head>

<body>
    <h1>Data Lokasi Pengguna</h1>
    <button onclick="getLocation()">Dapatkan Lokasi</button>
    <p id="location"></p>

    <script>
        function getLocation() {
            // Periksa apakah browser mendukung Geolocation API
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                document.getElementById("location").innerHTML = "Geolocation tidak didukung oleh browser ini.";
            }
        }

        function showPosition(position) {
            // Menampilkan koordinat lokasi
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;
            document.getElementById("location").innerHTML =
                "Latitude: " + latitude +
                "<br>Longitude: " + longitude;

            // Menentukan titik pusat dan radius
            const centerLat = -6.300539428759076; // Contoh: Latitude pusat wilayah (misalnya, Monas Jakarta)
            const centerLng = 110.77918036649042; // Contoh: Longitude pusat wilayah
            const radius = 1; // Radius dalam kilometer

            // Fungsi untuk menghitung jarak antara dua titik koordinat (menggunakan rumus haversine)
            function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
                const R = 6371; // Radius bumi dalam kilometer
                const dLat = (lat2 - lat1) * Math.PI / 180;
                const dLon = (lon2 - lon1) * Math.PI / 180;
                const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2);
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                return R * c; // Jarak dalam kilometer
            }

            // Menghitung jarak dari pusat
            const distanceFromCenter = getDistanceFromLatLonInKm(latitude, longitude, centerLat, centerLng);

            // Periksa apakah pengguna berada dalam radius yang ditentukan
            if (distanceFromCenter <= radius) {
                document.getElementById("location").innerHTML += "<br>Pengguna berada di dalam radius yang ditentukan.";
            } else {
                document.getElementById("location").innerHTML += "<br>Pengguna berada di luar radius yang ditentukan.";
            }
        }


        function showError(error) {
            // Menangani error saat mengambil lokasi
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    document.getElementById("location").innerHTML = "Pengguna menolak permintaan lokasi.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    document.getElementById("location").innerHTML = "Informasi lokasi tidak tersedia.";
                    break;
                case error.TIMEOUT:
                    document.getElementById("location").innerHTML = "Permintaan lokasi timeout.";
                    break;
                case error.UNKNOWN_ERROR:
                    document.getElementById("location").innerHTML = "Terjadi kesalahan yang tidak diketahui.";
                    break;
            }
        }
    </script>
</body>

</html>