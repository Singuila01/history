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
                        <input type="text" name="titre" id="" placeholder="Titre"><br>
                        <textarea name="description" id="" placeholder="Description"></textarea><br>                        
                        <select name="type_de_histoire" id="">
                            <?php
                                require_once './database.php';
                                $db = connectDB("localhost", "history", "root", "");

                                $sql = "SELECT * FROM type_histoires";
                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $liste_type = [];

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $liste_type[] = $row;
                                }

                                foreach ($liste_type as $type){
                                    echo $type['libelle_type_histoire'];
                                }

                                foreach ($liste_type as $type_histoire) : 
                            ?>
                            <option value="<?= htmlspecialchars($type_histoire['id_type']) ?>"><?= htmlentities($type_histoire['libelle_type_histoire'])?></option>
                            <?php endforeach; ?>
                        </select><br>
                        <input type="submit" value="Envoyer" name="go" />
                        <?php
                            require_once 'database.php';
                            $db = connectDB("localhost", "history", "root", "");

                            if(isset($_POST['go']) AND $_POST['go']=='Envoyer') {
                                $title = $_POST['titre'];
                                $description = $_POST['description'];
                                $id_type_histoire = $_POST['type_de_histoire'];
                                $date_ajout = date("Y/m/d");

                                if ($title != null && $description != null && $id_type_histoire != null) {
                                    $sql = "INSERT INTO histoires VALUES ('$title', '$description', '$id_type_histoire', '$date_ajout')";
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();
                                } else {
                                    echo "<p>Rien n'a été saisi</p>";
                                }
                                
                            }


                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

