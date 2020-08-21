<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit book: </title>
</head>
<body>
    <div class="container-fluid">
        <form action="?controller=book&action=update&id=<?php echo $book->getId() ?>" method="POST">
            <div class="form-group">
                <label for="name">ID</label>
                <input type="text" name="id" class="form-control" value="<?php echo $book->getId() ?>" disabled>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $book->getName() ?>">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" class="form-control" value="<?php echo $book->getAuthor() ?>">
            </div>
            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" class="form-control" value="<?php echo $book->getPublisher() ?>">
            </div>
            <div class="form-group">
                <label for="cover">Cover</label>
                <input type="text" name="cover" class="form-control" value="<?php echo $book->getCover() ?>">
            </div>
            <div class="form-group">
                <label for="unit_price">Unit price</label>
                <input type="text" name="unit_price" class="form-control" value="<?php echo $book->getUnit_price() ?>">
            </div>
            <div class="form-group">
                <label for="page">Page</label>
                <input type="text" name="page" class="form-control" value="<?php echo $book->getPage() ?>">
            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <input type="text" name="size" class="form-control" value="<?php echo $book->getSize() ?>">
            </div>
            <div class="form-group">
                <label for="release_date">Release date</label>
                <input type="text" name="release_date" class="form-control" value="<?php echo $book->getRelease_date() ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>