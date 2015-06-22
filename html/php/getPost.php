<?php
    require('db.php');
 

    $id = $_REQUEST["id"];
   	$result =  $conn->query("select titulo, contenido from Publicaciones WHERE idPublicacion = $id");
   
   if($result)
   {
   		if($result->num_rows > 0)
   		{
   			$row = $result->fetch_assoc();
        $content = str_replace(";", " ", $row["contenido"]);
   			echo $row["titulo"].";".$content;
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


