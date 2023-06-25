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

        <main style='padding-top: 50px'>


            <?php
            session_start();

            if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
                header("Location: login.php");
                exit;
            }

            include 'connection.php';

            $sql = "SELECT * FROM unos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<section class='prvi'>";

                while ($row = $result->fetch_assoc()) {
                    echo "<article class= 'clanak'>";
                    echo '<a href="article.php?id=' . $row['id'] . '">';
                    echo "<img src='uploads/" . $row['slika'] . "' alt='Article Image'>";
                    echo "<h3>" . $row['naslov'] . "</h3>";
                    echo "<p>" . $row['sazetak'] . "</p>";
                    echo "<a href='edit_article.php?id=" . $row['id'] . "'>Izmijeni</a> | ";
                    echo "<a href='delete_article.php?id=" . $row['id'] . "'>Obriši</a>";
                    echo "</article>";
                }

                echo "</section>";
            } else {
                echo "Nema rezultata.";
            }

            $conn->close();
            ?>
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
