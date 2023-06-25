<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $articleId = $_GET['id'];

    $sql = "DELETE FROM unos WHERE id = $articleId";
    if ($conn->query($sql) === TRUE) {
        header("Location: administracija.php");
        exit();
    } else {
        echo "Greška: " . $conn->error;
    }
} else {
    echo "Greška.";
}

$conn->close();
?>
