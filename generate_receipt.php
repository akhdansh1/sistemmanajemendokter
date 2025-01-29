<?php
// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manajemen_dokter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Get appointment ID from URL
$id_appointment = isset($_GET['id_appointment']) ? (int)$_GET['id_appointment'] : 2;

// Query to fetch receipt data
$query = "
    SELECT 
        a.id_appointment,
        d.nama_dokter AS doctor_name,
        p.nama_pasien AS patient_name,
        a.tanggal_janji
    FROM 
        appointments a
    JOIN 
        doctors d ON a.id_doctor = d.id_doctor
    JOIN 
        patients p ON a.id_patient = p.id_patient
    WHERE 
        a.id_appointment = $id_appointment
";

$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $receipt = $result->fetch_assoc();
} else {
    die("Resi tidak ditemukan!");
}

// Create image
$image_width = 500;
$image_height = 300;
$image = imagecreate($image_width, $image_height);

// Colors
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$blue = imagecolorallocate($image, 0, 123, 255);

// Fill background
imagefilledrectangle($image, 0, 0, $image_width, $image_height, $white);

// Add text
$font_size = 5; // Font size for text
$line_height = 20; // Space between lines

$text_x = 20;
$text_y = 20;

imagestring($image, $font_size, $text_x, $text_y, "Resi Janji Temu", $blue);
$text_y += $line_height;

imagestring($image, $font_size, $text_x, $text_y, "ID Resi: " . $receipt['id_appointment'], $black);
$text_y += $line_height;

imagestring($image, $font_size, $text_x, $text_y, "Nama Dokter: " . $receipt['doctor_name'], $black);
$text_y += $line_height;

imagestring($image, $font_size, $text_x, $text_y, "Nama Pasien: " . $receipt['patient_name'], $black);
$text_y += $line_height;

imagestring($image, $font_size, $text_x, $text_y, "Waktu Janji: " . $receipt['tanggal_janji'], $black);

// Set header for image download
header('Content-Type: image/png');
header('Content-Disposition: attachment; filename="resi_appointment.png"');

// Output image
imagepng($image);
imagedestroy($image);
?>
