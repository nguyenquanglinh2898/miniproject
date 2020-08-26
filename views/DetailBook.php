<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Detail book: <?php echo $book->getName() ?></title>
</head>
<body>
    <div class="container-fluid"><br>
        <div class="alert-box">
            <?php if(isset($success)): ?>
                <?php if ($success): ?>
                    <div class="alert alert-success  alert-dismissible">
                        <strong>Lưu thành công</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                    </div>
                <?php elseif (!$success): ?>
                    <div class="alert alert-danger  alert-dismissible">
                        <strong>Không lưu được</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div style="width: 50%">
            <div><b>Id: </b><?php echo $book->getId(); ?></div>
            <div><b>Name: </b><?php echo $book->getName(); ?></div>
            <div><b>Author</b><?php echo $book->getAuthor(); ?></div>
            <div><b>Publisher: </b><?php echo $book->getPublisher(); ?></div>
            <div><b>Cover: </b><?php echo ($book->getCover()) ? "":"Chưa có ảnh" ?>
                <div class="image_area" style="width: 200px;">
                    <img id="cover_img" src="<?php echo $book->getCover(); ?>" <?php echo ($book->getCover()) ? "width='100%'":"" ?>>
                </div>
            </div>
            <div><b>Unit price: </b><?php echo $book->getUnit_price(); ?> dong</div>
            <div><b>Page: </b><?php echo $book->getPage(); ?> page(s)</div>
            <div><b>Width: </b><?php echo $book->getWidth(); ?> cm</div>
            <div><b>Height: </b><?php echo $book->getHeight(); ?> cm</div>
            <div><b>Release date: </b><?php echo $book->getRelease_date(); ?></div>
            <br>
            <a href="?controller=book&action=edit&id=<?php echo $book->getId() ?>"class="btn btn-primary" >Edit</a>
            <a href="?controller=book&action=getAll" class="btn btn-secondary">Back</a>
        </div>
    </div>
</body>
</html>