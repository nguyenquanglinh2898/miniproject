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

    public function validate($form, $file){    
        //name
        $name_err = "";
        $form['name'] = $this->normalize($form['name']);
        if($form['name'] == null || empty($form['name'])) $name_err = "Tên sách không được để trống";
        elseif (strlen($form['name']) > 70) $name_err = "Tên sách không được vượt quá 70 kí tự";
        elseif($this->model->getBookByName($_POST['name'])) $name_err = "Tên sách đã tồn tại trong hệ thống";
        
        //author
        $author_err = "";
        $form['author'] = $this->normalize($form['author']);
        if($form['author'] == null || empty($form['author'])) $author_err = "Tên tác giả không được để trống";
        elseif (strlen($form['author']) > 30) $author_err = "Tên tác giả không được vượt quá 30 kí tự";
        elseif (!$this->nameValidation($form['author'])) $author_err = "Tên tác giả không được chứa số và kí tự đặc biệt";

        //publisher
        $publisher_err = "";
        $form['publisher'] = $this->normalize($form['publisher']);
        if($form['publisher'] == null || empty($form['publisher'])) $publisher_err = "Tên nhà xuất bản không được để trống";
        elseif (strlen($form['publisher']) > 70) $publisher_err = "Tên nhà xuất bản không được vượt quá 30 kí tự";
        elseif (!$this->nameValidation($form['publisher'])) $publisher_err = "Tên nhà xuất bản không được chứa số và kí tự đặc biệt";

        //cover
        $cover_err = "";
        if(!empty($file['cover']['name'])){
            $allowtypes = array('image/jpg', 'image/png', 'image/jpeg', 'image/gif');
            if (!in_array($file['cover']['type'],$allowtypes )) $cover_err = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
            elseif ( $file['cover']['size'] > 800000 ) $cover_err = "Dung lượng ảnh quá lớn, cần phải nhỏ hơn 800000 bytes";
        }

        //unit price
        $unit_price_err = "";
        if($form['unit_price'] == null || empty($form['unit_price'])) $unit_price_err = "Giá không được để trống";
        elseif(!$this->numberValidation($form['unit_price'])) $unit_price_err = "Giá không hợp lệ";
        else{
            $form['unit_price'] = (int)$form['unit_price'];
            if( $form['unit_price']%100 > 0 ) $unit_price_err = "Giá không hợp lệ";
        }

        //page
        $page_err = "";
        if($form['page'] == null || empty($form['page'])) $page_err = "Số trang không được để trống";
        elseif(!$this->numberValidation($form['page'])) $page_err = "Số trang không hợp lệ";
        else $form['page'] = (int)$form['page'];

        //width
        $width_err = "";
        if($form['width'] == null || empty($form['width'])) $width_err = "Chiều rộng không được để trống";
        elseif(!$this->floatValidation($form['width'])) $width_err = "Chiều rộng không hợp lệ";
        else $form['width'] = round((float)$form['width'], 1);

        //height
        $height_err = "";
        if($form['height'] == null || empty($form['height'])) $height_err = "Chiều cao không được để trống";
        elseif(!$this->floatValidation($form['height'])) $height_err = "Chiều dài không hợp lệ";
        else $form['height'] = round((float)$form['height'], 1);

        //release date
        $release_date_err = "";
        if($form['release_date'] == null || empty($form['release_date'])) $release_date_err = "Ngày xuất bản không được để trống";
        else{
            $today = date("d-m-Y");
            if(strtotime($today) < strtotime($form['release_date'])) $release_date_err = "Ngày xuất bản không hợp lệ";
        }

        $size = 0;
        if(!empty($name_err)) $size++;
        if(!empty($author_err)) $size++;
        if(!empty($publisher_err)) $size++;
        if(!empty($cover_err)) $size++;
        if(!empty($unit_price_err)) $size++;
        if(!empty($page_err)) $size++;
        if(!empty($width_err)) $size++;
        if(!empty($height_err)) $size++;
        if(!empty($release_date_err)) $size++;

        return array(
            'name_err' => $name_err,
            'author_err' => $author_err,
            'publisher_err' => $publisher_err,
            'cover_err' => $cover_err,
            'unit_price_err' => $unit_price_err,
            'page_err' => $page_err,
            'width_err' => $width_err,
            'height_err' => $height_err,
            'release_date_err' => $release_date_err,
            'size' => $size
        );
    }

    public function normalize($str){    // loại bỏ các dấu cách thừa
        $str = trim($str);
        $word = explode(" ", $str);
        $res = "";
        foreach( $word as $w ):
            if(!empty($w)) $res = $res.$w." ";
        endforeach;
        return trim($res);
    }

    public function nameValidation($str){
        $pattern = '/^[a-zA-ZđaàáảãạăằắẳẵặâầấẩẫậeèéẻẽẹêềếểễệiìíỉĩịoòóỏõọôồốổỗộơờớởỡợuùúủũụưừứửữựyỳýỷỹỵĐAÀÁẢÃẠĂẰẮẲẴẶÂẦẤẨẪẬEÈÉẺẼẸÊỀẾỂỄỆIÌÍỈĨỊOÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢUÙÚỦŨỤƯỪỨỬỮỰYỲÝỶỸỴ\s]+$/';
        if (preg_match($pattern, $str))
            return true;
        return false;
    }

    public function numberValidation($n){
        $pattern = '/^[0-9]+$/';
        if (preg_match($pattern, $n))
            return true;
        return false;
    }

    public function floatValidation($n){
        $pattern = '/^[0-9.]+$/';
        if (preg_match($pattern, $n)){
            $c = 0;
            for( $i = 0 ; $i < strlen($n) ; $i++ ){
                if( $n[$i] == '.' ) $c++ ;
                if( $c > 1 ) return false;
            }
            return true;
        }
        return false;
    }

    public function add(){
        $book = new Book();
        if(isset($_POST['submitBtn'])){
            $error = $this->validate($_POST, $_FILES);

            $book->setName($_POST['name']); 
            $book->setAuthor($_POST['author']);
            $book->setPublisher($_POST['publisher']);
            if(isset($_FILES['cover']) && empty($error['cover_err'])){
                $target = 'images/' . $_FILES["cover"]["name"];
                if(file_exists($target)) $target = 'images/'.time().$_FILES["cover"]["name"];
                move_uploaded_file($_FILES['cover']['tmp_name'], $target);
                if( $_FILES['cover']['name'] != null ) $book->setCover($target);
            }
            $book->setUnit_price($_POST['unit_price']);
            $book->setPage($_POST['page']);
            $book->setWidth(round((float)$_POST['width'], 1));
            $book->setHeight(round((float)$_POST['height'], 1));
            $book->setRelease_date($_POST['release_date']);
            
            if($error['size'] == 0) $success = $this->model->addBook($book);
        }
        include('views/AddBook.php');
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
            $book->setWidth($_POST['width']);
            $book->setHeight($_POST['height']);
            $book->setRelease_date($_POST['release_date']);
            $this->model->updateBook($book);
        }
    }
}