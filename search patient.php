<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manajemen_dokter";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data pencarian
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Query untuk mencari data pasien
$query = "
    SELECT 
        p.nama_pasien, 
        p.usia, 
        p.keluhan, 
        d.nama_dokter, 
        r.nama_obat
    FROM patients p
    LEFT JOIN appointments a ON p.id_patient = a.id_patient
    LEFT JOIN doctors d ON a.id_doctor = d.id_doctor
    LEFT JOIN prescriptions r ON a.id_appointment = r.id_appointment
    WHERE p.nama_pasien LIKE '%$search%'
";

$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: url('https://img.freepik.com/free-photo/asian-medical-doctor-take-care-explain-senior-elderly-woman-female-patient-wheelchair-with-tablet-looking-camera_554837-54.jpg?t=st=1736498824~exp=1736502424~hmac=54f34aeaf3deb0b439f964b16f0646f57136f9f7a54a215d8474d09fab50f7c7&w=740') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cari Data Pasien</h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Cari nama pasien..." required>
            <button type="submit">Cari</button>
        </form>

        <?php if ($search && $result && $result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nama Pasien</th>
                        <th>Usia</th>
                        <th>Keluhan</th>
                        <th>Nama Dokter</th>
                        <th>Resep Obat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['nama_pasien']) ?></td>
                            <td><?= htmlspecialchars($row['usia']) ?></td>
                            <td><?= htmlspecialchars($row['keluhan']) ?></td>
                            <td><?= htmlspecialchars($row['nama_dokter']) ?></td>
                            <td><?= htmlspecialchars($row['nama_obat']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php elseif ($search): ?>
            <p>Data pasien dengan nama "<?= htmlspecialchars($search) ?>" tidak ditemukan.</p>
        <?php endif; ?>
    </div>
</body>
</html>
