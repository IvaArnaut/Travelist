<?php
include 'connection.php';

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleId = $_POST['id'];
    $naslov = $_POST['naslov'];
    $kratki = $_POST['kratki'];
    $sadrzaj = $_POST['sadrzaj'];
    $kategorija = $_POST['kategorija'];
    $arhiva = isset($_POST['arhiva']) ? 1 : 0;


    $sql = "UPDATE unos SET naslov = '$naslov', sazetak = '$kratki', sadrzaj = '$sadrzaj', kategorija = '$kategorija', arhiva = $arhiva WHERE id = $articleId";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: administracija.php");
        exit;
    } else {
        echo "Greška: " . $conn->error;
    }
}

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
    echo "Nije pronađen id članka.";
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
        <main>
            <div class="login-form" style="text-align:center; padding-top: 100px;">
                <h2>Izmijeni članak</h2>
        
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    
                    <div class="form-field" style="margin: 10px 0;">
                        <label for="naslov">Naslov članka:</label>
                        <input type="text" name="naslov" value="<?php echo $row['naslov']; ?>">
                    </div>

                    <div class="form-field" style="margin: 10px 0;">
                        <label style="display:block;" for="kratki">Kratki sažetak članka:</label>
                        <textarea name="kratki" cols="30" rows="10"><?php echo $row['sazetak']; ?></textarea>
                    </div>

                    <div class="form-field" style="margin: 10px 0;">
                        <label style="display:block;" for="sadrzaj">Sadržaj članka:</label>
                        <textarea name="sadrzaj" cols="30" rows="10"><?php echo $row['sadrzaj']; ?></textarea>
                    </div>

                    <div class="form-field" style="margin: 10px 0;">
                        <label for="kategorija">Kategorija članka:</label>
                        <select name="kategorija">
                            <option value="hrvatska" <?php if ($row['kategorija'] === 'hrvatska') echo 'selected'; ?>>Hrvatska</option>
                            <option value="inozemstvo" <?php if ($row['kategorija'] === 'inozemstvo') echo 'selected'; ?>>Inozemstvo</option>
                        </select>
                    </div>

                    <div class="form-field" style="margin: 10px 0;">
                        <label for="arhiva">Spremiti u arhivu:</label>
                        <input type="checkbox" name="arhiva" <?php if ($row['arhiva'] == 1) echo 'checked'; ?>>
                    </div>

                    <div class="form-field" style="margin: 10px 0;">
                        <button style="padding: 3px 10px;" type="submit">Spremiti izmjene</button>
                        <a href="administracija.php"><button style="padding: 3px 10px;">Vrati se</button></a>
                    </div>
                </form>
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

