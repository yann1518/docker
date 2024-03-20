<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="assets/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Interactif des Mondes de Science-Fiction</title>
</head>
<body>
    <header>
        <h1>Guide Interactif des Mondes de Science-Fiction</h1>
    </header>
    <main>
        <section>
            <h2>Univers de Science-Fiction</h2>
            <div class="worlds">
                <?php
                // Connexion à la base de données
                $host = 'localhost';
                $username = 'root';
                $password = 'root';
                $dbname = 'creation-web';

                $conn = new mysqli($host, $username, $password, $dbname);

                // Vérifier la connexion
                if ($conn->connect_error) {
                    die("La connexion a échoué : " . $conn->connect_error);
                }

                // Requête pour récupérer les mondes de science-fiction et leurs images
                $sql = "SELECT world_name, image_path FROM worlds";
                $result = $conn->query($sql);

                // Afficher les mondes de science-fiction
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $world_name = $row["world_name"];
                        $image_path = $row["image_path"];
                        echo "<a href='world.php?world=" . urlencode($world_name) . "'>";
                        echo "<img src='$image_path' alt='$world_name'>";
                        echo "<span>$world_name</span>";
                        echo "</a>";
                    }
                } else {
                    echo "Aucun résultat trouvé";
                }

                // Fermer la connexion à la base de données
                $conn->close();
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Guide Interactif des Mondes de Science-Fiction</p>
    </footer>
</body>
</html>

