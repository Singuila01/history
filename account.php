<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <?php include_once 'inc/header.php' ?>

    <section>
        <div class="article">
            <div class="zones account">
                <h1>Mon compte</h1>
                <?php
                    require_once 'connexion.php';

                    $db = connectDB('localhost', 'history', 'root', '');
                    
                    $sql = "SELECT * FROM utilisateurs";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    
                    $liste_user = [];

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $liste_user[] = $row;
                    }
                    
                    // Affichage ou utilisation des données
                    foreach ($liste_user as $user) {
                        echo "<div class='zone'>";
                        echo "<p>" . $user['nom'] . " " . $user['prenom'] . "</p>";
                        echo "<p>" . $user['mail'] . "</p>";
                        echo "<p>" . $user['date_creation'] . "</p>";
                        echo "</div>";
                    }                
                
                
                ?>
            </div>
        </div>
    </section>
</body>
</html>