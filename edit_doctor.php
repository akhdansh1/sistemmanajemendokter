<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM doctors WHERE id_doctor = $id");
$doctor = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $id_specialization = $_POST['id_specialization'];
    $kontak = $_POST['kontak'];

    $sql = "UPDATE doctors SET 
            nama_dokter = '$nama', 
            id_specialization = $id_specialization, 
            kontak = '$kontak' 
            WHERE id_doctor = $id";
    if ($conn->query($sql)) {
        header("Location: doctors.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$specializations = $conn->query("SELECT * FROM specializations");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://img.freepik.com/premium-photo/profession-people-health-care-reanimation-medicine-concept-group-medics-doctors-carrying-unconscious-woman-patient-hospital-gurney-emergency_380164-181339.jpg?w=740'); /* Replace 'your-image.jpg' with the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.85); /* Add transparency to blend with the background image */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"], select {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            background-color: #4caf50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4caf50;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Dokter</h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <form method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?= $doctor['nama_dokter'] ?>" required>

            <label for="id_specialization">Spesialisasi:</label>
            <select id="id_specialization" name="id_specialization" required>
                <?php while ($row = $specializations->fetch_assoc()): ?>
                    <option value="<?= $row['id_specialization'] ?>" 
                        <?= $row['id_specialization'] == $doctor['id_specialization'] ? 'selected' : '' ?>>
                        <?= $row['nama_spesialisasi'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="kontak">Kontak:</label>
            <input type="text" id="kontak" name="kontak" value="<?= $doctor['kontak'] ?>" required>

            <button type="submit">Simpan</button>
        </form>
        <a href="doctors.php" class="back-link">Kembali ke Daftar Dokter</a>
    </div>
</body>
</html>
