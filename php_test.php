<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .table-container {
            max-width: 800px;
            width: 100%;
            border-collapse: collapse;
            overflow-x: auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="table-container">
        <h2>Struktur Organisasi</h2>
        <table>
            <thead>
                <tr>
                    <th>Jabatan</th>
                    <th>Nama</th>
                    <th>Tanggung Jawab</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Direktur Utama</td>
                    <td>Ahmad Fajar</td>
                    <td>Memimpin dan mengawasi seluruh kegiatan perusahaan</td>
                </tr>
                <tr>
                    <td>Manajer Keuangan</td>
                    <td>Indah Sari</td>
                    <td>Mengelola keuangan perusahaan dan anggaran</td>
                </tr>
                <tr>
                    <td>Manajer Operasional</td>
                    <td>Rudi Hartono</td>
                    <td>Mengawasi operasional sehari-hari dan kinerja tim</td>
                </tr>
                <tr>
                    <td>Manajer Pemasaran</td>
                    <td>Lisa Marlina</td>
                    <td>Merencanakan strategi pemasaran dan promosi</td>
                </tr>
                <tr>
                    <td>Supervisor Produksi</td>
                    <td>Budi Santoso</td>
                    <td>Mengawasi proses produksi dan kontrol kualitas</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>