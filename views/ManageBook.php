<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Manage Book</title>
  </head>
  <body>
    <div class="container-fluid"><br>
        <div class="alert-box">
          <?php if(isset($_COOKIE['del'])): ?>
              <?php if ($_COOKIE['del']): ?>
                  <div class="alert alert-success  alert-dismissible">
                      <strong>Xóa thành công</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                  </div>
              <?php elseif (!$_COOKIE['del']): ?>
                  <div class="alert alert-danger  alert-dismissible">
                      <strong>Không xóa được</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                  </div>
              <?php endif; ?>
              <?php setcookie( "del", "", time()- 60, "/","", 0); ?>
          <?php endif; ?>
      </div>

      <a id="addBtn" class="btn btn-info" href="?controller=book&action=add">Add more book</a>
      <a id="addBtn" class="btn btn-danger" href="?controller=user&action=postLogOut">Log Out</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Author</th>
            <th scope="col">Publisher</th>
            <th scope="col">Cover</th>
            <th scope="col">Unit price (dong)</th>
            <th scope="col">Page</th>
            <th scope="col">Size</th>
            <th scope="col">Realease date</th>
            <th scope="col">Function</th>
          </tr>
        </thead>
        <tbody>
            <?php 
              $stt = 1;
              foreach($listBook as $book): ?>
              <tr>
                <td><?php echo $stt++ ?></td>
                <td><?php echo $book['name'] ?></td>
                <td><?php echo $book['author'] ?></td>
                <td><?php echo $book['publisher'] ?></td>
                <td><img src="<?php echo $book['cover'] ?>" width="200px" alt="Chưa có ảnh"></td>
                <td><?php echo $book['unit_price'] ?></td>
                <td><?php echo $book['page'] ?></td>
                <td><?php echo $book['width']."x".$book['height']."cm" ?></td>
                <td><?php echo $book['release_date'] ?></td>
                <td><a id="editBtn" class="btn btn-primary" href="?controller=book&action=edit&id=<?php echo $book['id'] ?>">Edit</a></td>
                <td><a id="deleteBtn" class="btn btn-danger" href="?controller=book&action=delete&id=<?php echo $book['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa <?php echo $book['name'] ?> không');">Delete</a></td>
              </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>