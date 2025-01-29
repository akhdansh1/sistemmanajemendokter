<?php
include 'db.php';

$result = $conn->query("SELECT p.*, a.tanggal_janji, d.nama_dokter, pat.nama_pasien FROM prescriptions p JOIN appointments a ON p.id_appointment = a.id_appointment JOIN doctors d ON a.id_doctor = d.id_doctor JOIN patients pat ON a.id_patient = pat.id_patient");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('https://img.freepik.com/free-photo/child-mother-doctor-appointment-global-pandemic-with-coronavirus_482257-8103.jpg?t=st=1736495456~exp=1736499056~hmac=dfce05a823972b9c95e8fb6d36c576677ed746a357679b4761a83dfe0f0ceeb6&w=740') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9); /* Transparansi background */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        a {
            color: #2a9d8f;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #21867a;
        }

        .add-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #2a9d8f;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .add-button:hover {
            background-color: #21867a;
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
            text-align: center;
        }

        th {
            background-color: #2a9d8f;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .action-links a {
            margin: 0 5px;
            padding: 5px 10px;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }

        .edit-link {
            background-color: #ffc107;
        }

        .edit-link:hover {
            background-color: #e0a800;
        }

        .delete-link {
            background-color: #dc3545;
        }

        .delete-link:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h1>Resep Obat</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <div class="container">
        <a href="add_prescriptons.php" class="add-button">Tambah Resep</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Dokter</th>
                <th>Pasien</th>
                <th>Tanggal Janji</th>
                <th>Obat</th>
                <th>Dosis</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_prescription'] ?></td>
                    <td><?= $row['nama_dokter'] ?></td>
                    <td><?= $row['nama_pasien'] ?></td>
                    <td><?= $row['tanggal_janji'] ?></td>
                    <td><?= $row['nama_obat'] ?></td>
                    <td><?= $row['dosis'] ?></td>
                    <td class="action-links">
                        <a href="edit_prescriptions.php?id=<?= $row['id_prescription'] ?>" class="edit-link">Edit</a>
                        <a href="delete_prescriptions.php?id=<?= $row['id_prescription'] ?>" class="delete-link">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
