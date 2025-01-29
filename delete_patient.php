<?php
include 'db.php';

$id = $_GET['id'];

// Konfirmasi penghapusan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm'])) {
        $conn->query("DELETE FROM patients WHERE id_patient = $id");
        header("Location: patient.php");
    } else {
        header("Location: patient.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://img.freepik.com/free-photo/pediatric-hospital-radiology-specialist-talking-about-x-ray-scan-results-sick-little-girl-healthcare-clinic-radiologist-analyzing-radiography-scan-results-talking-with-mother-about-treatment_482257-39661.jpg?t=st=1736493986~exp=1736497586~hmac=4e9d20c65ade2869e027012db0d9eb88429b7e47259f7555d1d91a5191b5bbd2&w=740'); /* Replace with the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #d90429;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-confirm {
            background-color: #2a9d8f;
            color: #fff;
        }

        .btn-cancel {
            background-color: #e63946;
            color: #fff;
        }

        button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hapus Pasien</h1>
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <p>Apakah Anda yakin ingin menghapus pasien ini? Tindakan ini tidak dapat dibatalkan.</p>
        <form method="post">
            <button type="submit" name="confirm" class="btn-confirm">Ya, Hapus</button>
            <button type="submit" name="cancel" class="btn-cancel">Batal</button>
        </form>
    </div>
</body>
</html>
