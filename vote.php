<?php
require_once("connect.php");

// Add a CSS link for styling
echo "<!DOCTYPE html>
<html lang='tr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link type='text/css' rel='stylesheet' href='settings/style.css'>
    <title>Vote</title>
</head>
<body>";

if (isset($_POST["answer"])) {
    $incomingReply = filter($_POST["answer"]);
    
    // Check if the IP address has voted in the past 24 hours
    $ControlQuery = $databaseConnection->prepare("SELECT * FROM thosevoted WHERE ipaddress = ? AND history >= ? ");
    $ControlQuery->execute([$IPAddress, $turnBackTime]);
    $numberOfControls = $ControlQuery->rowCount();
    
    if ($numberOfControls > 0) {
        echo "<div class='center-text'>HATA<br />Daha önce oy kullanmışsınız. Lütfen en az 24 saat sonra tekrar deneyiniz.<br /><a href='index.php'>Anasayfaya dönmek için tıklayınız.</a></div>";
    } else {
        if ($incomingReply == 1) {
            $update = $databaseConnection->prepare("UPDATE survey SET votecountone = votecountone + 1, totalvotes = totalvotes + 1");
            $update->execute();
        } elseif ($incomingReply == 2) {
            $update = $databaseConnection->prepare("UPDATE survey SET votecounttwo = votecounttwo + 1, totalvotes = totalvotes + 1");
            $update->execute();
        } elseif ($incomingReply == 3) {
            $update = $databaseConnection->prepare("UPDATE survey SET votecountthree = votecountthree + 1, totalvotes = totalvotes + 1");
            $update->execute();
        } else {
            echo "<div class='center-text'>HATA<br />Cevap Kaydı Bulunamıyor.<br /><a href='index.php'>Anasayfaya dönmek için tıklayınız.</a></div>";
            exit;
        }
        
        $add = $databaseConnection->prepare("INSERT INTO thosevoted (ipaddress, history) VALUES (?, ?)");
        $add->execute([$IPAddress, $timeStamp]);
        $addControl = $add->rowCount();
        
        if ($addControl > 0) {
            echo "<div class='center-text'>Teşekkürler<br />Vermiş olduğunuz oy sisteme kayıt olmuştur.<br /><a href='index.php'>Anasayfaya dönmek için tıklayınız.</a></div>";
        } else {
            echo "<div class='center-text'>HATA<br />İşlem sırasında beklenmeyen bir hata oluştu lütfen daha sonra tekrar deneyiniz.<br /><a href='index.php'>Anasayfaya dönmek için tıklayınız.</a></div>";
        }
    }
} else {
    echo "<div class='center-text'>HATA<br />Lütfen bir cevap seçiniz.<br /><a href='index.php'>Anasayfaya dönmek için tıklayınız.</a></div>";
}

echo "</body></html>";

$databaseConnection = null;
?>
