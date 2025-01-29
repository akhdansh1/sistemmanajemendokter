<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('https://plus.unsplash.com/premium_photo-1681843129112-f7d11a2f17e3?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
        }

        .nav-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .nav-links a {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: bold;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .nav-links a:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
            background-color: #0056b3;
        }

        .nav-links a i {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .logout {
            display: block;
            margin-top: 20px;
            padding: 15px;
            text-align: center;
            background-color: #ff4d4d;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .logout:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
            background-color: #cc0000;
        }

        .welcome {
            text-align: center;
            margin-bottom: 20px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
        }

        .footer a {
            margin: 0 10px;
            color: #007bff;
            font-size: 24px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome">
            <h1>Selamat Datang, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        </div>

        <div class="nav-links">
            <?php if ($_SESSION['role'] == 'admin'): ?>
                <a href="doctors.php"><i class="fas fa-user-md"></i> Manajemen Dokter</a>
                <a href="patient.php"><i class="fas fa-user-injured"></i> Manajemen Pasien</a>
                <a href="appoiments.php"><i class="fas fa-calendar-alt"></i> Janji Temu</a>
                <a href="prescriptions.php"><i class="fas fa-pills"></i> Resep Obat</a>
                <a href="receipt.php"><i class="fas fa-receipt"></i> Resi Janji Temu</a>
                <a href="search patient.php"><i class="fas fa-search"></i> Pencarian Pasien</a>
            <?php elseif ($_SESSION['role'] == 'doctor'): ?>
                <a href="appoiments.php"><i class="fas fa-calendar-alt"></i> Janji Temu Saya</a>
                <a href="receipt.php"><i class="fas fa-receipt"></i> Resi Janji Temu</a>
            <?php endif; ?>
        </div>

        <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>

        <div class="footer">
            <a href="https://www.instagram.com/akhdansh_?igsh=NDA4bGpvZWpyY2Y2" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/akhdan-shalahudin-12232b271/" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com/akhdansh1" target="_blank"><i class="fab fa-github"></i></a>
        </div>
    </div>
</body>
</html>
