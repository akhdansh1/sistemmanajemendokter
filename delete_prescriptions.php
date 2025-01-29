<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn->query("DELETE FROM prescriptions WHERE id_prescription = $id");
    header("Location: prescriptions.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Resep Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        /* Reset dan gaya dasar */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0; /* Menghapus margin default */
            padding: 0;
            height: 100vh; /* Membuat elemen body mengambil seluruh tinggi layar */
            background-image: url('https://img.freepik.com/free-photo/vaccination-doctor-protective-mask-gloves-injects-vaccine-into-patient-s-hand_496169-2902.jpg?t=st=1736497407~exp=1736501007~hmac=3e26b7ca01275dfae01311508d225d4fb4f1c9c1ff1118683e30aad62f63ecfc&w=740'); /* Gambar latar belakang */
            background-size: cover; /* Gambar memenuhi layar */
            background-position: center; /* Posisikan gambar di tengah */
            background-repeat: no-repeat; /* Jangan ulangi gambar */
            display: flex; /* Flexbox untuk sentralisasi konten */
            flex-direction: column;
            justify-content: center; /* Vertikal tengah */
            align-items: center; /* Horizontal tengah */
        }

        h1 {
            color: #555;
            margin: 20px 0;
        }

        p {
            font-size: 18px;
            margin: 10px 0 30px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-confirm {
            background-color: #d9534f;
            color: white;
        }

        .btn-confirm:hover {
            background-color: #c9302c;
        }

        .btn-cancel {
            background-color: #5bc0de;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #31b0d5;
        }
    </style>
</head>
<body>
    <h1>Hapus Resep Obat</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script></div>
    <p>Apakah Anda yakin ingin menghapus resep obat ini?</p>
    <div class="button-container">
        <form method="POST">
            <button type="submit" class="btn-confirm">Hapus</button>
        </form>
        <a href="prescriptions.php" class="btn-cancel">
            <button type="button">Batal</button>
        </a>
    </div>
</body>
</html>
