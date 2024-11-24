<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
    <?php include_once '../../inc/header.php' ?>

    <section>
        <div class="article">
            <div class="zones formulaire">
                <h2>Ajouter une histoire</h2>
                <div class="form">
                    <form action="add_history.php" method="post">
                        <input type="text" name="titre" id=""><br>
                        <textarea name="description" id=""></textarea><br>
                        <button type="submit">Ajouter une histoire</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
require_once 'config/database.php';
$db = connectDB("localhost", "moyenne_finale", "root", "");

if (condition) {
    $title = $_POST['titre'];
    $description = $_POST['description'];
    $id_type_histoire = $_POST[''];
    $date_ajout = date("Y/m/d");

    $sql = "INSERT INTO histoires VALUES ('$title', '$description', '$id_type_histoire', '$date_ajout')";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}


?>