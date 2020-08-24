<?php

include_once('DAO.php');

class Book extends DAO{
    private $id;
    private $name; 
    private $author;
    private $publisher;
    private $cover = null;
    private $unit_price;
    private $page;
    private $width;
    private $height;
    private $release_date;

    public function getAllBook(){
        $sql = "SELECT * FROM tbl_book";
        $listBook = $this->conn->query($sql);
        return $listBook;
    }

    public function addBook($b){
        $sql = "INSERT INTO tbl_book (name, author, publisher, cover, unit_price, page, width, height, release_date) 
                VALUES ('{$b->getName()}', '{$b->getAuthor()}', '{$b->getPublisher()}', '{$b->getCover()}', {$b->getUnit_price()}, {$b->getPage()}, '{$b->getWidth()}', '{$b->getHeight()}', '{$b->getRelease_date()}')";
        return $this->conn->query($sql);
    }

    public function getBook($id){
        $sql = "SELECT * FROM tbl_book WHERE id = {$id}";
        $books = $this->conn->query($sql);
        foreach( $books as $book ):
            $b = new Book();
            $b->setId($book['id']);
            $b->setName($book['name']);
            $b->setAuthor($book['author']);
            $b->setPublisher($book['publisher']);
            $b->setCover($book['cover']);
            $b->setUnit_price($book['unit_price']);
            $b->setPage($book['page']);
            $b->setWidth($book['width']);
            $b->setHeight($book['height']);
            $b->setRelease_date($book['release_date']);
            return $b;
        endforeach;
        return null;
    }

    public function getBookByName($name){
        $sql = "SELECT * FROM tbl_book WHERE name = '{$name}'";
        $books = $this->conn->query($sql);
        foreach( $books as $book ):
            $b = new Book();
            $b->setId($book['id']);
            $b->setName($book['name']);
            $b->setAuthor($book['author']);
            $b->setPublisher($book['publisher']);
            $b->setCover($book['cover']);
            $b->setUnit_price($book['unit_price']);
            $b->setPage($book['page']);
            $b->setWidth($book['width']);
            $b->setHeight($book['height']);
            $b->setRelease_date($book['release_date']);
            return $b;
        endforeach;
        return null;
    }

    public function updateBook($b){
        $sql = "UPDATE tbl_book 
                SET name = '{$b->getName()}', 
                    author = '{$b->getAuthor()}', 
                    publisher = '{$b->getPublisher()}',
                    cover =  '{$b->getCover()}', 
                    unit_price = {$b->getUnit_price()}, 
                    page = {$b->getPage()},
                    width = '{$b->getWidth()}', 
                    height = '{$b->getHeight()}', 
                    release_date = '{$b->getRelease_date()}' 
                WHERE id = {$b->getId()}";
        $this->conn->query($sql);
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
    public function getPublisher(){
        return $this->publisher;
    }
    public function setPublisher($publisher){
        $this->publisher = $publisher;
    }
    public function getCover(){
        return $this->cover;
    }
    public function setCover($cover){
        $this->cover = $cover;
    }
    public function getUnit_price(){
        return $this->unit_price;
    }
    public function setUnit_price($unit_price){
        $this->unit_price = $unit_price;
    }
    public function getPage(){
        return $this->page;
    }
    public function setPage($page){
        $this->page = $page;
    }
    public function getWidth(){
        return $this->width;
    }
    public function setWidth($width){
        $this->width = $width;
    }
    public function getHeight(){
        return $this->height;
    }
    public function setHeight($height){
        $this->height = $height;
    }
    public function getRelease_date(){
        return $this->release_date;
    }
    public function setRelease_date($release_date){
        $this->release_date = $release_date;
    }

    public function __toString()
    {
        return $this->name." ".$this->author." ".$this->publisher." ".$this->cover." ".$this->unit_price." ".$this->page." ".$this->width." ".$this->height." ".$this->release_date."<br>";
    }
}