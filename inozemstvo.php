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
            
            <div class="section-naslov"><h2>Inozemstvo &#8669;</h2></div>

            <!--
            <section class="drugi">
                <article>
                    <a href="bled.html">
                    <figure><img src="pictures/Bled1.jpg" alt="Slika jezera Bled"></figure>
                    <h3>Bled, Slovenija</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
                    </a>
                </article>
            
                <article>
                    <a href="schladming.html">
                    <figure><img src="pictures/Schladming1.jpg" alt="Slika žičare Planai u Schladmingu"></figure>
                    <h3>Schladming, Austrija</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
                    </a>
                </article>
                
                <article>
                    <a href="vrango.html">
                    <figure><img src="pictures/Vrango1.jpg" alt="Slika otoka Vrångö"></figure>
                    <h3>Vrångö, Švedska</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
                    </a>
                </article>
            
            </section> -->

            <section class="prvi">
                <?php
                    $servername = "localhost";
                    $username = "iarnaut";
                    $password = "babamanda9";
                    $dbname = "projekt_arnaut";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Greška: " . $conn->connect_error);

                    }
                    
                    if(!(isset($_POST["arhiva"]))){
                        $sql = "SELECT * FROM unos WHERE kategorija = 'inozemstvo'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<article class= 'clanak'>";
                                echo '<a href="article.php?id=' . $row['id'] . '">';
                                echo "<img src='uploads/" . $row['slika'] . "' alt='Article Image'>";
                                echo "<h3>" . $row['naslov'] . "</h3>";
                                echo "<p>" . $row['sazetak'] . "</p>";
                                echo "</article>";
                                
                            }
                        }
                    }

                    $conn->close();
                ?>

                </section>
            
                
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