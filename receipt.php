<?php
// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manajemen_dokter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Get appointment ID from URL
$id_appointment = isset($_GET['id_appointment']) ? (int)$_GET['id_appointment'] : 2;

// Query to fetch receipt data
$query = "
    SELECT 
        a.id_appointment,
        d.nama_dokter AS doctor_name,
        p.nama_pasien AS patient_name,
        a.tanggal_janji
    FROM 
        appointments a
    JOIN 
        doctors d ON a.id_doctor = d.id_doctor
    JOIN 
        patients p ON a.id_patient = p.id_patient
    WHERE 
        a.id_appointment = $id_appointment
";

$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $receipt = $result->fetch_assoc();
} else {
    echo "Resi tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resi Janji Temu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://img.freepik.com/free-photo/doctors-looking-x-ray-hallway_23-2147763767.jpg?t=st=1736498550~exp=1736502150~hmac=2a61237d2fc53368e1a601ccfa9b63f76f17f17728eff87defc0d06c1bae285e&w=740') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9); /* Transparansi background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .details {
            margin: 20px 0;
        }
        .details p {
            margin: 10px 0;
            font-size: 16px;
        }
        .button {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }
        .button a {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }
        .button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resi Janji Temu</h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <div class="details">
            <p><strong>ID Resi:</strong> <?= htmlspecialchars($receipt['id_appointment']) ?></p>
            <p><strong>Nama Dokter:</strong> <?= htmlspecialchars($receipt['doctor_name']) ?></p>
            <p><strong>Nama Pasien:</strong> <?= htmlspecialchars($receipt['patient_name']) ?></p>
            <p><strong>Waktu Janji:</strong> <?= htmlspecialchars($receipt['tanggal_janji']) ?></p>
        </div>
        <div class="button">
            <a href="appoiments.php">Kembali</a>
            <a href="generate_receipt.php?id_appointment=<?= $receipt['id_appointment'] ?>" target="_blank">
        Unduh Resi
        </div>
    </div>
</body>
</html>
