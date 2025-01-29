<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_doctor = $_POST['id_doctor'];
    $id_patient = $_POST['id_patient'];
    $tanggal_janji = $_POST['tanggal_janji'];

    $sql = "INSERT INTO appointments (id_doctor, id_patient, tanggal_janji) 
            VALUES ($id_doctor, $id_patient, '$tanggal_janji')";
    if ($conn->query($sql)) {
        header("Location: appoiments.php");
        exit;
    } else {
        echo "<p>Error: " . htmlspecialchars($conn->error) . "</p>";
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
    <title>Tambah Janji Temu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('https://img.freepik.com/premium-photo/navigating-crisis-insights-from-covid19-intensive-care-unit_954894-103019.jpg?w=740'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.9); /* Transparansi */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select, input[type="datetime-local"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Janji Temu</h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <form method="post">
            <label for="id_doctor">Dokter:</label>
            <select name="id_doctor" id="id_doctor" required>
                <option value="">-- Pilih Dokter --</option>
                <?php while ($row = $doctors->fetch_assoc()): ?>
                    <option value="<?= htmlspecialchars($row['id_doctor']) ?>">
                        <?= htmlspecialchars($row['nama_dokter']) ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="id_patient">Pasien:</label>
            <select name="id_patient" id="id_patient" required>
                <option value="">-- Pilih Pasien --</option>
                <?php while ($row = $patients->fetch_assoc()): ?>
                    <option value="<?= htmlspecialchars($row['id_patient']) ?>">
                        <?= htmlspecialchars($row['nama_pasien']) ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="tanggal_janji">Tanggal Janji:</label>
            <input type="datetime-local" name="tanggal_janji" id="tanggal_janji" required>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
