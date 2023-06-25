<?php
$servername = "localhost";
$username = "iarnaut";
$password = "babamanda9";
$dbname = "projekt_arnaut";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naslov = $_POST["naslov"];
    $sazetak = $_POST["kratki"];
    $sadrzaj = $_POST["sadrzaj"];
    $slika = $_FILES["slika"]["name"]; 
    $kategorija = $_POST["kategorija"];
    $arhiva = isset($_POST["arhiva"]) ? 1 : 0; 

    
    $sql = "INSERT INTO unos (naslov, sazetak, sadrzaj, slika, kategorija, arhiva) 
            VALUES ('$naslov', '$sazetak', '$sadrzaj', '$slika', '$kategorija', $arhiva)";

    if ($conn->query($sql) === true) {
        
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["slika"]["name"]);
        move_uploaded_file($_FILES["slika"]["tmp_name"], $targetFile);

    } 
}

$conn->close();
?>
