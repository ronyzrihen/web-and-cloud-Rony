<?php 
include "db.php";


if(isset($_GET["bookCat"])){
$query = "SELECT * FROM tbl_83_books WHERE category=".$_GET["bookCat"];
}
else {
    $query = "SELECT * FROM tbl_83_books";
}
$result = mysqli_query($connection,$query);

if(!$result){
    die("DB query failed.");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Book library</title>
    </head>
    
    <body class="bg-dark">
    <header class="d-flex justify-content-center mt-5">
    <h1 class="text-light">Book liabrary</h1>
</header>
    <div class="dropdown d-flex justify-content-center mb-4 mt-2">
  <button class="btn btn-secondary dropdown-toggle col-8" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Catagory
  </button>
  <ul class="dropdown-menu col-8 " id="drop">
<li><a class="dropdown-item" href="index.php">default</a></li>
</ul>
</div>
    
        
        <?php
    echo '<div class="row d-flex justify-content-center">';
    while($row = mysqli_fetch_assoc($result)){
        $img = $row["coverURL"];
        //output data from each row
        echo '<div class="col-sm-4 col-md-2 d-flex justify-content-center mb-5">';
        echo    '<div class="card">';
        echo        '<img src="' . $img . '" class="ronded  img-thumbnail d-block">';
        echo        '<div class="card-body">';
        echo        '<section class="d-flex flex-column align-items-center">';
        echo        '<h5 class="card-title">' . $row["bookName"] . '</h5>';
        echo        '<a href="book.php?bookid=' . $row["bookId"] . '" class="btn btn-primary">Book page</a>';
        echo        '</section>';        
        echo '</div></div></div>';
    }
    echo '</div>';
    
    ?>
<script src="js/script.js"></script>
</body>
</html>
<?php
    mysqli_close($connection);
    ?>
