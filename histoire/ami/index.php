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
            <div class="zones histoire">
                <?php
                        // $userId = $_SESSION['user_id']; 

                        require_once '../../assets/config/database.php';
                        $db = connectDB("localhost", "history", "root", "");
                    
                        // $sql = "SELECT * FROM utilisateurs WHERE id_user = '$userId' ";
                        $sql = "SELECT * FROM histoires";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();

                        $liste_histoire = [];

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $liste_histoire[] = $row;
                        }

                        if ($liste_histoire != null) {
                            foreach ($liste_histoire as $histoire) {
                                echo "<div class='zone'>";
                                echo "<p>" . $histoire['libelle_histoire'] . "</p>";
                                echo "</div>";
                            }        
                        } else {
                            echo "<div class='zone'>";
                            echo "<p>Il n'y a pas d'histoire</p>";
                            echo "</div>"; 
                        }
                                       
                    
                ?>
            </div>
        </div>
    </section>

    <!-- <section>
        <div class="article">
            <div class="zones histoire">
                <div class="zone">
                    <h2>123</h2>
                    <p>123456789</p>
                </div>
                <div class="zone">
                    <h2>123</h2>
                    <p>123456789</p>
                </div>
                <div class="zone">
                    <h2>123</h2>
                    <p>123456789</p>
                </div>
                <div class="zone">
                    <h2>123</h2>
                    <p>123456789</p>
                </div>
                <div class="zone">
                    <h2>123</h2>
                    <p>123456789</p>
                </div>
                <div class="zone">
                    <h2>123</h2>
                    <p>123456789</p>
                </div>
                <div class="zone">
                    <h2>123</h2>
                    <p>123456789</p>
                </div>
                <div class="zone">
                    <h2>123</h2>
                    <p>123456789</p>
                </div>
            </div>
        </div>
    </section> -->
</body>
</html>