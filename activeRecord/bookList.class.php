<?php
    include('book.class.php');
    class BookList {

        protected $books = [];

        public function load() {
            $con = mysqli_connect('localhost', 'root', '', 'Books');
            $ret = mysqli_query($con, "SELECT Books.*, Genres.name as genre, GROUP_CONCAT(Authors.name SEPARATOR ', ') as authors FROM `Books` LEFT JOIN `Genres` ON Genres.genreId=Books.genreId LEFT JOIN `Books_Authors` ON Books.bookId=Books_Authors.bookId LEFT JOIN `Authors` ON Books_Authors.authorId=Authors.authorId GROUP BY Books.bookId;");
            while ($row = mysqli_fetch_array($ret)) {
                $book = new Book();
                $book->setId($row['bookId']);
                $book->setTitle($row['title']);
                $book->setYear($row['year']);
                $book->setAuthors($row['authors']);
                $book->setGenre($row['genre']);
                $this->books[] = $book;
            }
            mysqli_close($con);
        }

        /**
         * @return array
         */
        public function getBooks()
        {
            return $this->books;
        }

        /**
         * @param array $books
         */
        public function setBooks($books)
        {
            $this->books = $books;
        }
    }