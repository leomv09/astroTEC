<?php
    require('db.php');
   

 function getPostsOptions()
 {
    global $conn;
    $result =  $conn->query("SELECT idPublicacion, titulo FROM Publicaciones");

    if($result)
    {
        if($result->num_rows > 0)
        {
          while($row = $result->fetch_assoc())
          {
            echo "<option value=$row[idPublicacion]> $row[titulo] </option>";
          }
        }
    }
}

?>
