<?php
include 'db.php';

$result = $conn->query("SELECT a.*, d.nama_dokter, p.nama_pasien 
    FROM appointments a 
    JOIN doctors d ON a.id_doctor = d.id_doctor 
    JOIN patients p ON a.id_patient = p.id_patient");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Janji Temu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('https://img.freepik.com/free-photo/group-healthcare-workers-with-protective-workwear-talking-while-sitting-hallway-medical-clinic_637285-11198.jpg?t=st=1736494144~exp=1736497744~hmac=ad81b8420291fad8945226b762e2504f4499494ab1fbda53ab525d4dd25c1374&w=740');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: inline-block;
        }

        a:hover {
            background-color: #0056b3;
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
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .action-links a {
            margin-right: 10px;
            color: #007bff;
        }

        .action-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Janji Temu</h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script></table>
        <a href="add_appoiments.php">Tambah Janji Temu</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Dokter</th>
                <th>Pasien</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id_appointment']) ?></td>
                    <td><?= htmlspecialchars($row['nama_dokter']) ?></td>
                    <td><?= htmlspecialchars($row['nama_pasien']) ?></td>
                    <td><?= htmlspecialchars($row['tanggal_janji']) ?></td>
                    <td class="action-links">
                        <a href="edit_appoiments.php?id=<?= $row['id_appointment'] ?>">Edit</a>
                        <a href="delete_appoiments.php?id=<?= $row['id_appointment'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
