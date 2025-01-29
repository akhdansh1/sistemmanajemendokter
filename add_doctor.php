<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $id_specialization = $_POST['id_specialization'];
    $kontak = $_POST['kontak'];

    $sql = "INSERT INTO doctors (nama_dokter, id_specialization, kontak) 
            VALUES ('$nama', $id_specialization, '$kontak')";
    if ($conn->query($sql)) {
        header("Location: doctors.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM specializations");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://img.freepik.com/premium-photo/male-female-doctors-consulting-bright-office_28914-540.jpg?w=740'); /* Replace 'your-image.jpg' with the path to your image */
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
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, select, button, textarea {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
            font-size: 0.9em;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Dokter</h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <form method="post">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" required>

            <label for="id_specialization">Spesialisasi</label>
            <select name="id_specialization" id="id_specialization" required>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <option value="<?= $row['id_specialization'] ?>"><?= $row['nama_spesialisasi'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="kontak">Kontak</label>
            <input type="text" name="kontak" id="kontak" required>

            <button type="submit">Simpan</button>
        </form>
        <a class="back-link" href="doctors.php">Kembali ke Daftar Dokter</a>
    </div>
</body>
</html>
