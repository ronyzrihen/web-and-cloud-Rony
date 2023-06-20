<?php
include "db.php";

$query = "SELECT * FROM tbl_83_books WHERE bookId = ".$_GET["bookid"];
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
    </head>
<body class="bg-dark">
    <section class="continer-fluid d-flex justify-content-center mt-5">
        <?php

$row = mysqli_fetch_assoc($result);
echo "<title>".$row["bookName"]."</title>'";
echo "<header class='d-flex align-items-center flex-column'>";
echo "<h1 class='text-light'>".$row["bookName"]."</h1>";
echo "<h3 class='text-light'>By </h3>
<h2 class='text-light'>".$row["author"]."</h2>";
echo "</header>";
?>

</section>

        <?php
    echo "<section class='container-fluid d-flex justify-content-center align-items-center mt-4'>";

      echo "<img src=".$row["coverURL"]." class='d-block img-thumbnail me-5' alt=".$row["cover"].">";
      echo "<img src=".$row["authorImg"]." class='d-block img-thumbnail' alt=".$row["author"].">";
      echo "</section>";
      echo "<section class='d-flex align-items-center flex-column mt-5'>
      <h4 class='text-light'>Price: ".$row["price"]." $</h4>
      <h4 class='text-light'>Catagory: ".$row["category"]."</h4>
      </section>";

      ?>
   


</body>
<?php
    mysqli_close($connection);
    ?>
</html>
