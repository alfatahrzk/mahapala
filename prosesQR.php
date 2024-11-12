<?php
// Mengambil data JSON yang dikirim dari JavaScript
$data = json_decode(file_get_contents("php://input"), true);

// Cek apakah data berhasil diterima
if ($data) {
    // Ambil decodedText dan decodedResult
    $decodedText = $data['decodedText'];
    $decodedResult = json_encode($data['decodedResult']); // Encode untuk disimpan sebagai JSON

    // Menyimpan log ke dalam file atau database
    $log = $decodedText . "\n";
    file_put_contents("log_qr.txt", $log, FILE_APPEND);

    echo "Log saved successfully!";
} else {
    echo "No data received!";
}
