<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $adminLevel = 0; 

    
    $sql = "INSERT INTO korisnik (ime, prezime, username, password, razina) 
            VALUES ('$name', '$surname', '$username', '$password', '$adminLevel')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit;
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelist</title>
</head>
<body>
    <div class="wrapper">
            <header>
                <div class="logo"><img src="pictures/header_image.jpg" alt="Slika aviona na nebu."></div>
                <h1>Travelist</h1>
                
                <nav>
                    <ul class="nav-list">
                        <li id="line-top"><a href="index.php">Home</a></li>
                        <li><a href="hrvatska.php"><span>Hrvatska</span></a></li>
                        <li><a href="inozemstvo.php">Inozemstvo</a></li>
                        <li><a href="unos.html">Unos</a></li>
                        <li><a href="administracija.php">Administracija</a></li>
                        <li><a href="registracija.php">Registracija</a></li>
                        <li><a href="login.php">Prijava</a></li>
                    </ul>
                </nav>
            </header>

            <main>
                <div class="registration-form" style="text-align:center; padding-top: 100px;">
                    <h2>Registracija</h2>
                    <form method="POST" action="">
                        <div class="form-field" style="padding: 10px 0;">
                            <label for="name">Ime:</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-field" style="padding: 10px 0;">
                            <label for="surname">Prezime:</label>
                            <input type="text" name="surname" required>
                        </div>
                        <div class="form-field" style="padding: 10px 0;">
                            <label for="username">Korisničo ime:</label>
                            <input type="text" name="username" required>
                        </div>
                        <div class="form-field" style="padding: 10px 0;">
                            <label for="password">Lozinka:</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="form-field" style="padding: 10px 0;">
                            <input type="submit" style="padding:2px 10px; margin:20px 0;" value="Registrirajte se">
                        </div>
                    </form>
                    <p>Već imate račun? <a href="login.php"><button id="prijava_button" style="padding:2px 10px; margin:20px 0;">Prijava</button></a></p>
                </div>

            </main>
    </div>

    
</body>
</html>
