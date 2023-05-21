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
                $stmt = $pdo->prepare("SELECT * FROM tbl_movie_info");
                $stmt->execute();
                $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    // Display the genre data in the table rows
                foreach ($movies as $movie) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $movie['id'] . "</th>";
                    echo "<td> <img src=". "../".$movie['img'] ."></td>";
                    echo "<td>" . $movie['title'] . "</td>";
                    echo "<td>" . $movie['cast'] . "</td>";
                    echo "<td>
                    <button class='btn btn-warning btn-sm' onclick='viewMovie(" . $movie['id'] . ")'>View</button>
                    <button class='btn btn-primary btn-sm' onclick='editMovie(" . $movie['id'] . ", \"" . $movie['title'] . "\")'>Edit</button>
                    <button class='btn btn-danger btn-sm' onclick='deleteMovie(" . $movie['id'] . ")'>Delete</button>
                    </td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                                    // Handle any database errors
                echo "Error: " . $e->getMessage();
            }
        ?>