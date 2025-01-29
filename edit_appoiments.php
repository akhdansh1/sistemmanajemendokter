<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM appointments WHERE id_appointment = $id");
$appointment = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_doctor = $_POST['id_doctor'];
    $id_patient = $_POST['id_patient'];
    $tanggal_janji = $_POST['tanggal_janji'];

    $sql = "UPDATE appointments SET 
            id_doctor = $id_doctor, 
            id_patient = $id_patient, 
            tanggal_janji = '$tanggal_janji' 
            WHERE id_appointment = $id";
    if ($conn->query($sql)) {
        header("Location: appoiments.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$doctors = $conn->query("SELECT * FROM doctors");
$patients = $conn->query("SELECT * FROM patients");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Janji Temu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://img.freepik.com/premium-photo/modern-medical-beds-injured-hospital-resuscitation-chamber-coronavirus-virus-concept-covid-19-identification-pandemic_116317-4865.jpg?w=740'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9); /* Transparansi */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #555;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        select, input[type="datetime-local"], button {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #2a9d8f;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #21867a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Janji Temu</h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <form method="post">
            <label for="id_doctor">Dokter:</label>
            <select name="id_doctor" id="id_doctor">
                <?php while ($row = $doctors->fetch_assoc()): ?>
                    <option value="<?= $row['id_doctor'] ?>" 
                        <?= $row['id_doctor'] == $appointment['id_doctor'] ? 'selected' : '' ?>>
                        <?= $row['nama_dokter'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="id_patient">Pasien:</label>
            <select name="id_patient" id="id_patient">
                <?php while ($row = $patients->fetch_assoc()): ?>
                    <option value="<?= $row['id_patient'] ?>" 
                        <?= $row['id_patient'] == $appointment['id_patient'] ? 'selected' : '' ?>>
                        <?= $row['nama_pasien'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="tanggal_janji">Tanggal Janji:</label>
            <input type="datetime-local" name="tanggal_janji" id="tanggal_janji" value="<?= $appointment['tanggal_janji'] ?>">

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
