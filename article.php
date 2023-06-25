<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $articleId = $_GET['id'];

    $sql = "SELECT * FROM unos WHERE id = $articleId";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row === null) {
        echo "Članak nije pronađen.";
        exit;
    }
} else {
    echo "Id članka nije pronađen.";
    exit;
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

        <main style='padding-top:30px;'>
            <h2><?php echo $row['naslov']; ?></h2>
            <h3 style="padding: 5px 0;"><?php echo $row['sazetak']; ?></h3>
            <img src="uploads/<?php echo $row['slika']; ?>" alt="">
            <p style="margin-top: 20px"><?php echo $row['sadrzaj']; ?></p>
            
            <a href="administration.php">Back to Administration</a>
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
</body>
</html>
