<html>
    <head>
        <title>Knyga</title>
    </head>
    <body>
        <h1>Knyga</h1>
        <?php
            include ('books.repository.php');
            $id = $_GET['id'];
            $repo = new BooksRepository();
            $book = $repo->getBookById($id);
            echo "<b>Knygos pavadinimas: </b>".$book->getTitle()."<br>";
            echo "<b>Knygos autorius(-iai): </b>".$book->getAuthors()."<br>";
            echo "<b>Knygos žanras: </b>".$book->getGenre()."<br>";
            echo "<b>Knygos išleidimo metai: </b>".$book->getYear()."<br>";
        ?>
    </body>
</html>