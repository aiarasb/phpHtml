<html>
    <header>
        <title>Knygos</title>
    </header>
    <body>
        <h2>Knygų sąrašas</h2>
        <ul>
            <?php
                include ('books.repository.php');
                $repo = new BooksRepository();
                $books = $repo->getBooks();
                foreach ($books as $k=>$v) {
                    echo "<li><a href='details.php?id=" .$v->getId()."'>".$v->getTitle()."</a></li>";
                }
            ?>
        </ul>
    </body>
</html>
