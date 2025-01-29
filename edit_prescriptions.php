<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM prescriptions WHERE id_prescription = $id");
$prescription = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_appointment = $_POST['id_appointment'];
    $nama_obat = $_POST['nama_obat'];
    $dosis = $_POST['dosis'];

    $sql = "UPDATE prescriptions SET 
            id_appointment = $id_appointment, 
            nama_obat = '$nama_obat', 
            dosis = '$dosis' 
            WHERE id_prescription = $id";
    if ($conn->query($sql)) {
        header("Location: prescriptions.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$appointments = $conn->query("SELECT * FROM appointments");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resep Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        /* Reset dan gaya dasar */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: url('https://img.freepik.com/free-photo/doctor-protective-wear-checking-hypertension-patient-modern-private-hospital-clinic-covid-19-pandemic-health-care-check-medical-medicine-illness-examination-diagnostic_482257-6278.jpg?t=st=1736497310~exp=1736500910~hmac=53b433e8f427087f72faec6f8efa743f28dd6da114f3ccf4be5d8d222ac79fdc&w=826') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #555;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.9); /* Transparansi background */
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        form label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        form input, form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        form button {
            background-color: #2a9d8f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        form button:hover {
            background-color: #21867a;
        }
    </style>
</head>
<body>
    <h1>Edit Resep Obat</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <form method="post">
        <label for="id_appointment">Janji Temu:</label>
        <select name="id_appointment" id="id_appointment">
            <?php while ($row = $appointments->fetch_assoc()): ?>
                <option value="<?= $row['id_appointment'] ?>" 
                    <?= $row['id_appointment'] == $prescription['id_appointment'] ? 'selected' : '' ?>
                >
                    <?= $row['tanggal_janji'] ?> - <?= $row['id_patient'] ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="nama_obat">Nama Obat:</label>
        <input type="text" name="nama_obat" id="nama_obat" value="<?= $prescription['nama_obat'] ?>">

        <label for="dosis">Dosis:</label>
        <input type="text" name="dosis" id="dosis" value="<?= $prescription['dosis'] ?>">

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
