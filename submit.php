<?php
// Load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Pastikan PHPMailer terinstal
require 'vendor/autoload.php'; // Jika menggunakan Composer
// Atau jika tidak menggunakan Composer:
// require 'src/PHPMailer.php';
// require 'src/SMTP.php';
// require 'src/Exception.php';

// Buat objek PHPMailer
$mail = new PHPMailer(true);

try {
    // Pengaturan SMTP untuk mengirim email
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Ganti dengan host SMTP yang kamu gunakan
    $mail->SMTPAuth = true;
    $mail->Username = 'theavid555@gmailcom'; // Ganti dengan email pengirim
    $mail->Password = 'theavid555@gmail.com'; // Ganti dengan password email pengirim
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Alamat pengirim dan penerima
    $mail->setFrom('davidpanjaitanspotify@gmail.com', 'David'); // Email pengirim
    $mail->addAddress('davidpanjaitanspotify@gmail.com', 'David'); // Email penerima

    // Subjek email
    $mail->Subject = 'Jawaban Kuis Interaktif';

    // Ambil jawaban dari form
    $message = "Jawaban Kuis Interaktif:\n\n";
    $message .= "1. Di Medan pada tanggal 26 sampai 30: " . $_POST['q1'] . "\n";
    $message .= "2. Jalan-jalan di Medan: " . $_POST['q2'] . "\n";
    $message .= "3. Rencana kegiatan: " . $_POST['q3'] . "\n";
    $message .= "4. Makanan: " . $_POST['q4'] . "\n";
    $message .= "5. Film yang akan ditonton: " . $_POST['q5'] . "\n";
    $message .= "6. Apakah sayang? " . $_POST['q6'] . "\n";
    $message .= "7. Ucapan Natal: " . $_POST['q7'] . "\n";
    $message .= "8. Suka hadiah kemarin: " . $_POST['q8'] . "\n";

    // Mengirimkan email dalam format HTML
    $mail->isHTML(true);
    $mail->Body = nl2br($message);  // Format HTML
    $mail->AltBody = $message;     // Format teks biasa

    // Kirim email
    $mail->send();
    echo 'Jawaban kuis berhasil dikirim!';
} catch (Exception $e) {
    echo "G
