<!DOCTYPE html>
<html>
    <head>
        <title>Display Data</title>
        <link rel="stylesheet" href="styles3.css">
    </head>
    <body>
      <?php
        session_start();
        $servername = "localhost";
        $username = "shreyanshkuls";
        $password = "";
        $newTable = $_SESSION['newTable'];
        $newDatabase = $_SESSION['newDatabase'];
        $conn = mysqli_connect($servername, $username, $password);

        if (mysqli_connect_error())
        {
            die("Database error: " . mysqli_connect_error());
        }

        $sql = "USE ".$newDatabase;
        if (!mysqli_query($conn, $sql))
        {
            echo "Database Error: " . mysqli_error($conn);
        }
        $sql = "SELECT * FROM ".$newTable;
        $result = mysqli_query($conn, $sql);
        $records = $result->num_rows;
        if($records<=0)
        {
          echo "No records found.";
        }
        else
        {
          echo "<table>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                  </tr>";
          while($curRec = $result->fetch_assoc())
          {
            echo "
                  <tr>
                    <td>".$curRec["id"]."</td>
                    <td>".$curRec["name"]."</td>
                    <td>".$curRec["email"]."</td>
                    <td>".$curRec["contact"]."</td>
                    <td>".$curRec["address"]."</td>
                  </tr>";
          }
          echo "</table>";
        }

        mysqli_close($conn);
      ?>
    </body>
</html>
