             <?php
                                // Fetch the genre data from the database
             $host = 'localhost';
             $dbName = 'movies';
             $dbusername = 'root';
             $dbpassword = '';

             try {
                                    // Connect to the database
                $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbusername, $dbpassword);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    // Prepare the SQL statement to fetch genre data
                $stmt = $pdo->prepare("SELECT * FROM tbl_movie_genre");
                $stmt->execute();
                $genres = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    // Display the genre data in the table rows
                foreach ($genres as $genre) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $genre['id'] . "</th>";
                    echo "<td>" . $genre['genreType'] . "</td>";
                    echo "<td>
                    <button class='btn btn-primary btn-sm' onclick='editGenre(" . $genre['id'] . ", \"" . $genre['genreType'] . "\")'>Edit</button>
                    <button class='btn btn-danger btn-sm' onclick='deleteGenre(" . $genre['id'] . ")'>Delete</button>
                    </td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                                    // Handle any database errors
                echo "Error: " . $e->getMessage();
            }
        ?>