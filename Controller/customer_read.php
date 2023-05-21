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
                $stmt = $pdo->prepare("SELECT * FROM tbl_customer_info");
                $stmt->execute();
                $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    // Display the genre data in the table rows
                $x = 1;
                foreach ($movies as $movie) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $x++ . "</th>";
                    echo "<td>" .ucwords($movie['fName']) ." ". ucwords($movie['mName'][0]). ". ". ucwords($movie['lName'])."</td>";
                    echo "<td>" . $movie['contactNo'] . "</td>";
                    echo "<td>
                    <button class='btn btn-primary btn-sm' onclick='editGenre()'>Edit</button>
                    <button class='btn btn-danger btn-sm' onclick='deleteCustomer(" . $movie['id'] . ")'>Delete</button>
                    </td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                                    // Handle any database errors
                echo "Error: " . $e->getMessage();
            }
        ?>