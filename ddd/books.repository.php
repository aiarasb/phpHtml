<?php
    include('book.class.php');
    class BooksRepository {

        public function getBookById($id) {
            $book = new Book();
            $con = mysqli_connect('localhost', 'root', '', 'Books');
            $ret = mysqli_query($con, "SELECT Books.*, Genres.name as genre, GROUP_CONCAT(Authors.name SEPARATOR ', ') as authors FROM `Books` LEFT JOIN `Genres` ON Genres.genreId=Books.genreId LEFT JOIN `Books_Authors` ON Books.bookId=Books_Authors.bookId LEFT JOIN `Authors` ON Books_Authors.authorId=Authors.authorId WHERE Books.bookId='".$id."' GROUP BY Books.bookId;");
            if ($ret && $row = mysqli_fetch_assoc($ret)) {
                $book->setId($row['bookId']);
                $book->setTitle($row['title']);
                $book->setYear($row['year']);
                $book->setAuthors($row['authors']);
                $book->setGenre($row['genre']);
            }
            mysqli_close($con);
            return $book;
        }

        public function getBooks() {
            $books = [];
            $con = mysqli_connect('localhost', 'root', '', 'Books');
            $ret = mysqli_query($con, "SELECT Books.*, Genres.name as genre, GROUP_CONCAT(Authors.name SEPARATOR ', ') as authors FROM `Books` LEFT JOIN `Genres` ON Genres.genreId=Books.genreId LEFT JOIN `Books_Authors` ON Books.bookId=Books_Authors.bookId LEFT JOIN `Authors` ON Books_Authors.authorId=Authors.authorId GROUP BY Books.bookId;");
            while ($row = mysqli_fetch_array($ret)) {
                $book = new Book();
                $book->setId($row['bookId']);
                $book->setTitle($row['title']);
                $book->setYear($row['year']);
                $book->setAuthors($row['authors']);
                $book->setGenre($row['genre']);
                $books[] = $book;
            }
            mysqli_close($con);
            return $books;
        }
    }