<?php
include_once '../metodos/conexao.php';

$id_muni = $_POST['id_municipio'];


 
   $resulta =mysqli_query($conexao,"SELECT id,comuna FROM comuna WHERE id_municipio ='$id_muni' order by comuna asc");


$html = "<option value='0'>------</option>";
while($comuna = mysqli_fetch_assoc($resulta)){
 $html = "<option value='".$comuna['id']."'>".$comuna['comuna']."</option>";   
}
echo $html;
    

   


