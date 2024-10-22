<?php
            $conn = new mysqli("localhost", "root", "", "plateforme_educative");
            if ($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }

            $sql = "SELECT id, cours, titre, fichier FROM devoirs";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li><a href='uploads/" . $row["fichier"] . "' download>" . $row["titre"] . " - " . $row["cours"] . "</a></li>";
                }
            } else {
                echo "Aucun devoir soumis.";
            }

            $conn->close();
            ?>