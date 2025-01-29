<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Jika pengguna mengkonfirmasi penghapusan
    $conn->query("DELETE FROM doctors WHERE id_doctor = $id");
    header("Location: doctors.php");
    exit;
}

$result = $conn->query("SELECT nama_dokter FROM doctors WHERE id_doctor = $id");
$doctor = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://img.freepik.com/premium-photo/doctor-helping-senior-woman-with-walker-leaving-medical-office_274689-25426.jpg?w=740'); /* Replace 'your-image.jpg' with the path to your background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9); /* Transparansi untuk menonjolkan konten */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #d9534f;
        }

        p {
            margin: 20px 0;
            font-size: 1.2em;
            color: #555;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        button, a {
            padding: 10px 15px;
            font-size: 1em;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button {
            border: none;
            color: white;
            background-color: #d9534f;
        }

        button:hover {
            background-color: #c9302c;
        }

        a {
            color: white;
            background-color: #5bc0de;
        }

        a:hover {
            background-color: #31b0d5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hapus Dokter</h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <p>Apakah Anda yakin ingin menghapus dokter bernama <strong><?= htmlspecialchars($doctor['nama_dokter']) ?></strong>?</p>
        <div class="button-container">
            <form method="post" style="display: inline;">
                <button type="submit">Hapus</button>
            </form>
            <a href="doctors.php">Batal</a>
        </div>
    </div>
</body>
</html>
