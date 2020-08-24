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
    <title>Add new book</title>
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

        <form action="?controller=book&action=add" method="POST" enctype="multipart/form-data" style="width: 50%">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" name="name" class="form-control" value="<?php echo $book->getName(); ?>">
                <div class="text-danger"><?php echo (isset($error['name_err'])) ? $error['name_err']:"" ?></div>
            </div>
            <div class="form-group">
                <label for="author">Author *</label>
                <input type="text" name="author" class="form-control" value="<?php echo $book->getAuthor(); ?>">
                <div class="text-danger"><?php echo (isset($error['author_err'])) ? $error['author_err']:"" ?></div>
            </div>
            <div class="form-group">
                <label for="publisher">Publisher *</label>
                <input type="text" name="publisher" class="form-control" value="<?php echo $book->getPublisher(); ?>">
                <div class="text-danger"><?php echo (isset($error['publisher_err'])) ? $error['publisher_err']:"" ?></div>
            </div>
            <div class="form-group">
                <label>Cover</label><br>
                <input type="file" name="cover" id="cover" onchange="changeHandler(event)"><br>
                <div class="text-danger"><?php echo (isset($error['cover_err'])) ? $error['cover_err']:"" ?></div>
                <div class="image_area" style="width: 200px;">
                    <img id="cover_img" src="">
                </div>
            </div>
            <div class="form-group">
                <label for="unit_price">Unit price(dong) *</label>
                <input type="text" name="unit_price" class="form-control" value="<?php echo $book->getUnit_price(); ?>">
                <div class="text-danger"><?php echo (isset($error['unit_price_err'])) ? $error['unit_price_err']:"" ?></div>
            </div>
            <div class="form-group">
                <label for="page">Page *</label>
                <input type="text" name="page" class="form-control" value="<?php echo $book->getPage(); ?>">
                <div class="text-danger"><?php echo (isset($error['page_err'])) ? $error['page_err']:"" ?></div>
            </div>
            <div class="form-group">
                <label for="size">Width(cm) *</label>
                <input type="text" name="width" class="form-control" value="<?php echo $book->getWidth(); ?>">
                <div class="text-danger"><?php echo (isset($error['width_err'])) ? $error['width_err']:"" ?></div>
            </div>
            <div class="form-group">
                <label for="size">Height(cm) *</label>
                <input type="text" name="height" class="form-control" value="<?php echo $book->getHeight(); ?>">
                <div class="text-danger"><?php echo (isset($error['height_err'])) ? $error['height_err']:"" ?></div>
            </div>
            <div class="form-group">
                <label for="release_date">Release date *</label>
                <input type="text" id="release_date" name="release_date" class="form-control" placeholder="dd-mm-yyyy" autocomplete="off" value="<?php echo $book->getRelease_date(); ?>">
                <div class="text-danger"><?php echo (isset($error['release_date_err'])) ? $error['release_date_err']:"" ?></div>
            </div>
            <button type="submit" id="saveBtn" name="submitBtn" class="btn btn-primary">Save</button>
            <a href="?controller=book&action=getAll" class="btn btn-secondary">Back</a>
        </form>
    </div>

    <script>
        $(function(){
            $("#release_date").datepicker({ 
                dateFormat: 'dd-mm-yy'
            });
        });

        function changeHandler(evt) {
            var files = evt.target.files;
            var file = files[0];

            var fileReader = new FileReader();
            fileReader.readAsDataURL(file); 

            fileReader.onload = function() {
                var url = fileReader.result;
                document.getElementById("cover_img").src = url;
                document.getElementById('cover_img').style.width = '100%';
            }
        }
    </script>
</body>
</html>