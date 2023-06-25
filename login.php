<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM korisnik WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        session_start();
        $_SESSION['loggedin'] = true;
        header("Location: administracija.php");
        exit;
    } else {
        $error = "Krivo korisničko ime ili lozinka!";
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
                    <li><a href="hrvatska.php">Hrvatska</a></li>
                    <li><a href="inozemstvo.php">Inozemstvo</a></li>
                    <li><a href="unos.html">Unos</a></li>
                    <li><a href="administracija.php">Administracija</a></li>
                    <li><a href="registracija.php">Registracija</a></li>
                    <li><a href="login.php">Prijava</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <div class="login-form" style="text-align:center; padding-top: 100px;">
                <h2>Prijava</h2>
                <?php if (isset($error)) { ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php } ?>
                <form method="POST" action="">
                    <div class="form-field" style="padding: 10px 0;">
                        <label for="username">Username:</label>
                        <input type="text" name="username" required>
                    </div>
                    <div class="form-field" style="padding: 10px 0;">
                        <label for="password">Password:</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="form-field">
                        <input type="submit" value="Prijava" style="padding:2px 10px; margin:20px 0;">
                    </div>
                </form>
                <p>Nemate račun? <a href="registracija.php">Registrirajte se <span style="font-weight:bold;">ovdje.</span></a></p>
            </div>

        </main>

        <footer>
            <p>Objave na dan <span id='date-time'></span>
                | &copy; Travelist GmbH | Home </p>
        </footer>
    </div>
    
    <script>
        const date = new Date();

        let day = date.getDate();
        let month = date.getMonth() + 1;
        let year = date.getFullYear();

        let currentDate = `${day}.${month}.${year}`;
        console.log(currentDate);
        document.getElementById('date-time').innerHTML=currentDate;
    </script>
</body>
</html>
    
