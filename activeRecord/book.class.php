<?php
    class Book {

        protected $authors;
        protected $title;
        protected $year;
        protected $id;
        protected $genre;

        /**
         * @return mixed
         */
        public function getGenre()
        {
            return $this->genre;
        }

        /**
         * @param mixed $genre
         */
        public function setGenre($genre)
        {
            $this->genre = $genre;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getAuthors()
        {
            return $this->authors;
        }

        /**
         * @param mixed $authors
         */
        public function setAuthors($authors)
        {
            $this->authors = $authors;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getYear()
        {
            return $this->year;
        }

        /**
         * @param mixed $year
         */
        public function setYear($year)
        {
            $this->year = $year;
        }

        public function load($id) {
            $con = mysqli_connect('localhost', 'root', '', 'Books');
            $ret = mysqli_query($con, "SELECT Books.*, Genres.name as genre, GROUP_CONCAT(Authors.name SEPARATOR ', ') as authors FROM `Books` LEFT JOIN `Genres` ON Genres.genreId=Books.genreId LEFT JOIN `Books_Authors` ON Books.bookId=Books_Authors.bookId LEFT JOIN `Authors` ON Books_Authors.authorId=Authors.authorId WHERE Books.bookId='".$id."' GROUP BY Books.bookId;");
            if ($ret && $row = mysqli_fetch_assoc($ret)) {
                $this->id = $row['bookId'];
                $this->title = $row['title'];
                $this->year = $row['year'];
                $this->authors = $row['authors'];
                $this->genre = $row['genre'];
            }
            mysqli_close($con);
        }


    }