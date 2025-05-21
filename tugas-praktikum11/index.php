<?php

class Book {
    private $code_book;
    private $name;
    private $qty;

    // Constructor
    public function __construct($code_book, $name, $qty) {
        $this->setCodeBook($code_book);
        $this->name = $name;
        $this->setQty($qty);
    }

    // Getter untuk code_book
    public function getCodeBook() {
        return $this->code_book;
    }

    // Getter untuk qty
    public function getQty() {
        return $this->qty;
    }

    // Getter untuk name (tidak diminta, tapi biasanya tetap disediakan)
    public function getName() {
        return $this->name;
    }

    // Setter untuk code_book (private)
    private function setCodeBook($code_book) {
        if (preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book)) {
            $this->code_book = $code_book;
        } else {
            echo "Error: code_book harus dalam format 'BB00'.\n";
        }
    }

    // Setter untuk qty (private)
    private function setQty($qty) {
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty;
        } else {
            echo "Error: qty harus berupa integer positif.\n";
        }
    }
}

// Contoh penggunaan
$book1 = new Book("AB12", "Pemrograman PHP", 10);
echo "Kode Buku: " . $book1->getCodeBook() . "\n";
echo "Judul Buku: " . $book1->getName() . "\n";
echo "Jumlah: " . $book1->getQty() . "\n";

$book2 = new Book("ab12", "Buku Salah Format", -5); // akan memunculkan error

?>
