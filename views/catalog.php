<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>RENTAL MOBIL</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 50px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../assets/img/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="catalog.php">Catalog</a></li>
                <li><a href="#">About</a></li>
                <li><a href="login_menu.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <center>
        <?php
        // Assuming you have a PDO database connection established
        require_once 'db/db_connect.php';

        // Fetch data from the database
        $query = "SELECT * FROM mobil";
        $stmt = $conn->query($query);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rows) > 0) {
            echo "<table>";
            echo "<tr><th>Image</th><th>Name</th><th>Description</th></tr>";
            
            foreach ($rows as $row) {
                echo "<tr>";
                echo "<td><img src='../assets/img/" . $row['gambar'] . "' alt='" . $row['merk'] . "'></td>";
                echo "<td>" . $row['merk'] . "</td>";
                echo "<td>" . $row['harga'] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "No data found.";
        }
        ?>
    </center>
    </main>
</body>
</html>