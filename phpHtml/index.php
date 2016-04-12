<html>
    <header>
        <title>Knygos</title>
    </header>
    <body>
        <h2>Knygų sąrašas</h2>
        <ul>
            <?php
                $con = mysqli_connect('localhost', 'root', '', 'Books');
                $ret = mysqli_query($con, "SELECT * FROM `Books`");
                while ($row = mysqli_fetch_array($ret)) {
                    echo "<li><a href='details.php?id=" .$row['bookId']."'>".$row['title']."</a></li>";
                }
                mysqli_close($con);
            ?>
        </ul>
    </body>
</html>
