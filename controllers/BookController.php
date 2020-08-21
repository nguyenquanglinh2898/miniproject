<?php

include_once('models/Book.php');

class BookController{
    public $model;

    public function __construct(){
        $this->model = new Book();
    }

    public function getAll(){
        $listBook = $this->model->getAllBook();
        include_once('views/ManageBook.php');
    }

    public function add(){
        $this->model->setName($_POST['name']);
        $this->model->setAuthor($_POST['author']);
        $this->model->setPublisher($_POST['publisher']);
        $this->model->setCover($_POST['cover']);
        $this->model->setUnit_price($_POST['unit_price']);
        $this->model->setPage($_POST['page']);
        $this->model->setSize($_POST['size']);
        $this->model->setRelease_date($_POST['release_date']);
        $this->model->addBook($this->model);
    }

    public function edit($id){
        $book = $this->model->getBook($id);
        include('views/EditBook.php');
    }

    public function update($id){
        $book = new Book();
        if(isset($_POST['submit'])){
            $book->setId($id);
            $book->setName($_POST['name']);
            $book->setAuthor($_POST['author']);
            $book->setPublisher($_POST['publisher']);
            $book->setCover($_POST['cover']);
            $book->setUnit_price($_POST['unit_price']);
            $book->setPage($_POST['page']);
            $book->setSize($_POST['size']);
            $book->setRelease_date($_POST['release_date']);
            $this->model->updateBook($book);
        }
    }
}