<?php
include_once 'config/conexaoBD.php';

$id_provincia = $_POST['id_provincia'];




$pdo = ligar::chamar_bd();
$Pegar_membros=$pdo->prepare("SELECT * FROM municipio WHERE id_provincia ='$id_provincia' order by municipio asc");
$Pegar_membros->execute();
$html = "<option value='0'>--------</option>";
 while ($Linha = $Pegar_membros->fetch(PDO::FETCH_ASSOC)){
$html = "<option value='".$Linha['id_municipio']."'>".$Linha['municipio']."</option>";   
 }


echo $html;