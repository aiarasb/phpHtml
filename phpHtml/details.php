<html>
    <head>
        <title>Knyga</title>
    </head>
    <body>
        <h1>Knyga</h1>
        <?php
            $con = mysqli_connect('localhost', 'root', '', 'Books');
            $id = $_GET['id'];
            $ret = mysqli_query($con, "SELECT Books.*, Genres.name as genre, GROUP_CONCAT(Authors.name SEPARATOR ', ') as authors FROM `Books` LEFT JOIN `Genres` ON Genres.genreId=Books.genreId LEFT JOIN `Books_Authors` ON Books.bookId=Books_Authors.bookId LEFT JOIN `Authors` ON Books_Authors.authorId=Authors.authorId WHERE Books.bookId='".$id."' GROUP BY Books.bookId;");
            if ($ret && $row = mysqli_fetch_assoc($ret)) {
                echo "<b>Knygos pavadinimas: </b>".$row['title']."<br>";
                echo "<b>Knygos autorius(-iai): </b>".$row['authors']."<br>";
                echo "<b>Knygos žanras: </b>".$row['genre']."<br>";
                echo "<b>Knygos išleidimo metai: </b>".$row['year']."<br>";
            } else {
                echo "Neteisingas knygos id.";
            }
            mysqli_close($con);
        ?>
    </body>
</html>