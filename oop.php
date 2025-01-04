<?php

class Book {
    // Private properties
    private $title;
    private $availableCopies;

    public function __construct($title, $availableCopies) {
        // Initialize properties
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    // Get the title of the book
    public function getTitle() {
        return $this->title;
    }

    // Get the number of available copies
    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    // Borrow a book
    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true; // Successfully borrowed
        }
        return false; // No copies available
    }

    // Return a book
    public function returnBook() {
        $this->availableCopies++;
    }
}

class Member {
    // Private property
    private $name;

    public function __construct($name) {
        // Initialize properties
        $this->name = $name;
    }

    // Get the name of the member
    public function getName() {
        return $this->name;
    }

    // Borrow a book
    public function borrowBook(Book $book) {
        if ($book->borrowBook()) {
            echo $this->name . " borrowed '" . $book->getTitle() . "'.\n";
        } else {
            echo "No copies available for '" . $book->getTitle() . "'.\n";
        }
    }

    // Return a book
    public function returnBook(Book $book) {
        $book->returnBook();
        echo $this->name . " returned '" . $book->getTitle() . "'.\n";
    }
}

// Usage

// Create 2 books
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// Create 2 members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// Member One borrows Book 1
$member1->borrowBook($book1);
echo"<br>";
// Member Two borrows Book 2
$member2->borrowBook($book2);

// Print available copies
echo "<br>Available Copies of '" . $book1->getTitle() . "': " . $book1->getAvailableCopies() . "<br>";
echo "Available Copies of '" . $book2->getTitle() . "': " . $book2->getAvailableCopies() . "<br>";

?>