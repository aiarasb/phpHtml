<html>
    <header>
        <title>Knygos</title>
    </header>
    <body>
        <h2>Knygų sąrašas</h2>
        <ul>
            <?php
            include ('bookList.class.php');
            $booksList = new BookList();
            $booksList->load();
            $books = $booksList->getBooks();
            foreach ($books as $k=>$v) {
                echo "<li><a href='details.php?id=" .$v->getId()."'>".$v->getTitle()."</a></li>";
            }
            ?>
        </ul>
    </body>
</html>
