<?php
    require('db.php');
 

    $id = $_REQUEST["id"];
   	$result =  $conn->query("select titulo, contenido from Publicaciones WHERE idPublicacion = $id");
   
   if($result)
   {
   		if($result->num_rows > 0)
   		{
   			$row = $result->fetch_assoc();
   			echo $row["titulo"].";".$row["contenido"];
   		}
   		else
   		{
   			echo -1;
   		}
   }
   else

   {
   	echo $conn->error;
   }

?>
