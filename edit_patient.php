<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM patients WHERE id_patient = $id");
$patient = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $keluhan = $_POST['keluhan'];

    $sql = "UPDATE patients SET 
            nama_pasien = '$nama', 
            usia = $usia, 
            keluhan = '$keluhan' 
            WHERE id_patient = $id";
    if ($conn->query($sql)) {
        header("Location: patient.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://img.freepik.com/free-photo/male-patient-with-covid19-symptoms-talking-doctor-complaining-shortness-breath-hospital_637285-5096.jpg?t=st=1736493663~exp=1736497263~hmac=7094db0d3ada60683a481229623b6639d139da132579461b0a8ea016c747ea91&w=740'); /* Replace with the path to your image */
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
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
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

        input[type="text"], input[type="number"], textarea, button {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: none;
            height: 80px;
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
        <h1>Edit Pasien</h1>
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <form method="post">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?= $patient['nama_pasien'] ?>">

            <label for="usia">Usia:</label>
            <input type="number" name="usia" id="usia" value="<?= $patient['usia'] ?>">

            <label for="keluhan">Keluhan:</label>
            <textarea name="keluhan" id="keluhan"><?= $patient['keluhan'] ?></textarea>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
